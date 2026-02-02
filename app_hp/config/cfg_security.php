<?php
/**
 * セキュリティ関数ファイル
 */

require_once __DIR__ . '/cfg_app.php';

/**
 * セッション開始
 */
function startSecureSession() {
    if (session_status() === PHP_SESSION_NONE) {
        ini_set('session.cookie_httponly', 1);
        ini_set('session.use_only_cookies', 1);
        ini_set('session.cookie_secure', isset($_SERVER['HTTPS']));
        session_name(SESSION_NAME);
        session_start();
    }
}

/**
 * CSRFトークンの生成
 */
function generateCSRFToken() {
    if (empty($_SESSION[CSRF_TOKEN_NAME])) {
        $_SESSION[CSRF_TOKEN_NAME] = bin2hex(random_bytes(32));
    }
    return $_SESSION[CSRF_TOKEN_NAME];
}

/**
 * CSRFトークンの検証
 */
function verifyCSRFToken($token) {
    if (!isset($_SESSION[CSRF_TOKEN_NAME])) {
        return false;
    }
    return hash_equals($_SESSION[CSRF_TOKEN_NAME], $token);
}

/**
 * 入力値のサニタイズ（XSS対策）
 */
function sanitizeInput($data) {
    if (is_array($data)) {
        return array_map('sanitizeInput', $data);
    }
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

/**
 * メールアドレスの検証
 */
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * メールヘッダーインジェクション対策
 */
function sanitizeEmailHeader($string) {
    // 改行文字を削除
    $string = str_replace(["\r", "\n", "%0a", "%0d"], '', $string);
    return $string;
}

/**
 * リファラーチェック（CSRF対策）
 */
function checkReferer() {
    if (!isset($_SERVER['HTTP_REFERER'])) {
        return false;
    }

    $referer = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
    foreach (ALLOWED_REFERERS as $allowed) {
        if (strpos($referer, $allowed) !== false) {
            return true;
        }
    }
    return false;
}

/**
 * Honeypotチェック（スパム対策）
 */
function checkHoneypot($honeypotValue) {
    // Honeypotフィールドが空でない場合はスパム
    return empty($honeypotValue);
}

/**
 * レート制限チェック
 */
function checkRateLimit() {
    if (!RATE_LIMIT_ENABLED) {
        return true;
    }

    $ip = $_SERVER['REMOTE_ADDR'];
    $currentTime = time();

    if (!isset($_SESSION['last_submit_time'])) {
        $_SESSION['last_submit_time'] = [];
    }

    if (isset($_SESSION['last_submit_time'][$ip])) {
        $timeDiff = $currentTime - $_SESSION['last_submit_time'][$ip];
        if ($timeDiff < RATE_LIMIT_SECONDS) {
            return false;
        }
    }

    $_SESSION['last_submit_time'][$ip] = $currentTime;
    return true;
}

/**
 * エラーログの記録
 */
function logError($message) {
    $logDir = dirname(ERROR_LOG_FILE);
    if (!file_exists($logDir)) {
        mkdir($logDir, 0755, true);
    }

    $timestamp = date('Y-m-d H:i:s');
    $ip = $_SERVER['REMOTE_ADDR'];
    $logMessage = "[{$timestamp}] IP: {$ip} - {$message}\n";
    error_log($logMessage, 3, ERROR_LOG_FILE);
}

/**
 * 入力値の検証
 */
function validateFormData($data) {
    $errors = [];

    // 必須項目チェック
    if (empty($data['name'])) {
        $errors[] = 'お名前を入力してください';
    }

    if (empty($data['email'])) {
        $errors[] = 'メールアドレスを入力してください';
    } elseif (!validateEmail($data['email'])) {
        $errors[] = 'メールアドレスの形式が正しくありません';
    }

    if (empty($data['subject'])) {
        $errors[] = 'お問い合わせ種別を選択してください';
    }

    if (empty($data['message'])) {
        $errors[] = 'お問い合わせ内容を入力してください';
    }

    // 文字数制限
    if (strlen($data['name']) > 100) {
        $errors[] = 'お名前は100文字以内で入力してください';
    }

    if (strlen($data['message']) > 5000) {
        $errors[] = 'お問い合わせ内容は5000文字以内で入力してください';
    }

    return $errors;
}

/**
 * JSONレスポンスの送信
 */
function sendJsonResponse($success, $message, $data = []) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
        'success' => $success,
        'message' => $message,
        'data' => $data
    ], JSON_UNESCAPED_UNICODE);
    exit;
}
