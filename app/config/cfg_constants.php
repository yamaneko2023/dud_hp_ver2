<?php
/**
 * パス定数とグローバル設定
 *
 * このファイルには相対パス、ファイルパス、その他のグローバル定数を定義します。
 * app_hp/public/ からの相対パスを基準とします。
 */

// ===== 相対パス定義（app_hp/public/ からの相対パス） =====

define('PATH_CSS', '../../css/');
define('PATH_JS', '../../js/');
define('PATH_IMG', '../../img/');
define('PATH_VIDEO', '../../video/');
define('PATH_INCLUDES', '../includes/');
define('PATH_API', '../api/');

// ===== ファイルパス =====

// テンプレート
define('FILE_HEADER', PATH_INCLUDES . 'header.php');
define('FILE_FOOTER', PATH_INCLUDES . 'footer.php');

// CSS
define('FILE_STYLE_CSS', PATH_CSS . 'style.css');
define('FILE_VARIABLES_CSS', PATH_CSS . 'variables.css');

// JavaScript
define('FILE_SCRIPT_JS', PATH_JS . 'script.js');
define('FILE_CONTACT_JS', PATH_JS . 'contact.js');
define('FILE_CONFIG_JS', PATH_JS . 'config.js');
define('FILE_ANIMATION_CONFIG_JS', PATH_JS . 'animation-config.js');
define('FILE_COMPANY_DATA_JS', PATH_JS . 'company-data.js');

// 画像
define('FILE_LOGO_SVG', PATH_IMG . 'company_logo.svg');

// 動画
define('FILE_VIDEO_HOME_BG', PATH_VIDEO . 'home_bkground.mp4');
define('FILE_VIDEO_HEADER_BG', PATH_VIDEO . 'header_bkground.mp4');
define('FILE_VIDEO_HEADER_SERVICE', PATH_VIDEO . 'header_service.mp4');
define('FILE_VIDEO_HEADER_COMPANY', PATH_VIDEO . 'header_company.mp4');
define('FILE_VIDEO_HEADER_RECRUIT', PATH_VIDEO . 'header_recruit.mp4');
define('FILE_VIDEO_VISION_HERO', PATH_VIDEO . '1_vision_hero.mp4');
define('FILE_VIDEO_VISION_TRIANGLE', PATH_VIDEO . '5_vision_traiangle.mp4');

// API
define('FILE_API_MAIL', PATH_API . 'mail.php');
define('FILE_API_TOKEN', PATH_API . 'token.php');

// ===== ページURL（ナビゲーション用） =====

define('PAGE_HOME', 'home.php');
define('PAGE_VISION', 'vision.php');
define('PAGE_SERVICES', 'services.php');
define('PAGE_COMPANY', 'company.php');
define('PAGE_CAREERS', 'careers.php');
define('PAGE_CONTACT', 'contact.php');
define('PAGE_THANKS', 'thanks.php');
define('PAGE_PRIVACY', 'privacy.php');
define('PAGE_COMPLIANCE', 'compliance.php');
define('PAGE_RECRUIT_PRIVACY', 'recruit-privacy.php');

// ===== その他の定数 =====

// デフォルトのページタイトルサフィックス
define('TITLE_SUFFIX', ' - 株式会社DIG-UP DATA');

// Google Fonts URL
define('GOOGLE_FONTS_URL', 'https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@300;400;500;700&family=Noto+Sans+JP:wght@300;400;500;700&display=swap');
