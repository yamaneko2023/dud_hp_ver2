<?php
$page_title = '株式会社DIG-UP DATA - 未来を創造する企業';

// JSONデータを読み込み（メンテナンス中のためコメントアウト）
// $announcements_json = file_get_contents('../../data/announcements.json');
// $tech_news_json = file_get_contents('../../data/tech_news.json');
?>
<?php include '../includes/header.php'; ?>

<!-- 1. ヒーローセクション（フルスクリーン） -->
<section id="home" class="hero-fullscreen">
    <video class="hero-video-bg" autoplay muted loop playsinline>
        <source src="../../video/home_bkground.mp4" type="video/mp4">
    </video>

    <!-- 装飾用の円形グラフィック -->
    <div class="hero-circle hero-circle-1"></div>
    <div class="hero-circle hero-circle-2"></div>

    <div class="hero-content-wrapper">
        <div class="container">
            <div class="hero-content-fullscreen">
                <h1 class="hero-title-large">
                    Dig Up the Valuable Data
                    <span class="hero-title-accent">Advance Your Business with AI</span>
                </h1>
                <p class="hero-subtitle-large">データの力を引き出し、AIでビジネス変革に加速を</p>
            </div>
        </div>
    </div>

    <div class="scroll-indicator">
        <span>SCROLL</span>
        <div class="scroll-arrow"></div>
    </div>
</section>

<!-- 2. ビジョンセクション（濃い紫背景） -->
<section class="vision-section">
    <div class="container">
        <div class="section-header-center">
            <h2 class="section-title-large">OUR VISION</h2>
            <p class="section-subtitle">DIG-UP DATAが目指す未来</p>
        </div>

        <div class="vision-cards">
            <div class="vision-card" data-aos="fade-up" data-aos-delay="0">
                <div class="vision-card-icon">
                    <span class="vision-label">Mission</span>
                </div>
                <h3 class="vision-card-title">テクノロジーで<br>社会をつなぐ</h3>
                <p class="vision-card-desc">データとAIの力で、社会課題の解決に貢献し、より良い未来を創造します</p>
            </div>

            <div class="vision-card" data-aos="fade-up" data-aos-delay="100">
                <div class="vision-card-icon">
                    <span class="vision-label">Vision</span>
                </div>
                <h3 class="vision-card-title">成長の<br>パートナーとして</h3>
                <p class="vision-card-desc">顧客企業の成長を共に実現し、持続可能なビジネスを支援します</p>
            </div>

            <div class="vision-card" data-aos="fade-up" data-aos-delay="200">
                <div class="vision-card-icon">
                    <span class="vision-label">Value</span>
                </div>
                <h3 class="vision-card-title">働く環境に<br>こだわる</h3>
                <p class="vision-card-desc">社員一人ひとりが成長し、挑戦できる環境を提供し続けます</p>
            </div>
        </div>

        <div class="section-cta">
            <a href="vision.php" class="btn-primary-large">ビジョン詳細を見る</a>
        </div>
    </div>
</section>

<!-- 3. サービスセクション（白背景） -->
<section class="services-section">
    <!-- 装飾用の円形グラフィック -->
    <div class="section-circle section-circle-left"></div>

    <div class="container">
        <div class="section-header">
            <span class="section-label">SERVICES</span>
            <h2 class="section-title-large">6つのコアサービスで<br>ビジネスを加速</h2>
        </div>

        <div class="services-grid">
            <div class="service-card" data-aos="fade-up" data-aos-delay="0">
                <div class="service-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                </div>
                <h3 class="service-title">AIアプリ開発</h3>
                <p class="service-desc">チャットボット、AIエージェント、ワークフロー自動化</p>
            </div>

            <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                <div class="service-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                <h3 class="service-title">データ分析</h3>
                <p class="service-desc">ビッグデータ分析、データ基盤構築</p>
            </div>

            <div class="service-card" data-aos="fade-up" data-aos-delay="200">
                <div class="service-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="service-title">DX / AX推進支援</h3>
                <p class="service-desc">DXという土台の上に、AXを。データ基盤構築から、AI活用まで</p>
            </div>

            <div class="service-card" data-aos="fade-up" data-aos-delay="0">
                <div class="service-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                    </svg>
                </div>
                <h3 class="service-title">Webシステム構築</h3>
                <p class="service-desc">コーポレートサイト、業務Webシステム</p>
            </div>

            <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                <div class="service-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h3 class="service-title">生成AI教育・学習支援</h3>
                <p class="service-desc">企業研修、プロンプトエンジニアリング</p>
            </div>

            <div class="service-card" data-aos="fade-up" data-aos-delay="200">
                <div class="service-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                </div>
                <h3 class="service-title">その他サービス</h3>
                <p class="service-desc">ECサイト開発、コンサルティング</p>
            </div>
        </div>

        <div class="section-cta">
            <a href="services.php" class="btn-primary-large">サービス詳細を見る</a>
        </div>
    </div>
