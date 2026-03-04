<?php
/**
 * メール送信設定ファイル
 * セキュリティのため、このファイルは公開ディレクトリの外に配置することを推奨します
 */

// メール送信機能のON/OFF
define('MAIL_ENABLED', true); // false にするとメール送信を無効化

// メール送信先
define('MAIL_TO', 'inquiry@mail.digup-data.com'); // 受信するメールアドレス

// メール送信元（フォームから送信されたように見せる）
define('MAIL_FROM_NAME', '株式会社DIG-UP DATA お問い合わせフォーム');

// 自動返信メール設定
define('AUTO_REPLY_ENABLED', false); // 自動返信メールを送るか
define('AUTO_REPLY_FROM', 'inquiry@mail.digup-data.com'); // 自動返信の送信元
define('AUTO_REPLY_FROM_NAME', '株式会社DIG-UP DATA');

// セキュリティ設定
define('CSRF_TOKEN_NAME', 'csrf_token');
define('SESSION_NAME', 'digup_data_session');

// スパム対策 - Honeypot（ボットが入力するダミーフィールド）
define('HONEYPOT_ENABLED', true);
define('HONEYPOT_FIELD_NAME', 'website'); // ボットだけが入力するフィールド名

// 送信制限（同じIPアドレスからの連続送信を防ぐ）
define('RATE_LIMIT_ENABLED', true);
define('RATE_LIMIT_SECONDS', 300); // 5分間に1回まで

// 許可するリファラー（CSRF対策）
define('ALLOWED_REFERERS', [
    'localhost',
    'digup-data.co.jp',
    '127.0.0.1'
]);

// エラーログの出力先
define('ERROR_LOG_FILE', __DIR__ . '/../../logs/error.log');

// メール送信モード（'mail' または 'smtp'）
define('MAIL_MODE', 'mail'); // PHP mail()関数を使用

// SMTP設定（MAIL_MODE が 'smtp' の場合のみ使用）
// === Gmail SMTPの設定例 ===
// 1. Googleアカウントで2段階認証を有効化
// 2. アプリパスワードを生成：https://myaccount.google.com/apppasswords
// 3. 下記にメールアドレスとアプリパスワードを設定
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', 'your-email@gmail.com'); // Gmailアドレス
define('SMTP_PASSWORD', 'your-app-password'); // アプリパスワード（16桁）
define('SMTP_ENCRYPTION', 'tls'); // 'tls' または 'ssl'

// === その他のSMTPサービス例 ===
// SendGrid: smtp.sendgrid.net (ポート 587)
// Mailgun: smtp.mailgun.org (ポート 587)
// Amazon SES: email-smtp.us-east-1.amazonaws.com (ポート 587)
