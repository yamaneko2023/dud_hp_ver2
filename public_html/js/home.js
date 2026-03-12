// ========================================
// 新デザイン - Home.js
// ========================================

document.addEventListener('DOMContentLoaded', function() {
    const announcements = DudUtils.loadJsonData('announcements-data');
    const latestNews = DudUtils.loadJsonData('latest-news-data');

    if (announcements && latestNews) {
        initNewsLists(announcements, latestNews);
        initScrollAnimations();
    } else {
        console.error('Data not loaded');
    }
});

// ========================================
// ニュースリストの初期化
// ========================================

function initNewsLists(announcements, latestNews) {
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
                        <span class="news-date">${DudUtils.formatDate(item.date)}</span>
                        <span class="news-category">${DudUtils.escapeHtml(item.category)}</span>
                        <span class="news-title-text">${DudUtils.escapeHtml(item.title)}</span>
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
                <a href="${DudUtils.escapeHtml(item.link) || '#'}" class="news-item-simple" target="_blank" rel="noopener noreferrer">
                    <div class="news-item-left">
                        <span class="news-date">${DudUtils.formatDate(item.date)}</span>
                        <span class="news-type">${DudUtils.formatType(item.type)}</span>
                        <span class="news-category">${DudUtils.escapeHtml(item.category)}</span>
                        <span class="news-title-text">${DudUtils.escapeHtml(item.title)}</span>
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
