# ホームページリニューアルコード

このファイルには、home.phpに統合するための新しいコードが含まれています。

---

## 1. home.php - 新しいHTML構造

既存の`home.php`のヒーローセクション以降を以下のコードに置き換えてください：

```php
<?php $page_title = '株式会社DIG-UP DATA - 未来を創造する企業'; ?>
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
        </section>

        <!-- Bento Grid セクション -->
        <section class="bento-section">
            <div class="container">
                <div class="bento-grid">

                    <!-- Quick Links - 大きめのタイル -->
                    <div class="bento-tile tile-large quick-links">
                        <div class="tile-header">
                            <svg class="tile-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                            </svg>
                            <h3>Quick Links</h3>
                        </div>
                        <div class="quick-links-grid">
                            <a href="#" class="quick-link-btn">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span>社内ポータル</span>
                            </a>
                            <a href="#" class="quick-link-btn">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>勤怠管理</span>
                            </a>
                            <a href="#" class="quick-link-btn">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>会議室予約</span>
                            </a>
                            <a href="#" class="quick-link-btn">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <span>経費精算</span>
                            </a>
                            <a href="#" class="quick-link-btn">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span>組織図</span>
                            </a>
                            <a href="#" class="quick-link-btn">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                                <span>社内Wiki</span>
                            </a>
                        </div>
                    </div>

                    <!-- 社内ニュースパネル - 中サイズ -->
                    <div class="bento-tile tile-medium news-panel internal-news">
                        <div class="tile-header">
                            <svg class="tile-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                            </svg>
                            <h3>社内ニュース</h3>
                        </div>
                        <div class="news-items" id="internalNewsItems">
                            <!-- JavaScriptで動的に生成 -->
                        </div>
                    </div>

                    <!-- 外部テックニュースパネル - 中サイズ -->
                    <div class="bento-tile tile-medium news-panel external-news">
                        <div class="tile-header">
                            <svg class="tile-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3>テックニュース</h3>
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
                        <a href="#" id="featuredLink" class="tile-link">詳しく見る →</a>
                    </div>

                    <!-- 統計情報 - 小サイズ -->
                    <div class="bento-tile tile-small stats-item">
                        <div class="stat">
                            <div class="stat-number">1,234</div>
                            <div class="stat-label">プロジェクト数</div>
                        </div>
                        <div class="stat">
                            <div class="stat-number">98%</div>
                            <div class="stat-label">顧客満足度</div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

<?php include '../includes/footer.php'; ?>
```

---

## 2. CSS - style.cssに追加

以下のCSSを `style.css` の最後に追加してください：

