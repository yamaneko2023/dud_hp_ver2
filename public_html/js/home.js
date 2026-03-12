// ========================================
// 新デザイン - Home.js
// ========================================

// データはPHPから渡されます（home.phpで定義）
// - announcements: お知らせデータ
// - latestNews: 最新ニュースデータ

document.addEventListener('DOMContentLoaded', function() {
    console.log('=== HOME.JS START ===');

    // データの存在確認
    if (typeof announcements !== 'undefined' && typeof latestNews !== 'undefined') {
        console.log('Data loaded successfully');
        initNewsLists();
        initScrollAnimations();
    } else {
        console.error('Data not loaded');
    }
});

// ========================================
// ニュースリストの初期化
// ========================================

function initNewsLists() {
    // お知らせリスト
    const announcementsList = document.getElementById('announcementsList');
    if (announcementsList) {
        const published = (Array.isArray(announcements)
            ? announcements.filter(item => item.published === true) : []
        ).slice().sort((a, b) => (b.date || '').localeCompare(a.date || ''));
        if (published.length > 0) {
            announcementsList.innerHTML = published.map(item => `
                <a href="/announcements" class="news-item-simple">
                    <div class="news-item-left">
                        <span class="news-date">${formatDate(item.date)}</span>
                        <span class="news-category">${item.category}</span>
                        <span class="news-title-text">${item.title}</span>
                    </div>
                    <svg class="news-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            `).join('');
        } else {
            announcementsList.innerHTML = `
                <div class="news-empty">
                    <p class="news-empty-text">現在、お知らせはありません。</p>
                </div>`;
        }
    }

    // 最新ニュースリスト（ラッパーオブジェクト対応）
    const latestNewsList = document.getElementById('latestNewsList');
    if (latestNewsList) {
        const newsItems = ((latestNews && Array.isArray(latestNews.items))
            ? latestNews.items
            : (Array.isArray(latestNews) ? latestNews : [])
        ).slice().sort((a, b) => (b.date || '').localeCompare(a.date || ''));

        // 取得日時を表示
        const fetchedAtEl = document.getElementById('newsFetchedAt');
        if (fetchedAtEl && latestNews && latestNews.fetched_at) {
            const d = new Date(latestNews.fetched_at.replace(' ', 'T'));
            const fa = `${d.getFullYear()}年${String(d.getMonth()+1).padStart(2,'0')}月${String(d.getDate()).padStart(2,'0')}日 ${d.getHours()}時`;
            fetchedAtEl.textContent = `${fa} 取得`;
        }

        if (newsItems.length > 0) {
            latestNewsList.innerHTML = newsItems.map(item => `
                <a href="${item.link || '#'}" class="news-item-simple" target="_blank" rel="noopener noreferrer">
                    <div class="news-item-left">
                        <span class="news-date">${formatDate(item.date)}</span>
                        <span class="news-type">${formatType(item.type)}</span>
                        <span class="news-category">${item.category}</span>
                        <span class="news-title-text">${item.title}</span>
                    </div>
                    <svg class="news-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            `).join('');
        } else {
            latestNewsList.innerHTML = `
                <div class="news-empty">
                    <p class="news-empty-text">現在、最新ニュースはありません。</p>
                </div>`;
        }
    }
}

// ========================================
// スクロールアニメーション
// ========================================

function initScrollAnimations() {
    const elements = document.querySelectorAll('[data-aos]');

    const observerOptions = {
        threshold: 0.2,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('aos-animate');
            }
        });
    }, observerOptions);

    elements.forEach(element => {
        element.classList.add('aos-init');
        observer.observe(element);
    });
}

// ========================================
// ユーティリティ関数
// ========================================

function formatType(type) {
    const labels = { article: '記事', youtube: 'YouTube' };
    return labels[type] || type || '';
}

function formatDate(dateString) {
    const date = new Date(dateString);
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const day = String(date.getDate()).padStart(2, '0');
    return `${year}.${month}.${day}`;
}

// ========================================
// AOS（Animate On Scroll）スタイル
// ========================================

const style = document.createElement('style');
style.textContent = `
    .aos-init {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }

    .aos-animate {
        opacity: 1;
        transform: translateY(0);
    }

    [data-aos-delay="0"] {
        transition-delay: 0s;
    }

    [data-aos-delay="100"] {
        transition-delay: 0.1s;
    }

    [data-aos-delay="200"] {
        transition-delay: 0.2s;
    }
`;
document.head.appendChild(style);

console.log('=== HOME.JS COMPLETE ===');
