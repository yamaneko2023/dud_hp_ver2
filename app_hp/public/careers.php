<?php
$page_key = 'careers'; // SEO用ページキー
$page_title = '採用情報 - 株式会社DIG-UP DATA';
?>
<?php include '../includes/header.php'; ?>

<!-- メインコンテンツ -->
<main>

    <!-- ページヘッダー -->
    <section class="page-header">
        <video class="page-header-video" autoplay muted loop playsinline>
            <source src="../../video/header_recruit.mp4" type="video/mp4">
        </video>
        <div class="container">
            <h1 class="page-title">Careers</h1>
            <p class="page-subtitle">一緒に未来を創造しませんか</p>
        </div>
    </section>

    <!-- メッセージセクション -->
    <section class="mission-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">自由な働き方を実現</h2>
                <p class="section-subtitle">様々なご希望、ご相談ください。自由な働き方や考え方を取り入れていきます</p>
            </div>

            <div class="careers-message">
                <p>
                    DIG-UP DATAは、テクノロジーで未来を創る仲間を募集しています。<br><br>

                    <strong>私たちが大切にしていること：</strong><br><br>

                    <strong>挑戦を恐れない文化</strong><br>
                    失敗から学び、改善を繰り返すことで成長します。新しい技術や手法に挑戦し、
                    常に進化し続けることを大切にしています。<br><br>

                    <strong>学び続ける環境</strong><br>
                    変化の激しいテクノロジー業界では、学び続けることが重要です。
                    最新のAI技術、データサイエンス、システム開発手法を学べる環境を提供します。
                    生成AI利用制度により、業務でも学習でも最先端のツールを活用できます。<br><br>

                    <strong>柔軟な働き方</strong><br>
                    正社員、契約社員、個人事業主など、様々な雇用形態に対応します。
                    テレワーク、フレックス制、週休二日制など、ライフスタイルに合わせた働き方が可能です。
                    横浜の本社、自宅、プロジェクト先など、働く場所も選べます。<br><br>

                    <strong>お客様との共創</strong><br>
                    単なる開発者ではなく、お客様のビジネスパートナーとして価値を提供します。
                    課題解決のプロセスを通じて、自身のスキルとビジネス理解を深めることができます。
                </p>
            </div>
        </div>
    </section>

    <!-- 募集要項セクション -->
    <section class="about" style="background: var(--bg-light);">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">募集要項</h2>
            </div>
            <div class="about-content">
                <div class="about-info">
                    <div class="info-item">
                        <span class="info-label">雇用形態</span>
                        <span class="info-value">正社員、契約社員、個人事業主登録</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">勤務地</span>
                        <span class="info-value">本社、テレワーク、プロジェクト先から選択可能<br><span data-company="address"></span></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">就業時間</span>
                        <span class="info-value">09:00～18:00（実働8時間、休憩1時間）<br>フレックス制も選択可能</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">給与</span>
                        <span class="info-value">月給23万円以上（上限なし、固定残業代含む）<br>※経験・スキルに応じて優遇</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">休日</span>
                        <span class="info-value">週休二日制<br>祝日<br>年末年始<br>夏季休暇<br>慶弔休暇<br>有給休暇<br>育児休暇</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">福利厚生</span>
                        <span class="info-value">社会保険完備<br>交通費支給（上限5万円）<br>時間外手当<br>出張手当<br>社員紹介制度<br>生成AI利用制度</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">求める人物像</span>
                        <span class="info-value">・新しい技術や分野に挑戦したい方<br>・チームで協力して仕事を進められる方<br>・自ら考え行動できる方<br>・キャリアチェンジを考えている方も歓迎</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">その他</span>
                        <span class="info-value">募集要項に記載されている内容は基本的なものであり、個別のご希望や状況に応じて柔軟に対応いたします<br>お気軽にご相談ください</span>
                    </div>
                </div>
            </div>

            <div class="careers-cta" style="text-align: center; margin-top: 60px; padding: 60px 20px; background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%); border-radius: 20px; color: white;">
                <h2 style="font-size: 2rem; margin-bottom: 20px;">まずはお気軽にご相談ください</h2>
                <p style="font-size: 1.1rem; margin-bottom: 30px; opacity: 0.9;">
                    ご質問や応募に関するご相談など、お問い合わせフォームからご連絡ください。<br>
                    カジュアル面談も歓迎です。
                </p>
                <a href="contact.php" class="btn-white-large" style="background: white; color: #6366f1;">お問い合わせ</a>
                <p style="margin-top: 30px; opacity: 0.8;">
                    <a href="company.php" style="color: white; text-decoration: underline;">会社概要を見る</a>　|
                    <a href="vision.php" style="color: white; text-decoration: underline;">ビジョンを見る</a>
                </p>
            </div>
        </div>
    </section>

</main>
<!-- /メインコンテンツ -->

<?php include '../includes/footer.php'; ?>
