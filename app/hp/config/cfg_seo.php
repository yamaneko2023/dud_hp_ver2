<?php
/**
 * SEO設定ファイル
 *
 * このファイルには各ページのSEOメタデータを定義します。
 * - meta description
 * - OGP (Open Graph Protocol)
 * - Twitter Card
 * - canonical URL
 */

require_once __DIR__ . '/cfg_company.php';

/**
 * ページごとのメタディスクリプション
 *
 * @param string $pageKey ページキー（'home', 'vision'など）
 * @return string メタディスクリプション（120-160文字）
 */
function getMetaDescription($pageKey) {
    $descriptions = [
        'home' => '株式会社DIG-UP DATAは横浜を拠点に、AI開発、データ分析、DX/AX推進支援を提供するテクノロジー企業です。データの力でビジネス変革を実現します。',
        'vision' => 'DIG-UP DATAのビジョン。社会貢献、お客様との共創、私たちの成長。3つの要素が高め合う持続可能な関係を目指します。',
        'services' => 'LLMアプリケーション開発、データ分析、DX/AX推進支援、Webシステム構築、LLM活用指南の5つのコアサービスでビジネスを加速します。横浜のテクノロジー企業DIG-UP DATA。',
        'company' => '株式会社DIG-UP DATAの会社概要。2023年設立、横浜を拠点にAI・データ分析・DX/AX推進支援を提供するテクノロジー企業です。',
        'careers' => 'DIG-UP DATAの採用情報。挑戦を恐れず、学び続ける環境。テクノロジーで未来を創る仲間を募集しています。横浜勤務・テレワーク可。',
        'contact' => '株式会社DIG-UP DATAへのお問い合わせフォーム。LLMアプリケーション開発、データ分析、DX/AX推進支援に関するご相談はこちらから。お気軽にお問い合わせください。',
        'thanks' => 'お問い合わせありがとうございます。担当者より折り返しご連絡いたします。株式会社DIG-UP DATA',
        'privacy' => '株式会社DIG-UP DATAのプライバシーポリシー。個人情報の取扱い、利用目的、第三者提供、開示請求について説明しています。',
        'compliance' => '株式会社DIG-UP DATAのコンプライアンスポリシー。法令遵守、企業倫理、情報セキュリティに関する基本方針を定めています。',
        'recruit-privacy' => 'DIG-UP DATAの採用活動における個人情報の取扱いについて。応募者情報の利用目的、保管期間、第三者提供について説明しています。',
        'announcements' => '株式会社DIG-UP DATAのお知らせ一覧。「神奈川を代表する企業100選 2026-2027」選出情報やプレスリリース、会社からのお知らせをご覧いただけます。'
    ];

    return $descriptions[$pageKey] ?? COMPANY_NAME_JP . ' - ' . COMPANY_DOMAIN;
}

/**
 * ページごとのキーワード
 *
 * @param string $pageKey ページキー
 * @return string メタキーワード（カンマ区切り）
 */
function getMetaKeywords($pageKey) {
    $keywords = [
        'home' => 'DIG-UP DATA,LLMアプリケーション開発,データ分析,DX/AX推進支援,横浜,テクノロジー企業,生成AI,Webシステム構築',
        'vision' => 'ビジョン,企業理念,社会貢献,共創,成長,持続可能,DIG-UP DATA',
        'services' => 'LLMアプリケーション開発,データ分析,DX/AX推進支援,Webシステム構築,LLM活用指南,チャットボット,業務自動化',
        'company' => '会社概要,企業情報,横浜,DIG-UP DATA,設立2023年,テクノロジー企業',
        'careers' => '採用情報,求人,エンジニア募集,AI開発,データサイエンティスト,横浜勤務,テレワーク',
        'contact' => 'お問い合わせ,相談,見積もり,AI開発相談,DX推進相談,データ分析相談',
        'privacy' => 'プライバシーポリシー,個人情報保護,情報セキュリティ',
        'compliance' => 'コンプライアンス,法令遵守,企業倫理,情報セキュリティ',
        'recruit-privacy' => '採用,個人情報,プライバシーポリシー,応募者情報',
        'announcements' => 'お知らせ,神奈川を代表する企業100選,プレスリリース,DIG-UP DATA,ニュース'
    ];

    return $keywords[$pageKey] ?? COMPANY_NAME_JP;
}

/**
 * OGP画像URLを取得
 *
 * @param string $pageKey ページキー
 * @return string OGP画像のURL
 */
function getOgpImage($pageKey) {
    $baseUrl = COMPANY_URL;

    // ページごとに異なる画像を設定することも可能
    $images = [
        'home' => $baseUrl . '/img/home_company.png',
        'vision' => $baseUrl . '/img/2_vision_contribution_to_society.png',
        'services' => $baseUrl . '/img/home_company.png',
        'company' => $baseUrl . '/img/home_company.png',
        'careers' => $baseUrl . '/img/home_team.png',
        'contact' => $baseUrl . '/img/home_company.png',
        'thanks' => $baseUrl . '/img/home_company.png',
        'privacy' => $baseUrl . '/img/company_logo.svg',
        'compliance' => $baseUrl . '/img/company_logo.svg',
        'recruit-privacy' => $baseUrl . '/img/company_logo.svg',
        'announcements' => $baseUrl . '/img/100sen/emblem_horizontal.png'
    ];

    return $images[$pageKey] ?? ($baseUrl . '/img/home_company.png');
}

