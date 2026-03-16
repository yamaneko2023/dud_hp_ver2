<main>

    <!-- ページヘッダー -->
    <section class="page-header">
        <video class="page-header-video" autoplay muted playsinline>
            <source src="/video/header_announcements.mp4" type="video/mp4">
        </video>
        <div class="container">
            <h1 class="page-title">Announcements</h1>
            <p class="page-subtitle">お知らせ</p>
        </div>
    </section>

    <?php if ($pinned_announcement): ?>
    <!-- ピン留めセクション -->
    <section class="ann-featured-section">
        <div class="ann-featured-decoration"></div>
        <div class="container">
            <div class="ann-featured-card">
                <div class="ann-featured-image">
                    <img src="<?= htmlspecialchars($pinned_announcement['image'] ?? '') ?>"
                         alt="<?= htmlspecialchars($pinned_announcement['title'] ?? '') ?>"
                         loading="lazy">
                </div>
                <div class="ann-featured-body">
                    <div class="ann-featured-meta">
                        <span class="ann-featured-date"><?= htmlspecialchars($pinned_announcement['date'] ?? '') ?></span>
                        <span class="ann-featured-category"><?= htmlspecialchars($pinned_announcement['category'] ?? '') ?></span>
                    </div>
                    <h2 class="ann-featured-title"><?= htmlspecialchars($pinned_announcement['title'] ?? '') ?></h2>
                    <?php if (!empty($pinned_announcement['body'])): ?>
                    <div class="ann-featured-content">
                        <?php foreach ($pinned_announcement['body'] as $block): ?>
                            <?php if ($block['type'] === 'heading'): ?>
                                <h3><?= htmlspecialchars($block['content']) ?></h3>
                            <?php elseif ($block['type'] === 'paragraph'): ?>
                                <p><?= htmlspecialchars($block['content']) ?></p>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                    <?php if (!empty($pinned_announcement['link'])): ?>
                    <a href="<?= htmlspecialchars($pinned_announcement['link']) ?>"
                       target="_blank" rel="noopener noreferrer"
                       class="award-link">
                        詳しく見る <span class="award-link-arrow">→</span>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- 過去のお知らせ一覧 -->
    <section class="ann-list-section">
        <div class="container" id="announcementsListContainer">
            <!-- JavaScriptで年ごとにグループ化して表示 -->
        </div>
    </section>

    <!-- フッターCTA -->
    <section class="footer-cta-section">
        <div class="footer-cta-cityscape"></div>
        <div class="container">
            <div class="footer-cta-content">
                <h2 class="footer-cta-title">CONTACT US</h2>
                <p class="footer-cta-subtitle">お気軽にお問い合わせください</p>
                <a href="/contact" class="btn-primary-large">お問い合わせフォーム</a>
            </div>
        </div>
    </section>

    <script type="application/json" id="announcements-list-data"><?= json_encode($announcements_list ?? []) ?></script>
    <script src="/js/announcements.js"></script>

</main>
