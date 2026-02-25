<?php
/**
 * フロントコントローラー
 * 公開ディレクトリ（public_html/）に配置
 * 非公開ディレクトリ（app/）を参照
 */

// エラー表示設定（本番環境）
error_reporting(0);
ini_set('display_errors', 0);

// 非公開ディレクトリのパス定義
define('APP_DIR', __DIR__ . '/../app');

// 設定ファイル読み込み
require_once APP_DIR . '/config/cfg_routes.php';
require_once APP_DIR . '/controllers/PageController.php';

// ルート取得
$route = $_GET['route'] ?? '';

// ルート検証（存在しないルートは404テンプレートへ）
if (!routeExists($route)) {
    header("HTTP/1.0 404 Not Found");
    $page_key = '404';
    $page_title = 'ページが見つかりません - 株式会社DIG-UP DATA';

    require APP_DIR . '/views/layouts/header.php';
    require APP_DIR . '/views/pages/404.php';
    require APP_DIR . '/views/layouts/footer.php';
    exit;
}

// ページ表示
$controller = new PageController();
$controller->render($route);
