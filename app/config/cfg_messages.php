<?php
/**
 * メッセージ定数
 *
 * このファイルには全てのユーザー向けメッセージを定義します。
 * エラーメッセージ、成功メッセージ、バリデーションメッセージなど。
 */

// ===== フォームバリデーションメッセージ =====

// 必須項目エラー
define('MSG_ERROR_NAME_REQUIRED', 'お名前を入力してください');
define('MSG_ERROR_EMAIL_REQUIRED', 'メールアドレスを入力してください');
define('MSG_ERROR_SUBJECT_REQUIRED', 'お問い合わせ種別を選択してください');
define('MSG_ERROR_MESSAGE_REQUIRED', 'お問い合わせ内容を入力してください');

// 形式エラー
define('MSG_ERROR_EMAIL_INVALID', 'メールアドレスの形式が正しくありません');

// 文字数制限エラー
define('MSG_ERROR_NAME_TOO_LONG', 'お名前は' . FORM_NAME_MAX_LENGTH . '文字以内で入力してください');
define('MSG_ERROR_MESSAGE_TOO_LONG', 'お問い合わせ内容は' . FORM_MESSAGE_MAX_LENGTH . '文字以内で入力してください');

// フォーム制限値
define('FORM_NAME_MAX_LENGTH', 100);
define('FORM_MESSAGE_MAX_LENGTH', 5000);

// ===== セキュリティエラーメッセージ =====

define('MSG_ERROR_MAIL_DISABLED', 'メール送信機能は現在無効になっています');
define('MSG_ERROR_INVALID_REQUEST', '不正なリクエストです');
define('MSG_ERROR_INVALID_ACCESS', '不正なアクセスです');
define('MSG_ERROR_CSRF_TOKEN', '不正なリクエストです（CSRFトークンエラー）');
define('MSG_ERROR_RATE_LIMIT', '送信間隔が短すぎます。しばらく時間をおいてから再度お試しください。');
define('MSG_ERROR_HONEYPOT', 'スパム送信と判定されました');

// ===== メール送信関連メッセージ =====

define('MSG_ERROR_MAIL_FAILED', 'メール送信に失敗しました。しばらく時間をおいてから再度お試しください。');
define('MSG_SUCCESS_MAIL_SENT', 'お問い合わせを受け付けました。ありがとうございます。');

// ===== 自動返信メール本文テンプレート =====

define('MAIL_AUTO_REPLY_GREETING', 'この度は、お問い合わせいただきありがとうございます。');
define('MAIL_AUTO_REPLY_CONFIRMATION', '以下の内容でお問い合わせを受け付けました。');
define('MAIL_AUTO_REPLY_NOTICE', '※ このメールは自動送信されています。');
define('MAIL_AUTO_REPLY_CONTACT', 'このメールにお心当たりのない場合は、お手数ですが下記までご連絡ください。');
define('MAIL_AUTO_REPLY_FOOTER', '今後とも何卒よろしくお願い申し上げます。');

// ===== メール本文ラベル =====

define('MAIL_LABEL_NAME', '■ お名前');
define('MAIL_LABEL_EMAIL', '■ メールアドレス');
define('MAIL_LABEL_TITLE', '■ 題名');
define('MAIL_LABEL_SUBJECT', '■ お問い合わせ種別');
define('MAIL_LABEL_MESSAGE', '■ お問い合わせ内容');
define('MAIL_LABEL_TIMESTAMP', '■ 送信日時');

// ===== JavaScript用エラーメッセージ（コメントのみ、実際の値はjs/config.jsで定義）=====

// 'CSRFトークンの取得に失敗しました'
// 'セキュリティトークンの取得に失敗しました'
// '送信中にエラーが発生しました。しばらく時間をおいてから再度お試しください。'
