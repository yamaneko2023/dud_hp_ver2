/**
 * JavaScript 設定ファイル
 *
 * API設定、お問い合わせ種別、メッセージなどの定数を定義します。
 */

// ===== API設定 =====
const API_CONFIG = {
    TOKEN_ENDPOINT: '../api/token.php',
    MAIL_ENDPOINT: '../api/mail.php'
};

// ===== お問い合わせ種別マッピング =====
const CONTACT_SUBJECTS = {
    'recruitment': '求人応募について',
    'service': 'サービスについて',
    'other': 'その他'
};

// ===== メッセージ定数 =====
const MESSAGES = {
    // エラーメッセージ
    ERROR_TOKEN_FETCH: 'CSRFトークンの取得に失敗しました',
    ERROR_TOKEN_REQUIRED: 'セキュリティトークンの取得に失敗しました',
    ERROR_SEND_FAILED: '送信中にエラーが発生しました。しばらく時間をおいてから再度お試しください。',
    ERROR_PREFIX: 'エラー: ',

    // 成功メッセージ
    SUCCESS_SENT: '送信が完了しました'
};

// ===== フォーム設定 =====
const FORM_CONFIG = {
    // バリデーション設定
    NAME_MAX_LENGTH: 100,
    MESSAGE_MAX_LENGTH: 5000,

    // タイムアウト設定（ミリ秒）
    REQUEST_TIMEOUT: 30000, // 30秒

    // リダイレクト先
    SUCCESS_REDIRECT: 'thanks.php'
};

// ===== フリーズして変更不可にする =====
Object.freeze(API_CONFIG);
Object.freeze(CONTACT_SUBJECTS);
Object.freeze(MESSAGES);
Object.freeze(FORM_CONFIG);