```css
/* ========================================
   News Ticker（ティッカー）
   ======================================== */

.news-ticker-section {
    position: relative;
    z-index: 3;
    padding: 0;
    margin: 0 0 40px 0;
    overflow: hidden;
}

.ticker-wrapper {
    display: flex;
    align-items: center;
    background: rgba(0, 0, 0, 0.6);
    backdrop-filter: blur(10px);
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    padding: 12px 0;
    position: relative;
}

.ticker-label {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 0 24px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    font-weight: 700;
    font-size: 0.875rem;
    letter-spacing: 0.05em;
    white-space: nowrap;
    z-index: 2;
    border-right: 2px solid rgba(255, 255, 255, 0.2);
}

.ticker-icon {
    width: 20px;
    height: 20px;
    animation: pulse 2s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

.ticker-track {
    display: flex;
    align-items: center;
    white-space: nowrap;
    animation: tickerScroll 60s linear infinite;
    padding-left: 100%;
}

@keyframes tickerScroll {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-50%);
    }
}

.ticker-item {
    display: inline-flex;
    align-items: center;
    padding: 0 40px;
    color: rgba(255, 255, 255, 0.95);
    font-size: 0.9rem;
    position: relative;
}

.ticker-item::before {
    content: '●';
    color: #ec4899;
    margin-right: 12px;
    font-size: 0.6rem;
}

.ticker-date {
    color: rgba(255, 255, 255, 0.6);
    margin-right: 12px;
    font-size: 0.85rem;
}

.ticker-category {
    background: rgba(99, 102, 241, 0.3);
    padding: 2px 8px;
    border-radius: 4px;
    font-size: 0.75rem;
    margin-right: 12px;
    border: 1px solid rgba(99, 102, 241, 0.5);
}

/* ========================================
   Bento Grid セクション
   ======================================== */

.bento-section {
    position: relative;
    z-index: 3;
    padding: 0 0 60px 0;
}

.bento-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    max-width: 1280px;
    margin: 0 auto;
}

/* ========================================
   Bento Tile 基本スタイル（Glassmorphism）
   ======================================== */

.bento-tile {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    padding: 24px;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}

.bento-tile::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg,
        rgba(99, 102, 241, 0.1) 0%,
        rgba(139, 92, 246, 0.1) 50%,
        rgba(236, 72, 153, 0.1) 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
    pointer-events: none;
}

.bento-tile:hover {
    transform: translateY(-4px);
    border-color: rgba(255, 255, 255, 0.4);
    box-shadow:
        0 12px 40px rgba(0, 0, 0, 0.2),
        0 0 30px rgba(99, 102, 241, 0.4),
        inset 0 0 60px rgba(99, 102, 241, 0.1);
}

.bento-tile:hover::before {
    opacity: 1;
}

/* タイルサイズバリエーション */
.tile-large {
    grid-column: span 2;
    grid-row: span 2;
}

.tile-medium {
    grid-column: span 2;
    grid-row: span 1;
}

.tile-small {
    grid-column: span 1;
    grid-row: span 1;
}

/* ========================================
   Tile Header（共通）
   ======================================== */

.tile-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 20px;
}

.tile-header h3 {
    font-size: 1.25rem;
    font-weight: 700;
    color: white;
    margin: 0;
}

.tile-icon {
    width: 28px;
    height: 28px;
    color: #ec4899;
    stroke-width: 2;
    filter: drop-shadow(0 0 8px rgba(236, 72, 153, 0.6));
}

.tile-badge {
    position: absolute;
    top: 16px;
    right: 16px;
    background: linear-gradient(135deg, #ec4899, #f093fb);
    color: white;
    padding: 4px 12px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
    letter-spacing: 0.05em;
    box-shadow: 0 4px 12px rgba(236, 72, 153, 0.4);
}

/* ========================================
   Quick Links
   ======================================== */

.quick-links-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 12px;
}

.quick-link-btn {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 20px 12px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 12px;
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 0.875rem;
    font-weight: 500;
    text-align: center;
}

.quick-link-btn svg {
    width: 32px;
    height: 32px;
    stroke-width: 2;
    color: #6366f1;
    transition: all 0.3s ease;
}

.quick-link-btn:hover {
    background: rgba(255, 255, 255, 0.2);
    border-color: rgba(99, 102, 241, 0.6);
    transform: scale(1.05);
    box-shadow:
        0 8px 20px rgba(0, 0, 0, 0.2),
        0 0 20px rgba(99, 102, 241, 0.5);
}

.quick-link-btn:hover svg {
    color: #ec4899;
    filter: drop-shadow(0 0 8px rgba(236, 72, 153, 0.8));
}

/* ========================================
   News Panel
   ======================================== */

.news-panel {
    max-height: 350px;
}

.news-items {
    display: flex;
    flex-direction: column;
    gap: 12px;
    max-height: 280px;
    overflow-y: auto;
    padding-right: 8px;
}

/* カスタムスクロールバー */
.news-items::-webkit-scrollbar {
    width: 6px;
}

.news-items::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 3px;
}

.news-items::-webkit-scrollbar-thumb {
    background: rgba(99, 102, 241, 0.5);
    border-radius: 3px;
}

.news-items::-webkit-scrollbar-thumb:hover {
    background: rgba(99, 102, 241, 0.7);
}

.news-item {
    padding: 12px;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 8px;
    transition: all 0.2s ease;
    cursor: pointer;
}

.news-item:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(99, 102, 241, 0.5);
    transform: translateX(4px);
}

.news-item-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 6px;
}

.news-item-date {
    font-size: 0.75rem;
    color: rgba(255, 255, 255, 0.6);
}

.news-item-category {
    font-size: 0.7rem;
    padding: 2px 8px;
    background: rgba(99, 102, 241, 0.3);
    border-radius: 4px;
    color: rgba(255, 255, 255, 0.9);
    border: 1px solid rgba(99, 102, 241, 0.5);
}

.news-item-title {
    font-size: 0.9rem;
    font-weight: 600;
    color: white;
    margin: 0;
    line-height: 1.4;
}

/* ========================================
   Featured Item
   ======================================== */

.featured-item h4 {
    font-size: 1rem;
    font-weight: 700;
    color: white;
    margin: 0 0 12px 0;
    line-height: 1.4;
}

.featured-item p {
    font-size: 0.85rem;
    color: rgba(255, 255, 255, 0.7);
    line-height: 1.5;
    margin: 0 0 16px 0;
}

.tile-link {
    display: inline-flex;
    align-items: center;
    color: #ec4899;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.3s ease;
}

.tile-link:hover {
    color: #f093fb;
    transform: translateX(4px);
}

/* ========================================
   Stats Item
   ======================================== */

.stats-item {
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 20px;
}

.stat {
    text-align: center;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 700;
    background: linear-gradient(135deg, #6366f1, #ec4899);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    line-height: 1;
    margin-bottom: 8px;
    text-shadow: 0 0 30px rgba(99, 102, 241, 0.5);
}

.stat-label {
    font-size: 0.875rem;
    color: rgba(255, 255, 255, 0.8);
    font-weight: 500;
}

/* ========================================
   レスポンシブ対応
   ======================================== */

@media (max-width: 1024px) {
    .bento-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .tile-large,
    .tile-medium {
        grid-column: span 2;
    }

    .tile-small {
        grid-column: span 1;
    }

    .quick-links-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 768px) {
    .ticker-label {
        font-size: 0.75rem;
        padding: 0 16px;
    }

    .ticker-item {
        font-size: 0.8rem;
        padding: 0 24px;
    }

    .bento-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }

    .tile-large,
    .tile-medium,
    .tile-small {
        grid-column: span 1;
    }

    .quick-links-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .quick-link-btn {
        padding: 16px 8px;
        font-size: 0.8rem;
    }

    .quick-link-btn svg {
        width: 28px;
        height: 28px;
    }
}

@media (max-width: 480px) {
    .ticker-label span {
        display: none;
    }

    .ticker-label {
        padding: 0 12px;
    }

    .quick-links-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 8px;
    }

    .stat-number {
        font-size: 2rem;
    }
}
```

