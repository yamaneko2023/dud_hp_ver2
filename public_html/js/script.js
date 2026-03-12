// ハンバーガーメニューの動作
const hamburger = document.querySelector('.hamburger');
const navMenu = document.querySelector('.nav-menu');

hamburger.addEventListener('click', () => {
    const isOpen = navMenu.classList.toggle('active');
    hamburger.classList.toggle('active');
    hamburger.setAttribute('aria-expanded', isOpen);
});

// メニューリンクをクリックしたらメニューを閉じる
document.querySelectorAll('.nav-menu a').forEach(link => {
    link.addEventListener('click', () => {
        navMenu.classList.remove('active');
        hamburger.classList.remove('active');
        hamburger.setAttribute('aria-expanded', 'false');
    });
});

// Escapeキーでメニューを閉じる
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && navMenu.classList.contains('active')) {
        navMenu.classList.remove('active');
        hamburger.classList.remove('active');
        hamburger.setAttribute('aria-expanded', 'false');
        hamburger.focus();
    }
});


// スクロール時のナビゲーションバーのスタイル変更 + パララックス（統合・throttle適用）
const navbar = document.querySelector('.navbar');

window.addEventListener('scroll', DudUtils.throttle(() => {
    const currentScroll = window.pageYOffset;

    if (currentScroll > 100) {
        navbar.style.boxShadow = '0 4px 6px -1px rgba(0, 0, 0, 0.1)';
    } else {
        navbar.style.boxShadow = '0 1px 2px 0 rgba(0, 0, 0, 0.05)';
    }

    // パララックス効果（浮遊カード）
    const cards = document.querySelectorAll('.floating-card');
    cards.forEach((card, index) => {
        const speed = 0.5 + (index * 0.2);
        card.style.transform = `translateY(${currentScroll * speed}px)`;
    });
}, 16)); // ~60fps

// スクロール時の要素のフェードイン
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// アニメーション対象の要素を監視
document.querySelectorAll('.service-card, .feature-item, .info-item, .process-step, .mission-item, .timeline-item, .contact-info-card').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(30px)';
    el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    observer.observe(el);
});

// サービスページのジグザグレイアウト用アニメーション
const serviceObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('fade-in');
        }
    });
}, {
    threshold: 0.2,
    rootMargin: '0px 0px -50px 0px'
});

document.querySelectorAll('.service-item').forEach(el => {
    serviceObserver.observe(el);
});

// ビジョンページのアニメーション
const visionObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
});

// ビジョンセクションのアニメーション初期設定
document.querySelectorAll('.vision-content, .triangle-content, .statement-content').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(50px)';
    el.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
    visionObserver.observe(el);
});

// ページ読み込み時のアニメーション
window.addEventListener('load', () => {
    document.body.style.opacity = '1';
});

// スムーズなページ遷移
document.body.style.opacity = '0';
document.body.style.transition = 'opacity 0.3s ease';
setTimeout(() => {
    document.body.style.opacity = '1';
}, 100);

// コピーライトの年を自動更新
document.addEventListener('DOMContentLoaded', () => {
    const yearElement = document.getElementById('current-year');
    if (yearElement) {
        yearElement.textContent = new Date().getFullYear();
    }
});