/**
 * canonical URLを取得
 *
 * @param string $pageKey ページキー
 * @return string canonical URL
 */
function getCanonicalUrl($pageKey) {
    $baseUrl = COMPANY_URL;

    $urls = [
        'home' => $baseUrl . '/',
        'vision' => $baseUrl . '/vision',
        'services' => $baseUrl . '/services',
        'company' => $baseUrl . '/company',
        'careers' => $baseUrl . '/careers',
        'contact' => $baseUrl . '/contact',
        'thanks' => $baseUrl . '/thanks',
        'privacy' => $baseUrl . '/privacy',
        'compliance' => $baseUrl . '/compliance',
        'recruit-privacy' => $baseUrl . '/recruit-privacy',
        'announcements' => $baseUrl . '/announcements'
    ];

    return $urls[$pageKey] ?? $baseUrl;
}

/**
 * OGP typeを取得
 *
 * @param string $pageKey ページキー
 * @return string OGP type
 */
function getOgpType($pageKey) {
    // homeページはwebsite、それ以外はarticle
    return ($pageKey === 'home') ? 'website' : 'article';
}

/**
 * Twitter Cardのtypeを取得
 *
 * @param string $pageKey ページキー
 * @return string Twitter Card type
 */
function getTwitterCardType($pageKey) {
    // 画像を大きく表示したいページはsummary_large_image
    $largeImagePages = ['home', 'vision', 'services', 'careers', 'announcements'];

    return in_array($pageKey, $largeImagePages) ? 'summary_large_image' : 'summary';
}

/**
 * パンくずリストのデータを取得
 *
 * @param string $pageKey ページキー
 * @return array パンくずリストの配列
 */
function getBreadcrumbs($pageKey) {
    $baseUrl = COMPANY_URL;

    $breadcrumbs = [
        'home' => [
            ['name' => 'Home', 'url' => $baseUrl . '/']
        ],
        'vision' => [
            ['name' => 'Home', 'url' => $baseUrl . '/'],
            ['name' => 'Our Vision', 'url' => $baseUrl . '/vision']
        ],
        'services' => [
            ['name' => 'Home', 'url' => $baseUrl . '/'],
            ['name' => 'Services', 'url' => $baseUrl . '/services']
        ],
        'company' => [
            ['name' => 'Home', 'url' => $baseUrl . '/'],
            ['name' => 'Company', 'url' => $baseUrl . '/company']
        ],
        'careers' => [
            ['name' => 'Home', 'url' => $baseUrl . '/'],
            ['name' => 'Careers', 'url' => $baseUrl . '/careers']
        ],
        'contact' => [
            ['name' => 'Home', 'url' => $baseUrl . '/'],
            ['name' => 'Contact', 'url' => $baseUrl . '/contact']
        ],
        'privacy' => [
            ['name' => 'Home', 'url' => $baseUrl . '/'],
            ['name' => 'Privacy Policy', 'url' => $baseUrl . '/privacy']
        ],
        'compliance' => [
            ['name' => 'Home', 'url' => $baseUrl . '/'],
            ['name' => 'Compliance', 'url' => $baseUrl . '/compliance']
        ],
        'recruit-privacy' => [
            ['name' => 'Home', 'url' => $baseUrl . '/'],
            ['name' => 'Recruit Privacy', 'url' => $baseUrl . '/recruit-privacy']
        ],
        'announcements' => [
            ['name' => 'Home', 'url' => $baseUrl . '/'],
            ['name' => 'Announcements', 'url' => $baseUrl . '/announcements']
        ],
        'thanks' => [
            ['name' => 'Home', 'url' => $baseUrl . '/'],
            ['name' => 'Contact', 'url' => $baseUrl . '/contact'],
            ['name' => 'Thanks', 'url' => $baseUrl . '/thanks']
        ]
    ];

    return $breadcrumbs[$pageKey] ?? [['name' => 'Home', 'url' => $baseUrl . '/']];
}

/**
 * パンくずリストのJSON-LDを生成
 *
 * @param string $pageKey ページキー
 * @return string JSON-LD形式のパンくずリスト
 */
function getBreadcrumbJsonLd($pageKey) {
    $breadcrumbs = getBreadcrumbs($pageKey);

    $itemListElement = [];
    foreach ($breadcrumbs as $index => $item) {
        $itemListElement[] = [
            '@type' => 'ListItem',
            'position' => $index + 1,
            'name' => $item['name'],
            'item' => $item['url']
        ];
    }

    $jsonLd = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => $itemListElement
    ];

    return json_encode($jsonLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}