---

## 3. JavaScript - home.js（新規作成）

`js/home.js` として新規作成し、`header.php` で読み込んでください：

```javascript
// ========================================
// データ設定
// ========================================

// PHPからデータを受け取る場合はこの変数を使用
// 例: const tickerData = <?php echo json_encode($ticker_news); ?>;
// 例: const internalNews = <?php echo json_encode($internal_news); ?>;
// 例: const externalNews = <?php echo json_encode($external_news); ?>;

// 以下はサンプルデータ（実際にはPHPから受け取る）
const tickerData = [
    {
        date: '2025-02-02',
        category: 'お知らせ',
        title: '新サービス「AIデータ分析プラットフォーム」をリリースしました'
    },
    {
        date: '2025-02-01',
        category: 'イベント',
        title: '2月15日開催：生成AI活用セミナーの参加受付を開始'
    },
    {
        date: '2025-01-30',
        category: 'ニュース',
        title: '横浜本社オフィスを拡張移転いたしました'
    },
    {
        date: '2025-01-28',
        category: 'プレスリリース',
        title: 'DX推進支援サービスの導入企業が100社を突破'
    },
    {
        date: '2025-01-25',
        category: '採用',
        title: 'AIエンジニア・データサイエンティストを積極採用中'
    }
];

const internalNews = [
    {
        date: '2025-02-02',
        category: '全社',
        title: '2月度全社会議のお知らせ - 2/10（金）14:00〜'
    },
    {
        date: '2025-02-01',
        category: '人事',
        title: '2025年度上期評価面談スケジュールについて'
    },
    {
        date: '2025-01-30',
        category: '総務',
        title: '新オフィスの会議室予約システム導入について'
    },
    {
        date: '2025-01-28',
        category: 'IT',
        title: 'セキュリティアップデート実施のお知らせ'
    },
    {
        date: '2025-01-25',
        category: '福利厚生',
        title: '健康診断の予約受付を開始しました'
    }
];

const externalNews = [
    {
        date: '2025-02-02',
        category: 'AI',
        title: 'OpenAI、GPT-5の開発を正式発表',
        link: 'https://example.com'
    },
    {
        date: '2025-02-01',
        category: 'DX',
        title: '日本のDX市場、2025年は前年比20%成長の見込み',
        link: 'https://example.com'
    },
    {
        date: '2025-01-30',
        category: 'データ',
        title: 'ビッグデータ分析の最新トレンド：リアルタイム処理が主流に',
        link: 'https://example.com'
    },
    {
        date: '2025-01-28',
        category: 'テクノロジー',
        title: 'Googleが新しいAIチップ「TPU v6」を発表',
        link: 'https://example.com'
    }
];

const featuredItem = {
    title: '新サービス「AIデータ分析プラットフォーム」をリリース',
    summary: '企業のデータ活用を加速する統合プラットフォームを提供開始。誰でも簡単にAI分析が可能に。',
    link: '#'
};

// ========================================
// News Ticker の初期化
// ========================================

function initTicker() {
    const tickerTrack = document.getElementById('tickerTrack');
    if (!tickerTrack) return;

    // ティッカーアイテムを2回繰り返して無限ループを実現
    const tickerHTML = tickerData.map(item => `
        <div class="ticker-item">
            <span class="ticker-date">${formatDate(item.date)}</span>
            <span class="ticker-category">${item.category}</span>
            <span class="ticker-title">${item.title}</span>
        </div>
    `).join('');

    // 2回繰り返してシームレスなループを作成
    tickerTrack.innerHTML = tickerHTML + tickerHTML;
}

// ========================================
// News Panel の初期化
// ========================================

function initNewsPanel(containerId, newsData) {
    const container = document.getElementById(containerId);
    if (!container) return;

    const newsHTML = newsData.slice(0, 5).map(item => `
        <div class="news-item" onclick="handleNewsClick('${item.link || '#'}')">
            <div class="news-item-header">
                <span class="news-item-date">${formatDate(item.date)}</span>
                <span class="news-item-category">${item.category}</span>
            </div>
            <h4 class="news-item-title">${item.title}</h4>
        </div>
    `).join('');

    container.innerHTML = newsHTML;
}

// ========================================
// Featured Item の初期化
// ========================================

function initFeaturedItem() {
    const titleEl = document.getElementById('featuredTitle');
    const summaryEl = document.getElementById('featuredSummary');
    const linkEl = document.getElementById('featuredLink');

    if (titleEl) titleEl.textContent = featuredItem.title;
    if (summaryEl) summaryEl.textContent = featuredItem.summary;
    if (linkEl) linkEl.href = featuredItem.link;
}

// ========================================
// ユーティリティ関数
// ========================================

function formatDate(dateString) {
    const date = new Date(dateString);
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const day = String(date.getDate()).padStart(2, '0');
    return `${year}.${month}.${day}`;
}

function handleNewsClick(url) {
    if (url && url !== '#') {
        window.open(url, '_blank', 'noopener,noreferrer');
    }
}

// ========================================
// 初期化実行
// ========================================

document.addEventListener('DOMContentLoaded', function() {
    initTicker();
    initNewsPanel('internalNewsItems', internalNews);
    initNewsPanel('externalNewsItems', externalNews);
    initFeaturedItem();
});
```

