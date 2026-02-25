<?php
/**
 * ルート定義
 */

// 注意: 'home' は .htaccess/router.php で '/' へ 301 リダイレクトするため
// ルート定義には含めない（重複コンテンツ防止）
define('ROUTES', [
    '' => [
        'page_key' => 'home',
        'view' => 'pages/home.php',
        'title' => '株式会社DIG-UP DATA - 未来を創造する企業'
    ],
    'vision' => [
        'page_key' => 'vision',
        'view' => 'pages/vision.php',
        'title' => '私たちのビジョン - 株式会社DIG-UP DATA'
    ],
    'services' => [
        'page_key' => 'services',
        'view' => 'pages/services.php',
        'title' => 'サービス - 株式会社DIG-UP DATA'
    ],
    'company' => [
        'page_key' => 'company',
        'view' => 'pages/company.php',
        'title' => '会社概要 - 株式会社DIG-UP DATA'
    ],
    'careers' => [
        'page_key' => 'careers',
        'view' => 'pages/careers.php',
        'title' => '採用情報 - 株式会社DIG-UP DATA'
    ],
    'contact' => [
        'page_key' => 'contact',
        'view' => 'pages/contact.php',
        'title' => 'お問い合わせ - 株式会社DIG-UP DATA'
    ],
    'thanks' => [
        'page_key' => 'thanks',
        'view' => 'pages/thanks.php',
        'title' => '送信完了 - 株式会社DIG-UP DATA'
    ],
    'privacy' => [
        'page_key' => 'privacy',
        'view' => 'pages/privacy.php',
        'title' => 'プライバシーポリシー - 株式会社DIG-UP DATA'
    ],
    'compliance' => [
        'page_key' => 'compliance',
        'view' => 'pages/compliance.php',
        'title' => 'コンプライアンスポリシー - 株式会社DIG-UP DATA'
    ],
    'recruit-privacy' => [
        'page_key' => 'recruit-privacy',
        'view' => 'pages/recruit-privacy.php',
        'title' => '採用活動における個人情報の取扱い - 株式会社DIG-UP DATA'
    ]
]);

function getRoute($route) {
    return ROUTES[$route] ?? null;
}

function routeExists($route) {
    return isset(ROUTES[$route]);
}
