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
                    DIG-UP DATAは、テクノロジーで未来を創る仲間を募集しています。<br>
                    私たちは、多様な働き方を尊重し、一人ひとりの可能性を最大限に引き出せる環境を目指しています。<br><br>

                    <strong>柔軟な働き方を実現</strong><br>
                    正社員、契約社員、個人事業主など、あなたのライフスタイルに合わせた雇用形態を選択できます。
                    テレワーク中心、週1-2日出社、プロジェクトベースなど、働き方は自由にカスタマイズ可能。
                    子育て中の方、副業で始めたい方、フリーランスとして関わりたい方も大歓迎です。<br><br>

                    <strong>学び続けられる環境</strong><br>
                    最新のAI技術（ChatGPT、Claude等）を業務で積極的に活用し、スキルアップを支援します。
                    未経験からのキャリアチェンジも応援。実務を通じて、データ分析、AI開発、システム構築のスキルを習得できます。
                    生成AI利用制度により、学習でも業務でも最先端のツールを自由に使えます。<br><br>

                    <strong>小規模で温かいチーム</strong><br>
                    少数精鋭のチームだからこそ、一人ひとりの意見が尊重され、裁量を持って働けます。
                    大企業のような堅苦しさはなく、フラットなコミュニケーションで協力し合いながら成長できる環境です。<br><br>

                    <strong>お客様との共創を通じた成長</strong><br>
                    個人や小規模事業者のお客様に寄り添うビジネススタイルなので、
                    一つひとつの案件に深く関わり、お客様の課題解決に貢献できるやりがいがあります。
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

            <div class="careers-cta">
                <h2 class="cta-title">まずはお気軽にご相談ください</h2>
                <p class="cta-text">
                    ご質問や応募に関するご相談など、お問い合わせフォームからご連絡ください。<br>
                    カジュアル面談も歓迎です。
                </p>
                <div class="cta-buttons">
                    <a href="contact.php" class="btn-primary-large">お問い合わせ</a>
                    <a href="company.php" class="btn-primary-large">会社概要を見る</a>
                    <a href="vision.php" class="btn-primary-large">ビジョンを見る</a>
                </div>
            </div>
        </div>
    </section>

</main>
<!-- /メインコンテンツ -->

<?php include '../includes/footer.php'; ?>
