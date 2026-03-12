<?php
// SEO設定を読み込み（APP_DIRはindex.phpで定義済み）
require_once APP_DIR . '/config/cfg_seo.php';

// ページキーが未設定の場合はデフォルト値
$page_key = $page_key ?? 'home';

// SEOメタデータを取得
$meta_description = getMetaDescription($page_key);
$meta_keywords = getMetaKeywords($page_key);
$ogp_image = getOgpImage($page_key);
$canonical_url = getCanonicalUrl($page_key);
$ogp_type = getOgpType($page_key);
$twitter_card_type = getTwitterCardType($page_key);
$page_title_text = isset($page_title) ? $page_title : '株式会社DIG-UP DATA';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <!-- 基本メタタグ -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars($meta_description, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($meta_keywords, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="author" content="<?php echo COMPANY_NAME_JP; ?>">

    <!-- タイトル -->
    <title><?php echo htmlspecialchars($page_title_text, ENT_QUOTES, 'UTF-8'); ?></title>

    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo htmlspecialchars($canonical_url, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- OGP (Open Graph Protocol) -->
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title_text, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($meta_description, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:type" content="<?php echo $ogp_type; ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonical_url, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($ogp_image, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:site_name" content="<?php echo COMPANY_NAME_JP; ?>">
    <meta property="og:locale" content="ja_JP">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="<?php echo $twitter_card_type; ?>">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($page_title_text, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($meta_description, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($ogp_image, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="/img/company_logo.svg">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="/css/style.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Zen+Kaku+Gothic+New:wght@300;400;500;700;900&family=Noto+Sans+JP:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- パンくずリスト JSON-LD -->
    <?php if ($page_key !== 'home'): ?>
    <script type="application/ld+json">
    <?php echo getBreadcrumbJsonLd($page_key); ?>
    </script>
    <?php endif; ?>
</head>
<body>
    <!-- ナビゲーション -->
    <nav class="navbar">
        <div class="container">
            <a href="/" class="logo">
                <img src="/img/company_logo.svg" alt="DIG-UP DATA Inc." loading="eager">
                <span class="company-name">DIG-UP DATA Inc.</span>
            </a>
            <a href="https://madeinlocal.jp/category/companies/kanagawa079"
               target="_blank" rel="noopener noreferrer"
               class="navbar-award-badge">
                <picture>
                    <source media="(max-width: 768px)" srcset="/img/100sen/emblem.png">
                    <img src="/img/100sen/emblem_horizontal.png"
                         alt="神奈川100選 2026-2027"
                         class="navbar-award-emblem">
                </picture>
                <span class="navbar-award-text">に選ばれました</span>
            </a>
            <ul class="nav-menu">
                <li><a href="/">Home</a></li>
                <li><a href="/vision">Our Vision</a></li>
                <li><a href="/services">Services</a></li>
                <li><a href="/company">Company</a></li>
                <li><a href="/announcements">News</a></li>
                <li><a href="/careers">Careers</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <!-- パンくずリスト -->
    <?php if ($page_key !== 'home'): ?>
    <nav class="breadcrumb" aria-label="Breadcrumb">
        <div class="container">
            <ol class="breadcrumb-list">
                <?php
                $breadcrumbs = getBreadcrumbs($page_key);
                $lastIndex = count($breadcrumbs) - 1;
                foreach ($breadcrumbs as $index => $item):
                    $isLast = ($index === $lastIndex);
                ?>
                    <li class="breadcrumb-item <?php echo $isLast ? 'active' : ''; ?>">
                        <?php if ($isLast): ?>
                            <span><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></span>
                        <?php else: ?>
                            <a href="<?php echo htmlspecialchars($item['url'], ENT_QUOTES, 'UTF-8'); ?>">
                                <?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </nav>
    <?php endif; ?>
