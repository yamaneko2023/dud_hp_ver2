<?php
/**
 * PHP ビルトインサーバー用ルーター
 * 使い方: php -S localhost:8000 router.php
 * .htaccess の代わりにルーティングを処理
 */

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// 静的ファイルはそのまま配信
$staticExtensions = ['css', 'js', 'png', 'jpg', 'jpeg', 'gif', 'svg', 'webp', 'mp4', 'webm', 'ico', 'woff', 'woff2', 'ttf'];
$ext = pathinfo($uri, PATHINFO_EXTENSION);
if (in_array($ext, $staticExtensions) && file_exists(__DIR__ . $uri)) {
    return false; // ビルトインサーバーにファイル配信を任せる
}

// APIリクエストはそのまま
if (preg_match('#^/api/#', $uri)) {
    $apiFile = __DIR__ . $uri;
    if (file_exists($apiFile)) {
        require $apiFile;
        return true;
    }
}

// /home → / へリダイレクト
if ($uri === '/home') {
    header('Location: /', true, 301);
    exit;
}

// クリーンURLを処理
$route = ltrim($uri, '/');
$_GET['route'] = $route;
require __DIR__ . '/index.php';
return true;
