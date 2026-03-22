<?php
/**
 * チャットボット APIプロキシ
 * Dify Chat API へのリクエストを中継し、SSEストリーミングで転送する
 */

mb_internal_encoding('UTF-8');

define('APP_DIR', __DIR__ . '/../../app');

require_once APP_DIR . '/config/cfg_app.php';
require_once APP_DIR . '/config/cfg_chatbot.php';
require_once APP_DIR . '/config/cfg_security.php';

startSecureSession();

// POST限定
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendJsonResponse(false, '不正なリクエストです');
}

// リファラーチェック
if (!checkReferer()) {
    logError('[Chatbot] Invalid referer');
    sendJsonResponse(false, '不正なアクセスです');
}

// レート制限
if (!checkChatbotRateLimit()) {
    sendJsonResponse(false, '送信間隔が短すぎます。少しお待ちください。');
}

// リクエストボディ取得
$input = json_decode(file_get_contents('php://input'), true);
if (!$input || empty($input['message'])) {
    sendJsonResponse(false, 'メッセージが空です');
}

// 入力サニタイズ・文字数制限
$message = trim($input['message']);
$message = mb_substr($message, 0, CHATBOT_MAX_MESSAGE_LENGTH);

if ($message === '') {
    sendJsonResponse(false, 'メッセージが空です');
}

// セッションベースのuser_id生成
if (empty($_SESSION['chatbot_user_id'])) {
    $_SESSION['chatbot_user_id'] = 'user_' . bin2hex(random_bytes(16));
}
$userId = $_SESSION['chatbot_user_id'];

// conversation_id（会話継続用）
$conversationId = $input['conversation_id'] ?? '';

// Dify APIリクエスト構築
$payload = [
    'inputs' => new \stdClass(),
    'query' => $message,
    'response_mode' => 'streaming',
    'user' => $userId,
];

if ($conversationId !== '') {
    $payload['conversation_id'] = $conversationId;
}

// SSEヘッダー設定
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
header('Connection: keep-alive');
header('X-Accel-Buffering: no');

// 出力バッファリング無効化
while (ob_get_level()) {
    ob_end_flush();
}

// Dify APIへcurlリクエスト（ストリーミング）
$ch = curl_init(CHATBOT_API_URL . '/chat-messages');
curl_setopt_array($ch, [
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($payload),
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . CHATBOT_API_KEY,
        'Content-Type: application/json',
    ],
    CURLOPT_RETURNTRANSFER => false,
    CURLOPT_WRITEFUNCTION => function ($ch, $data) {
        echo $data;
        if (ob_get_level()) {
            ob_flush();
        }
        flush();
        return strlen($data);
    },
    CURLOPT_TIMEOUT => 120,
    CURLOPT_CONNECTTIMEOUT => 10,
]);

$result = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if (curl_errno($ch)) {
    $error = curl_error($ch);
    curl_close($ch);
    logError('[Chatbot] cURL error: ' . $error);
    echo "data: " . json_encode(['error' => 'APIへの接続に失敗しました']) . "\n\n";
    flush();
    exit;
}

curl_close($ch);

if ($httpCode >= 400) {
    logError('[Chatbot] Dify API HTTP ' . $httpCode);
}
