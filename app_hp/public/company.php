<?php
$page_key = 'company'; // SEO用ページキー
$page_title = '会社概要 - 株式会社DIG-UP DATA';
?>
<?php include '../includes/header.php'; ?>

<!-- メインコンテンツ -->
<main>

    <!-- ページヘッダー -->
    <section class="page-header">
        <video class="page-header-video" autoplay muted playsinline>
            <source src="../../video/header_company.mp4" type="video/mp4">
        </video>
        <div class="container">
            <h1 class="page-title">Company</h1>
            <p class="page-subtitle">会社概要</p>
        </div>
    </section>

    <!-- 会社概要セクション -->
    <section class="about">
        <div class="container">
            <div class="about-description">
                <h2>データの力で、未来を創る</h2>
                <p>
                    株式会社DIG-UP DATAは、2023年1月に横浜で設立されたテクノロジー企業です。
                    「Dig Up the Valuable Data（価値あるデータを掘り起こす）」を企業理念に、
                    AI開発、データ分析、DX/AX推進支援を通じて、企業のビジネス変革を支援しています。<br><br>

                    私たちは、単なる技術提供者ではありません。お客様のビジネスパートナーとして、
                    課題の本質を見極め、最適なソリューションを提案し、共に成長することを目指しています。
                    データとAIの力で、社会課題の解決に貢献し、より良い未来を創造します。<br><br>

                    <strong>私たちの強み：</strong><br>
                    ・最新のAI技術とデータサイエンスの専門知識<br>
                    ・フルスタックな開発能力（フロントエンド〜バックエンド〜インフラ）<br>
                    ・ビジネス視点に立った実践的なソリューション提案<br>
                    ・柔軟で迅速な対応力<br>
                    ・教育・学習支援による長期的なサポート
                </p>
            </div>

            <div class="about-content">
                <div class="about-info">
                    <div class="info-item">
                        <span class="info-label">会社名</span>
                        <span class="info-value">株式会社DIG-UP DATA</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">設立</span>
                        <span class="info-value">2023年1月4日</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">所在地</span>
                        <span class="info-value">〒220-0004 神奈川県横浜市西区北幸一丁目１１番１号水信ビル７階</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">事業内容</span>
                        <span class="info-value">
                            AIアプリ開発<BR>
                            DX / AX推進支援（企業・個人向け）<BR>
                            システム開発（Webシステム、アプリケーション、Webサイト）<BR>
                            データ分析<BR>
                            生成AI教育/学習関連<BR>
                            ECサイト、コンサルティング<BR>
                        </span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">代表取締役</span>
                        <span class="info-value">永富 修一</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 沿革セクション -->
    <section>
        <div class="container">
            <h2 class="section-title">沿革</h2>
            <div class="history-timeline">
                <div class="timeline-item">
                    <div class="timeline-year">2023年</div>
                    <div class="timeline-content">
                        <h3>会社設立</h3>
                        <p>東京都渋谷区に株式会社DIG-UP DATAを設立</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-year">2024年</div>
                    <div class="timeline-content">
                        <h3>本社移転</h3>
                        <p>神奈川県横浜市西区に本社移転</p>
                    </div>
                </div>
            </div>

            <div class="company-cta">
                <h2 class="cta-title">もっと詳しく知る</h2>
                <div class="cta-buttons">
                    <a href="vision.php" class="btn-primary-large">ビジョンを見る</a>
                    <a href="services.php" class="btn-primary-large">サービスを見る</a>
                    <a href="careers.php" class="btn-primary-large">採用情報を見る</a>
                </div>
            </div>
        </div>
    </section>

</main>
<!-- /メインコンテンツ -->

<?php include '../includes/footer.php'; ?>
