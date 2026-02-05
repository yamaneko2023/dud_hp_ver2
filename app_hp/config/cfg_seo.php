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
        'services' => 'AI開発、データ分析、DX/AX推進、Webシステム構築、生成AI教育など6つのコアサービスでビジネスを加速します。横浜のテクノロジー企業DIG-UP DATA。',
        'company' => '株式会社DIG-UP DATAの会社概要。2023年設立、横浜を拠点にAI・データ分析・DX推進支援を提供するテクノロジー企業です。',
        'careers' => 'DIG-UP DATAの採用情報。挑戦を恐れず、学び続ける環境。テクノロジーで未来を創る仲間を募集しています。横浜勤務・テレワーク可。',
        'contact' => '株式会社DIG-UP DATAへのお問い合わせフォーム。AI開発、データ分析、DX推進支援に関するご相談はこちらから。お気軽にお問い合わせください。',
        'thanks' => 'お問い合わせありがとうございます。担当者より折り返しご連絡いたします。株式会社DIG-UP DATA',
        'privacy' => '株式会社DIG-UP DATAのプライバシーポリシー。個人情報の取り扱い、利用目的、第三者提供、開示請求について説明しています。',
        'compliance' => '株式会社DIG-UP DATAのコンプライアンスポリシー。法令遵守、企業倫理、情報セキュリティに関する基本方針を定めています。',
        'recruit-privacy' => 'DIG-UP DATAの採用活動における個人情報の取扱いについて。応募者情報の利用目的、保管期間、第三者提供について説明しています。'
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
        'home' => 'DIG-UP DATA,AI開発,データ分析,DX推進,AX推進,横浜,テクノロジー企業,生成AI,Webシステム開発',
        'vision' => 'ビジョン,企業理念,社会貢献,共創,成長,持続可能,DIG-UP DATA',
        'services' => 'AI開発,データ分析,DX推進,AX推進,Webシステム構築,生成AI教育,チャットボット,業務自動化',
        'company' => '会社概要,企業情報,横浜,DIG-UP DATA,設立2023年,テクノロジー企業',
        'careers' => '採用情報,求人,エンジニア募集,AI開発,データサイエンティスト,横浜勤務,テレワーク',
        'contact' => 'お問い合わせ,相談,見積もり,AI開発相談,DX推進相談,データ分析相談',
        'privacy' => 'プライバシーポリシー,個人情報保護,情報セキュリティ',
        'compliance' => 'コンプライアンス,法令遵守,企業倫理,情報セキュリティ',
        'recruit-privacy' => '採用,個人情報,プライバシーポリシー,応募者情報'
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
        'recruit-privacy' => $baseUrl . '/img/company_logo.svg'
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
        'home' => $baseUrl . '/app_hp/public/home.php',
        'vision' => $baseUrl . '/app_hp/public/vision.php',
        'services' => $baseUrl . '/app_hp/public/services.php',
        'company' => $baseUrl . '/app_hp/public/company.php',
        'careers' => $baseUrl . '/app_hp/public/careers.php',
        'contact' => $baseUrl . '/app_hp/public/contact.php',
        'thanks' => $baseUrl . '/app_hp/public/thanks.php',
        'privacy' => $baseUrl . '/app_hp/public/privacy.php',
        'compliance' => $baseUrl . '/app_hp/public/compliance.php',
        'recruit-privacy' => $baseUrl . '/app_hp/public/recruit-privacy.php'
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
    $largeImagePages = ['home', 'vision', 'services', 'careers'];

    return in_array($pageKey, $largeImagePages) ? 'summary_large_image' : 'summary';
}
