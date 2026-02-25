<?php
/**
 * 企業情報定数
 *
 * このファイルには企業に関する全ての基本情報を定義します。
 * 企業名、住所、連絡先など、複数のファイルで使用される情報を一元管理します。
 */

// 企業名
define('COMPANY_NAME_JP', '株式会社DIG-UP DATA');
define('COMPANY_NAME_EN', 'DIG-UP DATA Inc.');

// 代表者情報
define('COMPANY_CEO', '永富 修一');

// 設立日
define('COMPANY_ESTABLISHED', '2023年1月4日');

// 住所
define('COMPANY_ADDRESS', '〒220-0004 神奈川県横浜市西区北幸一丁目１１番１号水信ビル７階');

// ドメイン・URL
define('COMPANY_DOMAIN', 'digup-data.co.jp');
define('COMPANY_URL', 'https://digup-data.co.jp');

// メールアドレス
define('COMPANY_EMAIL_INQUIRY', 'inquiry@mail.digup-data.com');  // お問い合わせ用
define('COMPANY_EMAIL_INFO', 'info@digupdata.co.jp');            // 一般情報用
define('COMPANY_EMAIL_PRIVACY', 'privacy@digupdata.co.jp');      // プライバシー担当

// ロゴパス（app_hp/public/ からの相対パス）
define('LOGO_PATH', '../../img/company_logo.svg');

// お問い合わせ種別マッピング
define('CONTACT_SUBJECTS', [
    'recruitment' => '求人応募について',
    'service' => 'サービスについて',
    'other' => 'その他'
]);

// メール本文用の区切り線
define('MAIL_SEPARATOR', '━━━━━━━━━━━━━━━━━━━━━━━━');
