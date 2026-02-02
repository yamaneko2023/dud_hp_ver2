<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : '株式会社DIG-UP DATA'; ?></title>
    <link rel="icon" type="image/svg+xml" href="../../img/company_logo.svg">
    <link rel="stylesheet" href="../../css/style.css">
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
