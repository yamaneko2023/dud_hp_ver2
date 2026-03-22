<?php
/**
 * ページ設定
 *
 * このファイルにはページごとの設定、ナビゲーションメニュー、フッターリンクなどを定義します。
 */

require_once __DIR__ . '/cfg_company.php';
require_once __DIR__ . '/cfg_constants.php';

// ===== ページタイトル生成関数 =====

/**
 * ページタイトルを生成
 *
 * @param string $pageKey ページキー（'home', 'vision'など）
 * @return string 完全なページタイトル
 */
function getPageTitle($pageKey) {
    $titles = [
        'home' => '未来を創造する企業',
        'vision' => '私たちのビジョン',
        'services' => 'サービス',
        'company' => '会社概要',
        'careers' => '採用情報',
        'contact' => 'お問い合わせ',
        'thanks' => '送信完了',
        'privacy' => 'プライバシーポリシー',
        'compliance' => 'コンプライアンスポリシー',
        'recruit-privacy' => '採用活動における個人情報の取扱い'
    ];

    if (isset($titles[$pageKey])) {
        return $titles[$pageKey] . ' - ' . COMPANY_NAME_JP;
    }

    return COMPANY_NAME_JP;
}

// ===== ナビゲーションメニュー =====

define('NAV_MENU', [
    [
        'label' => 'Home',
        'href' => PAGE_HOME,
        'key' => 'home'
    ],
    [
        'label' => 'Our Vision',
        'href' => PAGE_VISION,
        'key' => 'vision'
    ],
    [
        'label' => 'Services',
        'href' => PAGE_SERVICES,
        'key' => 'services'
    ],
    [
        'label' => 'Company',
        'href' => PAGE_COMPANY,
        'key' => 'company'
    ],
    [
        'label' => 'Careers',
        'href' => PAGE_CAREERS,
        'key' => 'careers'
    ],
    [
        'label' => 'Contact',
        'href' => PAGE_CONTACT,
        'key' => 'contact'
    ]
]);

// ===== フッターリンク =====

define('FOOTER_LINKS', [
    [
        'label' => 'プライバシーポリシー',
        'href' => PAGE_PRIVACY
    ],
    [
        'label' => 'コンプライアンスポリシー',
        'href' => PAGE_COMPLIANCE
    ],
    [
        'label' => '採用における個人情報の取扱い',
        'href' => PAGE_RECRUIT_PRIVACY
    ]
]);

// ===== ヘルパー関数 =====

/**
 * 現在のページがアクティブかチェック
 *
 * @param string $pageKey ページキー
 * @param string $currentPage 現在のページファイル名
 * @return bool アクティブならtrue
 */
function isActivePage($pageKey, $currentPage) {
    $pageMap = [
        'home' => PAGE_HOME,
        'vision' => PAGE_VISION,
        'services' => PAGE_SERVICES,
        'company' => PAGE_COMPANY,
        'careers' => PAGE_CAREERS,
        'contact' => PAGE_CONTACT
    ];

    return isset($pageMap[$pageKey]) && $pageMap[$pageKey] === $currentPage;
}

/**
 * ナビゲーションメニューをHTMLで出力
 *
 * @param string $currentPage 現在のページ
 * @return string HTML
 */
function renderNavMenu($currentPage = '') {
    $html = '';
    foreach (NAV_MENU as $item) {
        $active = isActivePage($item['key'], $currentPage) ? ' class="active"' : '';
        $html .= sprintf(
            '<li%s><a href="%s">%s</a></li>' . "\n",
            $active,
            htmlspecialchars($item['href']),
            htmlspecialchars($item['label'])
        );
    }
    return $html;
}

/**
 * フッターリンクをHTMLで出力
 *
 * @return string HTML
 */
function renderFooterLinks() {
    $html = '';
    foreach (FOOTER_LINKS as $item) {
        $html .= sprintf(
            '<a href="%s">%s</a>' . "\n",
            htmlspecialchars($item['href']),
            htmlspecialchars($item['label'])
        );
    }
    return $html;
}
