<?php
$page_key = 'services'; // SEO用ページキー
$page_title = 'サービス - 株式会社DIG-UP DATA';
?>
<?php include '../includes/header.php'; ?>

<!-- メインコンテンツ -->
<main>

    <!-- ページヘッダー -->
    <section class="page-header">
        <video class="page-header-video" autoplay muted playsinline>
            <source src="../../video/header_service.mp4" type="video/mp4">
        </video>
        <div class="container">
            <h1 class="page-title">Services</h1>
            <p class="page-subtitle">お客様のニーズに合わせた最適なソリューションを提供します</p>
        </div>
    </section>

    <!-- サービス紹介 -->
    <section class="services-intro">
        <div class="container">
            <div class="intro-content">
                <p class="intro-text">
                    企業だけでなく個人のデジタル化も支援します<br>
                    最新のテクノロジーと豊富な経験を活かし、お客様のビジネスを成功へと導きます
                </p>
            </div>
        </div>
    </section>

    <!-- サービス一覧 -->
    <section class="services-list-section">
        <div class="container">
            <h2 class="section-title-center">5つのコアサービス</h2>

            <div class="service-item">
                <div class="service-number">01</div>
                <div class="service-text">
                    <h3>Webシステム／サイト構築</h3>
                    <p>
                        コーポレートサイト、サービスサイト、業務Webシステムなど、企業のデジタル基盤となるWeb環境を構築します。<br><br>
                        単なる見た目の美しさだけでなく、SEO対策、ユーザビリティ、保守性、拡張性を重視した設計を行います。
                        AI機能の組み込みや、将来的なシステム連携も見据えた柔軟なアーキテクチャで、長期的に運用し続けられるWeb環境を提供します。<br><br>
                        バックエンド、フロントエンド、データベース設計から、様々な開発をフルスタックで対応可能です。
                    </p>
                </div>
            </div>

            <div class="service-item">
                <div class="service-number">02</div>
                <div class="service-text">
                    <h3>LLMアプリケーション開発</h3>
                    <p>
                    チャットボットやAIエージェント、業務ワークフローなどのAIアプリケーションを開発します。<br>
                    LLMの導入支援から、業務効率化ツール、カスタムAIソリューションまで、
                    お客様の課題や目的に合わせた最適なAI活用をサポートします。
                    </p>
                </div>
            </div>

            <div class="service-item">
                <div class="service-number">03</div>
                <div class="service-text">
                    <h3>LLM活用指南</h3>
                    <p>LLMアプリケーション開発、画像生成AI、プロンプトエンジニアリング講座などの生成AIツールの効果的な活用方法をレクチャーします。実務に活かせるAIリテラシーの向上もサポートします</p>
                </div>
            </div>

            <div class="service-item">
                <div class="service-number">04</div>
                <div class="service-text">
                    <h3>データ分析</h3>
                    <p>
                        膨大なデータから価値ある洞察を引き出し、ビジネスの意思決定を支援します。<br><br>
                        データの収集・整理・クレンジングから、統計分析、可視化まで、
                        一貫したデータ分析プロセスを提供し、データドリブンな経営を実現します。<br><br>
                        売上予測、顧客分析、マーケティング効果測定、在庫最適化など、業種・業務に応じた分析手法で、
                        お客様のビジネス課題を解決します。データ基盤の設計・構築から、継続的な分析運用まで、包括的にサポートします。
                    </p>
                </div>
            </div>

            <div class="service-item">
                <div class="service-number">05</div>
                <div class="service-text">
                    <h3>DX/AX推進支援</h3>
                    <p>データを集める「基盤」から、データで価値を生む「飛躍」へ。DXとAXは地続きの変革です。業務のデジタル化でデータ基盤を整え、その土台の上にAI活用という価値創造を積み上げます。業務プロセスの可視化から、データ基盤構築、AI導入、運用サポートまで、一貫してお客様のビジネス成長を加速させます。</p>
                </div>
            </div>

            <div class="services-cta">
                <h2 class="cta-title">お客様のビジネス課題を解決します</h2>
                <p class="cta-text">
                    LLMアプリケーション開発、データ分析、DX/AX推進支援に関するご相談はお気軽にお問い合わせください。<br>
                    最適なソリューションをご提案いたします。
                </p>
                <div class="cta-buttons">
                    <a href="contact.php" class="btn-primary-large">お問い合わせ</a>
                    <a href="company.php" class="btn-primary-large">会社概要を見る</a>
                    <a href="careers.php" class="btn-primary-large">採用情報を見る</a>
                </div>
            </div>
        </div>
    </section>

</main>
<!-- /メインコンテンツ -->

<?php include '../includes/footer.php'; ?>
