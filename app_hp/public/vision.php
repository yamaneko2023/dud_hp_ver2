<?php
$page_key = 'vision'; // SEO用ページキー
$page_title = '私たちのビジョン - 株式会社DIG-UP DATA';
?>
<?php include '../includes/header.php'; ?>

<!-- メインコンテンツ -->
<main>

    <!-- ビジョンヒーローセクション -->
    <section class="vision-hero">
        <video class="vision-hero-video" autoplay muted loop playsinline>
            <source src="../../video/1_vision_hero.mp4" type="video/mp4">
        </video>
        <div class="vision-hero-content">
            <h1 class="vision-hero-title">Our Vision</h1>
            <p class="vision-hero-subtitle">
                テクノロジーは、誰か一人のためのものではありません<br>
                社会が豊かになり、お客様のビジネスが成長し、私たち自身も進化し続ける<br><br>
                DIG-UP DATAは、AI とデータの力で、この3つの要素が互いに高め合う<br>
                持続可能な成長の循環を創り出します
            </p>
        </div>
    </section>

    <!-- 社会への貢献 -->
    <section class="vision-section vision-society">
        <div class="vision-image-container">
            <img src="../../img/2_vision_contribution_to_society.png" alt="社会への貢献" class="vision-image">
        </div>
        <div class="container">
            <div class="vision-content">
                <div class="vision-number">01</div>
                <h2 class="vision-title">社会への貢献</h2>
                <p class="vision-text">
                    AIとDXの力で、社会全体のデジタル化を推進します<br>
                    企業だけでなく個人も含め、誰もがテクノロジーの恩恵を受けられる社会を目指しています<br><br>
                    データの民主化を通じて、情報格差をなくし、すべての人が平等にチャンスを得られる未来を創造します
                </p>
            </div>
        </div>
    </section>

    <!-- お客様との共創 -->
    <section class="vision-section vision-customers">
        <div class="vision-image-container">
            <img src="../../img/3_vision_co-creation_with_our_customers,png.png" alt="お客様との共創" class="vision-image">
        </div>
        <div class="container">
            <div class="vision-content">
                <div class="vision-number">02</div>
                <h2 class="vision-title">お客様との共創</h2>
                <p class="vision-text">
                    お客様のビジネス成長こそが、私たちの喜びです<br>
                    単なるシステム提供者ではなく、真のパートナーとして、お客様の課題解決と成功に全力でコミットします<br><br>
                    お客様の成功事例が増えるほど、私たちの技術力も高まり、さらに多くの価値を提供できる<br>
                    この共創の循環が、私たちの成長の源泉です
                </p>
            </div>
        </div>
    </section>

    <!-- 私たちの成長 -->
    <section class="vision-section vision-growth">
        <div class="vision-image-container">
            <img src="../../img/4_vizion_our_growth.png.png" alt="私たちの成長" class="vision-image">
        </div>
        <div class="container">
            <div class="vision-content">
                <div class="vision-number">03</div>
                <h2 class="vision-title">私たちの成長</h2>
                <p class="vision-text">
                    変化の激しいテクノロジー業界で、学び続けることは使命です<BR>
                    最新のAI技術、データサイエンス、システム開発手法を常に追求し、お客様に最高のソリューションを提供できるよう進化し続けます<br><br>
                    挑戦を恐れず、失敗から学び、改善を繰り返すことで私たちの成長が、社会とお客様への貢献度を高めていきます
                </p>
            </div>
        </div>
    </section>

    <!-- トライアングル -->
    <section class="vision-triangle">
        <video class="vision-triangle-video" autoplay muted loop playsinline>
            <source src="../../video/5_vision_traiangle.mp4" type="video/mp4">
        </video>
        <div class="container">
            <div class="triangle-content">
                <div class="vision-number">04</div>
                <h2 class="triangle-title">共に高め合う関係</h2>
                <p class="triangle-text">
                    社会の発展、お客様の成功、私たちの成長　この3つの要素は、互いに繋がり、支え合い、高め合っています<br>
                    どれか一つだけが成長するのではなく、すべてが同時に前進する持続可能な関係<br><br>
                    それが、DIG-UP DATAが描く理想の未来です
                </p>
                <div class="triangle-diagram">
                    <div class="triangle-point">
                        <div class="triangle-label">社会</div>
                        <div class="triangle-description">デジタル化の推進</div>
                    </div>
                    <div class="triangle-point">
                        <div class="triangle-label">お客様</div>
                        <div class="triangle-description">ビジネスの成長</div>
                    </div>
                    <div class="triangle-point">
                        <div class="triangle-label">私たち</div>
                        <div class="triangle-description">技術力の向上</div>
                    </div>
                </div>
            </div>

            <div class="vision-cta">
                <p class="cta-text">このビジョンを実現するために、6つのコアサービスでお客様をサポートします</p>
                <a href="services.php" class="btn-primary-large">サービス詳細を見る</a>
            </div>
        </div>
    </section>

</main>
<!-- /メインコンテンツ -->

<?php include '../includes/footer.php'; ?>
