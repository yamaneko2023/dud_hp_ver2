<?php
/**
 * メール送信処理
 */

// 文字化け対策：文字エンコーディングの設定
mb_language('Japanese');
mb_internal_encoding('UTF-8');

require_once __DIR__ . '/../config/cfg_app.php';
require_once __DIR__ . '/../config/cfg_security.php';

// セッション開始
startSecureSession();

// メール送信が無効の場合
if (!MAIL_ENABLED) {
    sendJsonResponse(false, 'メール送信機能は現在無効になっています');
}

// POSTリクエストのみ受け付ける
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendJsonResponse(false, '不正なリクエストです');
}

// リファラーチェック
if (!checkReferer()) {
    logError('Invalid referer');
    sendJsonResponse(false, '不正なアクセスです');
}

// CSRFトークンの検証
$token = $_POST[CSRF_TOKEN_NAME] ?? '';
if (!verifyCSRFToken($token)) {
    logError('CSRF token validation failed');
    sendJsonResponse(false, '不正なリクエストです（CSRFトークンエラー）');
}

// Honeypotチェック
if (HONEYPOT_ENABLED) {
    $honeypot = $_POST[HONEYPOT_FIELD_NAME] ?? '';
    if (!checkHoneypot($honeypot)) {
        logError('Honeypot triggered');
        sendJsonResponse(false, '不正なリクエストです');
    }
}

// レート制限チェック
if (!checkRateLimit()) {
    sendJsonResponse(false, '送信間隔が短すぎます。しばらく時間をおいてから再度お試しください。');
}

// フォームデータの取得とサニタイズ
$formData = [
    'name' => sanitizeInput($_POST['name'] ?? ''),
    'title' => sanitizeInput($_POST['title'] ?? ''),
    'email' => sanitizeInput($_POST['email'] ?? ''),
    'subject' => sanitizeInput($_POST['subject'] ?? ''),
    'message' => sanitizeInput($_POST['message'] ?? '')
];

// バリデーション
$errors = validateFormData($formData);
if (!empty($errors)) {
    sendJsonResponse(false, implode('、', $errors));
}

// メールヘッダーインジェクション対策
$formData['name'] = sanitizeEmailHeader($formData['name']);
$formData['email'] = sanitizeEmailHeader($formData['email']);

// 件名の設定
$subjectMap = [
    'recruitment' => '求人応募について',
    'service' => 'サービスについて',
    'other' => 'その他'
];
$subjectText = $subjectMap[$formData['subject']] ?? 'お問い合わせ';

// 管理者宛メールの送信
$to = MAIL_TO;
$subject = '【お問い合わせ】' . $subjectText . ' - ' . $formData['name'] . '様より';
$message = createAdminMailBody($formData);
$headers = createMailHeaders($formData['email'], $formData['name']);

$mailSent = false;
if (MAIL_MODE === 'mail') {
    // PHP mb_send_mail()関数を使用（日本語対応）
    $mailSent = @mb_send_mail($to, $subject, $message, $headers);
} else {
    // SMTP送信の場合（PHPMailer使用）
    $mailSent = sendMailViaSMTP($to, $subject, $message, $formData['email'], $formData['name']);
}

if (!$mailSent) {
    logError('Mail sending failed: ' . (error_get_last()['message'] ?? 'Unknown error'));
    sendJsonResponse(false, 'メール送信に失敗しました。しばらく時間をおいてから再度お試しください。');
}

// 自動返信メールの送信
if (AUTO_REPLY_ENABLED) {
    sendAutoReplyMail($formData);
}

// 送信成功
sendJsonResponse(true, 'お問い合わせを受け付けました。ありがとうございます。');

/**
 * 管理者宛メール本文の作成
 */
function createAdminMailBody($data) {
    $body = "お問い合わせがありました。\n\n";
    $body .= "━━━━━━━━━━━━━━━━━━━━━━━━\n";
    $body .= "■ お名前\n";
    $body .= $data['name'] . "\n\n";

    if (!empty($data['title'])) {
        $body .= "■ 題名\n";
        $body .= $data['title'] . "\n\n";
    }

    $body .= "■ メールアドレス\n";
    $body .= $data['email'] . "\n\n";

    $body .= "■ お問い合わせ種別\n";
    $subjectMap = [
        'recruitment' => '求人応募について',
        'service' => 'サービスについて',
        'other' => 'その他'
    ];
    $body .= $subjectMap[$data['subject']] ?? $data['subject'];
    $body .= "\n\n";

    $body .= "■ お問い合わせ内容\n";
    $body .= $data['message'] . "\n\n";
    $body .= "━━━━━━━━━━━━━━━━━━━━━━━━\n\n";

    $body .= "送信日時: " . date('Y年m月d日 H:i:s') . "\n";
    $body .= "送信元IP: " . $_SERVER['REMOTE_ADDR'] . "\n";

    return $body;
}