---

## 4. PHPデータ連携の例

`home.php` でPHPデータを読み込む場合の例：

```php
<?php
// JSONファイルからデータ読み込み
$ticker_json = file_get_contents('../../data/ticker_news.json');
$internal_json = file_get_contents('../../data/internal_news.json');
$external_json = file_get_contents('../../data/external_news.json');
?>

<!-- header.phpの後、home.jsの前にこのscriptタグを追加 -->
<script>
// PHPから受け取ったJSONをJavaScript変数に格納
const tickerData = <?php echo $ticker_json; ?>;
const internalNews = <?php echo $internal_json; ?>;
const externalNews = <?php echo $external_json; ?>;
</script>
<script src="../../js/home.js"></script>
```

---

## 5. JSONデータファイルの例

### `data/ticker_news.json`
```json
[
    {
        "date": "2025-02-02",
        "category": "お知らせ",
        "title": "新サービス「AIデータ分析プラットフォーム」をリリースしました"
    },
    {
        "date": "2025-02-01",
        "category": "イベント",
        "title": "2月15日開催：生成AI活用セミナーの参加受付を開始"
    }
]
```

### `data/internal_news.json`
```json
[
    {
        "date": "2025-02-02",
        "category": "全社",
        "title": "2月度全社会議のお知らせ - 2/10（金）14:00〜"
    }
]
```

