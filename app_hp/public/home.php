<?php
$page_title = '株式会社DIG-UP DATA - 未来を創造する企業';

// JSONデータを読み込み
$announcements_json = file_get_contents('../../data/announcements.json');
$tech_news_json = file_get_contents('../../data/tech_news.json');
$featured_json = file_get_contents('../../data/featured.json');

// お知らせとテックニュースを結合してTickerデータを作成
$announcements = json_decode($announcements_json, true);
$tech_news = json_decode($tech_news_json, true);

// published: trueのお知らせのみを抽出
$published_announcements = array_filter($announcements, function($item) {
    return isset($item['published']) && $item['published'] === true;
});

// お知らせとテックニュースを結合
$ticker_data = array_merge($published_announcements, $tech_news);

// 日付順にソート（新しい順）
usort($ticker_data, function($a, $b) {
    return strtotime($b['date']) - strtotime($a['date']);
});

// 最新10件のみ
$ticker_data = array_slice($ticker_data, 0, 10);
$ticker_json = json_encode($ticker_data);
?>
<?php include '../includes/header.php'; ?>

    <!-- ヒーロー+ニュースコンテナ -->
    <div class="hero-news-container">
        <video class="hero-news-video" autoplay muted loop playsinline>
            <source src="../../video/home_bkground.mp4" type="video/mp4">
        </video>

        <!-- ヒーローセクション -->
        <section id="home" class="hero">
            <div class="hero-content">
                <h1 class="hero-title">Dig Up the Valuable Data<BR>Advance Your Business with AI</h1>
                <p class="hero-subtitle">データの力を引き出し、AIでビジネス変革に加速を</p>
            </div>
        </section>

        <!-- News Ticker（ティッカー） -->
        <section class="news-ticker-section">
            <div class="container">
                <div class="ticker-wrapper">
                    <div class="ticker-label">
                        <svg class="ticker-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>NEWS</span>
                    </div>
                    <div class="ticker-track" id="tickerTrack">
                        <!-- JavaScriptで動的に生成 -->
                    </div>
                </div>
            </div>
        </section>

        <!-- Bento Grid セクション -->
        <section class="bento-section">
            <div class="container">
                <div class="bento-grid">

                    <!-- 主要ページ - 大きめのタイル -->
                    <div class="bento-tile tile-large quick-links">
                        <div class="tile-header">
                            <svg class="tile-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                            <h3>サイトナビゲーション</h3>
                            <p class="tile-header-desc">各ページへ素早くアクセス</p>
                        </div>
                        <div class="quick-links-grid">
                            <a href="vision.php" class="page-card">
                                <div class="page-card-icon-wrapper">
                                    <svg class="page-card-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </div>
                                <div class="page-card-content">
                                    <h4 class="page-card-title">Our Vision</h4>
                                    <p class="page-card-desc">DIG-UP DATAが目指す未来と、社会・顧客・成長の3つの柱をご紹介</p>
                                </div>
                            </a>
                            <a href="services.php" class="page-card">
                                <div class="page-card-icon-wrapper">
                                    <svg class="page-card-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div class="page-card-content">
                                    <h4 class="page-card-title">Services</h4>
                                    <p class="page-card-desc">AI開発、データ分析、DX推進など、6つの主要サービスをご提供</p>
                                </div>
                            </a>
                            <a href="company.php" class="page-card">
                                <div class="page-card-icon-wrapper">
                                    <svg class="page-card-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <div class="page-card-content">
                                    <h4 class="page-card-title">Company</h4>
                                    <p class="page-card-desc">企業概要、沿革、組織体制などの基本情報を掲載しています</p>
                                </div>
                            </a>
                            <a href="careers.php" class="page-card">
                                <div class="page-card-icon-wrapper">
                                    <svg class="page-card-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <div class="page-card-content">
                                    <h4 class="page-card-title">Careers</h4>
                                    <p class="page-card-desc">募集要項、福利厚生、働く環境についての詳細をご確認ください</p>
                                </div>
                            </a>
                            <a href="contact.php" class="page-card">
                                <div class="page-card-icon-wrapper">
                                    <svg class="page-card-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div class="page-card-content">
                                    <h4 class="page-card-title">Contact</h4>
                                    <p class="page-card-desc">お問い合わせフォーム。サービスに関するご相談はこちらから</p>
                                </div>
                            </a>
                            <a href="privacy.php" class="page-card">
                                <div class="page-card-icon-wrapper">
                                    <svg class="page-card-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                                <div class="page-card-content">
                                    <h4 class="page-card-title">Privacy Policy</h4>
                                    <p class="page-card-desc">個人情報保護方針とデータの取り扱いについてご説明します</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- お知らせパネル - 中サイズ -->
                    <div class="bento-tile tile-medium news-panel internal-news">
                        <div class="tile-header">
                            <svg class="tile-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <h3>お知らせ</h3>
                        </div>
                        <div class="news-items" id="internalNewsItems">
                            <!-- JavaScriptで動的に生成 -->
                        </div>
                    </div>

                    <!-- 最新ニュース - 中サイズ -->
                    <div class="bento-tile tile-medium news-panel external-news">
                        <div class="tile-header">
                            <svg class="tile-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            <h3>最新ニュース</h3>
                            <span class="tile-header-badge">Today</span>
                        </div>
                        <div class="news-items" id="externalNewsItems">
                            <!-- JavaScriptで動的に生成 -->
                        </div>
                    </div>

                    <!-- 注目記事 - 小サイズ -->
                    <div class="bento-tile tile-small featured-item">
                        <div class="tile-badge">Featured</div>
                        <h4 id="featuredTitle">読み込み中...</h4>
                        <p id="featuredSummary"></p>
                    </div>

                </div>
            </div>
        </section>
    </div>

<!-- JavaScriptにデータを渡す -->
<script>
// PHPから受け取ったJSONをJavaScript変数に格納
const tickerData = <?php echo $ticker_json; ?>;
const internalNews = <?php echo $announcements_json; ?>;
const externalNews = <?php echo $tech_news_json; ?>;
const featuredItem = <?php echo $featured_json; ?>;

console.log('Data loaded from JSON files');
console.log('Ticker items:', tickerData);
console.log('Internal News (Announcements):', internalNews);
console.log('External News (Latest):', externalNews);
console.log('Featured Item:', featuredItem);
</script>

<?php include '../includes/footer.php'; ?>