/**
 * メールヘッダーの作成
 */
function createMailHeaders($fromEmail, $fromName) {
    $headers = "From: " . mb_encode_mimeheader(MAIL_FROM_NAME) . " <" . MAIL_TO . ">\r\n";
    $headers .= "Reply-To: " . mb_encode_mimeheader($fromName) . " <" . $fromEmail . ">\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    return $headers;
}

/**
 * 自動返信メールの送信
 */
function sendAutoReplyMail($data) {
    $to = $data['email'];
    $subject = 'お問い合わせありがとうございます - ' . AUTO_REPLY_FROM_NAME;
    $message = createAutoReplyMailBody($data);

    if (MAIL_MODE === 'mail') {
        $headers = "From: " . mb_encode_mimeheader(AUTO_REPLY_FROM_NAME) . " <" . AUTO_REPLY_FROM . ">\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
        // PHP mb_send_mail()関数を使用（日本語対応）
        @mb_send_mail($to, $subject, $message, $headers);
    } else {
        sendMailViaSMTP($to, $subject, $message, AUTO_REPLY_FROM, AUTO_REPLY_FROM_NAME);
    }
}

/**
 * 自動返信メール本文の作成
 */
function createAutoReplyMailBody($data) {
    $body = $data['name'] . " 様\n\n";
    $body .= "この度は、お問い合わせいただきありがとうございます。\n";
    $body .= "以下の内容でお問い合わせを受け付けました。\n\n";
    $body .= "━━━━━━━━━━━━━━━━━━━━━━━━\n";
    $body .= "■ お名前\n";
    $body .= $data['name'] . "\n\n";

    if (!empty($data['title'])) {
        $body .= "■ 題名\n";
        $body .= $data['title'] . "\n\n";
    }

    $body .= "■ メールアドレス\n";
    $body .= $data['email'] . "\n\n";

    $subjectMap = [
        'recruitment' => '求人応募について',
        'service' => 'サービスについて',
        'other' => 'その他'
    ];
    $body .= "■ お問い合わせ種別\n";
    $body .= $subjectMap[$data['subject']] ?? $data['subject'];
    $body .= "\n\n";

    $body .= "■ お問い合わせ内容\n";
    $body .= $data['message'] . "\n\n";
    $body .= "━━━━━━━━━━━━━━━━━━━━━━━━\n\n";
    $body .= "担当者より折り返しご連絡させていただきますので、\n";
    $body .= "しばらくお待ちくださいますようお願い申し上げます。\n\n";
    $body .= "※このメールは自動送信です。\n";
    $body .= "※このメールに心当たりのない方は、お手数ですが削除をお願いいたします。\n\n";
    $body .= "━━━━━━━━━━━━━━━━━━━━━━━━\n";
    $body .= AUTO_REPLY_FROM_NAME . "\n";
    $body .= "〒220-0004 神奈川県横浜市西区北幸一丁目１１番１号水信ビル７階\n";
    $body .= "Email: " . AUTO_REPLY_FROM . "\n";
    $body .= "Web: https://digup-data.co.jp\n";
    $body .= "━━━━━━━━━━━━━━━━━━━━━━━━\n";

    return $body;
}

/**
 * SMTPでメール送信（PHPMailer使用）
 */
function sendMailViaSMTP($to, $subject, $message, $replyToEmail, $replyToName) {
    require_once __DIR__ . '/../vendor/PHPMailer/PHPMailer.php';
    require_once __DIR__ . '/../vendor/PHPMailer/SMTP.php';
    require_once __DIR__ . '/../vendor/PHPMailer/Exception.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        // SMTP設定
        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USERNAME;
        $mail->Password = SMTP_PASSWORD;
        $mail->SMTPSecure = SMTP_ENCRYPTION;
        $mail->Port = SMTP_PORT;
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';

        // 送信者・受信者設定
        $mail->setFrom(SMTP_USERNAME, MAIL_FROM_NAME);
        $mail->addAddress($to);
        $mail->addReplyTo($replyToEmail, $replyToName);

        // メール内容
        $mail->Subject = $subject;
        $mail->Body = $message;

        // 送信
        $mail->send();
        return true;
    } catch (Exception $e) {
        logError('SMTP Error: ' . $mail->ErrorInfo);
        return false;
    }
}
