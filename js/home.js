// ========================================
// データ設定
// ========================================

// データはPHPから渡されます（home.phpで定義）
// 以下の変数がグローバルスコープで利用可能:
// - tickerData: Tickerに表示するニュース（お知らせ + テックニュース）
// - internalNews: お知らせデータ
// - externalNews: テックニュースデータ
// - featuredItem: 注目記事データ

// ========================================
// News Ticker の初期化
// ========================================

function initTicker() {
    console.log('initTicker called');
    console.log('  - tickerData:', tickerData);
    console.log('  - tickerData length:', tickerData ? tickerData.length : 'undefined');

    const tickerTrack = document.getElementById('tickerTrack');

    if (!tickerTrack) {
        console.error('tickerTrack element not found');
        return;
    }

    console.log('  - tickerTrack found:', tickerTrack);

    if (!tickerData || !Array.isArray(tickerData)) {
        console.error('Invalid tickerData:', tickerData);
        return;
    }

    // ティッカーアイテムを2回繰り返して無限ループを実現
    const tickerHTML = tickerData.map((item, index) => {
        console.log(`  - Ticker item ${index}:`, item);
        return `
        <div class="ticker-item">
            <span class="ticker-date">${formatDate(item.date)}</span>
            <span class="ticker-category">${item.category}</span>
            <span class="ticker-title">${item.title}</span>
        </div>
    `;
    }).join('');

    console.log('  - Generated ticker HTML length:', tickerHTML.length);

    // 2回繰り返してシームレスなループを作成
    tickerTrack.innerHTML = tickerHTML + tickerHTML;
    console.log('  - Ticker initialized successfully');
}

// ========================================
// News Panel の初期化
// ========================================

function initNewsPanel(containerId, newsData) {
    console.log('initNewsPanel called for:', containerId);
    console.log('  - newsData type:', typeof newsData);
    console.log('  - newsData value:', newsData);
    console.log('  - newsData is array?', Array.isArray(newsData));

    const container = document.getElementById(containerId);

    if (!container) {
        console.error('Container not found:', containerId);
        return;
    }

    console.log('Container found:', container);

    if (!newsData || !Array.isArray(newsData)) {
        console.error('Invalid newsData:', newsData);
        return;
    }

    console.log('Processing', newsData.length, 'news items');

    // 最新ニュース（外部ニュース）は日付を非表示
    const isLatestNews = containerId === 'externalNewsItems';
    console.log('  - isLatestNews:', isLatestNews);

    const newsHTML = newsData.slice(0, 5).map((item, index) => {
        console.log(`  - Processing item ${index}:`, item);
        return `
        <div class="news-item" onclick="handleNewsClick('${item.link || '#'}')">
            <div class="news-item-header">
                ${!isLatestNews ? `<span class="news-item-date">${formatDate(item.date)}</span>` : ''}
                <span class="news-item-category">${item.category}</span>
            </div>
            <h4 class="news-item-title">${item.title}</h4>
        </div>
    `;
    }).join('');

    console.log('Generated HTML length:', newsHTML.length);
    console.log('Generated HTML:', newsHTML.substring(0, 200));

    container.innerHTML = newsHTML;
    console.log('News items added to:', containerId);
    console.log('Container innerHTML length after update:', container.innerHTML.length);
}

// ========================================
// Featured Item の初期化
// ========================================

function initFeaturedItem() {
    console.log('initFeaturedItem called');
    const titleEl = document.getElementById('featuredTitle');
    const summaryEl = document.getElementById('featuredSummary');

    console.log('Featured elements:', {
        titleEl: titleEl,
        summaryEl: summaryEl,
        featuredItem: featuredItem
    });

    if (titleEl && featuredItem && featuredItem.title) {
        titleEl.textContent = featuredItem.title;
        console.log('Featured title set:', featuredItem.title);
    } else {
        console.error('Failed to set featured title', {
            hasTitleEl: !!titleEl,
            hasFeaturedItem: !!featuredItem,
            hasTitle: featuredItem && !!featuredItem.title
        });
    }

    if (summaryEl && featuredItem && featuredItem.summary) {
        summaryEl.textContent = featuredItem.summary;
        console.log('Featured summary set:', featuredItem.summary);
    } else {
        console.error('Failed to set featured summary', {
            hasSummaryEl: !!summaryEl,
            hasFeaturedItem: !!featuredItem,
            hasSummary: featuredItem && !!featuredItem.summary
        });
    }
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
    console.log('=== HOME.JS START ===');
    console.log('1. DOMContentLoaded fired');

    // データの存在確認
    console.log('2. Data check:');
    console.log('  - tickerData exists?', typeof tickerData !== 'undefined');
    console.log('  - internalNews exists?', typeof internalNews !== 'undefined');
    console.log('  - externalNews exists?', typeof externalNews !== 'undefined');
    console.log('  - featuredItem exists?', typeof featuredItem !== 'undefined');

    if (typeof tickerData !== 'undefined') {
        console.log('  - tickerData:', tickerData);
    }
    if (typeof internalNews !== 'undefined') {
        console.log('  - internalNews:', internalNews);
    }
    if (typeof externalNews !== 'undefined') {
        console.log('  - externalNews:', externalNews);
    }
    if (typeof featuredItem !== 'undefined') {
        console.log('  - featuredItem:', featuredItem);
    }

    // 各初期化関数を実行
    console.log('3. Starting ticker initialization...');
    initTicker();
    console.log('4. Ticker initialization complete');

    console.log('5. Starting internal news panel initialization...');
    initNewsPanel('internalNewsItems', internalNews);
    console.log('6. Internal news panel initialization complete');

    console.log('7. Starting external news panel initialization...');
    initNewsPanel('externalNewsItems', externalNews);
    console.log('8. External news panel initialization complete');

    console.log('9. Starting featured item initialization...');
    initFeaturedItem();
    console.log('10. Featured item initialization complete');

    console.log('=== HOME.JS COMPLETE ===');
});
