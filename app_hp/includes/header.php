<?php
// SEO設定を読み込み
require_once __DIR__ . '/../config/cfg_seo.php';

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
    <link rel="icon" type="image/svg+xml" href="../../img/company_logo.svg">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../../css/style.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@300;400;500;700&family=Noto+Sans+JP:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- ナビゲーション -->
    <nav class="navbar">
        <div class="container">
            <a href="home.php" class="logo">
                <img src="../../img/company_logo.svg" alt="DIG-UP DATA Inc.">
                <span class="company-name">DIG-UP DATA Inc.</span>
            </a>
            <ul class="nav-menu">
                <li><a href="home.php">Home</a></li>
                <li><a href="vision.php">Our Vision</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="company.php">Company</a></li>
                <li><a href="careers.php">Careers</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>