</section>

<!-- 4. ニュースセクション（白背景） - メンテナンス中 -->
<section class="news-section">
    <!-- 装飾用の円形グラフィック -->
    <div class="section-circle section-circle-right"></div>

    <div class="container">
        <div class="section-header">
            <span class="section-label">NEWS & ANNOUNCEMENTS</span>
            <h2 class="section-title-large">最新情報</h2>
        </div>

        <!-- メンテナンス中の表示 -->
        <div style="text-align: center; padding: 60px 20px; background: linear-gradient(135deg, rgba(99, 102, 241, 0.05) 0%, rgba(139, 92, 246, 0.05) 100%); border-radius: 20px; margin: 40px 0;">
            <div style="display: inline-block; width: 80px; height: 80px; border-radius: 50%; background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%); display: flex; align-items: center; justify-content: center; margin-bottom: 30px;">
                <svg style="width: 40px; height: 40px; color: white;" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <h3 style="font-size: 1.75rem; font-weight: 700; color: #1f2937; margin-bottom: 15px;">メンテナンス中</h3>
            <p style="font-size: 1.1rem; color: #6b7280; line-height: 1.8; max-width: 600px; margin: 0 auto;">
                現在、ニュース・お知らせセクションはメンテナンス中です。<br>
                より良いコンテンツをお届けするため、準備を進めております。<br>
                しばらくお待ちください。
            </p>
        </div>
    </div>
</section>

<!-- 6. 会社情報セクション（白背景） -->
<section class="company-section">
    <div class="container">
        <div class="company-content">
            <div class="company-text">
                <span class="section-label">COMPANY</span>
                <h2 class="section-title-large">テクノロジーの力で、<br>夢を叶えることを実現に</h2>
                <p class="company-desc">
                    株式会社DIG-UP DATAは、データとAIの力でビジネスを変革する企業です。<br><br>
                    私たちは「データの価値を引き出す」をミッションに、企業のDX / AX推進、AI開発、データ分析など、幅広いサービスを提供しています。<br><br>
                    技術力と創造力で、お客様のビジネス成長をサポートし、共に未来を創造します。
                </p>
                <a href="company.php" class="btn-primary-large">会社情報を見る</a>
            </div>
            <div class="company-image">
                <img src="../../img/home_company.png" alt="横浜みなとみらい - DIG-UP DATAオフィスエリア" class="company-photo">
            </div>
        </div>
    </div>
</section>

<!-- 7. 採用情報セクション（グラデーション背景） -->
<section class="recruit-section">
    <!-- 装飾用の円形グラフィック -->
    <div class="recruit-circle recruit-circle-1"></div>
    <div class="recruit-circle recruit-circle-2"></div>
    <div class="recruit-circle recruit-circle-3"></div>

    <div class="container">
        <div class="section-header-center">
            <h2 class="section-title-large white">JOIN OUR TEAM</h2>
            <p class="section-subtitle white">一緒に未来を創りませんか？</p>
        </div>

        <div class="recruit-image">
            <img src="../../img/home_team.png" alt="DIG-UP DATAのチーム" class="team-photo">
        </div>

        <div class="section-cta">
            <a href="careers.php" class="btn-white-large">採用情報を見る</a>
        </div>
    </div>
</section>

<!-- 8. フッターCTA（濃い背景） -->
<section class="footer-cta-section">
    <div class="footer-cta-cityscape"></div>

    <div class="container">
        <div class="footer-cta-content">
            <h2 class="footer-cta-title">CONTACT US</h2>
            <p class="footer-cta-subtitle">お気軽にお問い合わせください</p>
            <a href="contact.php" class="btn-primary-large">お問い合わせフォーム</a>
        </div>
    </div>
</section>

<!-- JavaScriptにデータを渡す（メンテナンス中のためコメントアウト） -->
<!--
<script>
const announcements = <?php echo $announcements_json; ?>;
const latestNews = <?php echo $tech_news_json; ?>;
</script>
-->

<?php include '../includes/footer.php'; ?>