### `data/external_news.json`
```json
[
    {
        "date": "2025-02-02",
        "category": "AI",
        "title": "OpenAI、GPT-5の開発を正式発表",
        "link": "https://example.com"
    }
]
```

---

## 6. header.phpへのJavaScript追加

`app_hp/includes/header.php` の `</head>` の直前に追加：

```html
    <!-- Home Page Script（home.phpでのみ読み込む場合） -->
    <?php if (basename($_SERVER['PHP_SELF']) == 'home.php'): ?>
    <script src="../../js/home.js" defer></script>
    <?php endif; ?>
</head>
```

---

## 実装手順

1. **CSS追加**: `css/style.css` の最後に「2. CSS」のコードを追加
2. **JavaScript作成**: `js/home.js` を新規作成し、「3. JavaScript」のコードを保存
3. **HTML置き換え**: `app_hp/public/home.php` を「1. HTML」のコードに置き換え
4. **header.php修正**: 「6. header.phpへのJavaScript追加」を実装
5. **JSONファイル作成**（オプション）: データを外部管理する場合は「5. JSONデータファイル」を参考に作成

---

## カスタマイズポイント

### Quick Linksのリンク先変更
`home.php` の各 `<a href="#">` を実際のリンク先に変更してください。

### 統計情報の変更
`.stats-item` 内の数値やラベルを実際のデータに変更してください。

### 色のカスタマイズ
CSSの以下の部分で色を調整できます：
- `rgba(99, 102, 241, ...)` - プライマリカラー（インディゴ）
- `rgba(236, 72, 153, ...)` - アクセントカラー（ピンク）
- `rgba(139, 92, 246, ...)` - セカンダリカラー（紫）

### アニメーション速度の調整
```css
animation: tickerScroll 60s linear infinite;
```
`60s` を変更してティッカーの速度を調整できます（数値を小さくすると速くなります）。

---

## 注意事項

- 既存の `hero-news-container` クラスのスタイルを維持しているため、背景グラデーションと動画は完全に保持されます
- Glassmorphism効果を実現するため、`backdrop-filter` を使用していますが、古いブラウザでは表示が異なる場合があります
- ティッカーのアニメーションは `transform: translateX` を使用しているため、パフォーマンスが最適化されています
