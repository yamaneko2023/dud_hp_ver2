/**
 * Announcements Page JavaScript
 * 年ごとにグループ化してリストを表示、クリック時に詳細を表示
 */

document.addEventListener('DOMContentLoaded', () => {
    const featuredSection = document.querySelector('.ann-featured-section');
    const listContainer = document.getElementById('announcementsListContainer');
    const announcementsList = DudUtils.loadJsonData('announcements-list-data');

    if (!listContainer) return;

    // 年ごとにグループ化してリストを生成
    renderAnnouncementsByYear();

    /**
     * 年ごとにグループ化してリストを表示
     */
    function renderAnnouncementsByYear() {
        if (!announcementsList || announcementsList.length === 0) {
            listContainer.innerHTML = `
                <div class="news-empty">
                    <p class="news-empty-text">現在、お知らせはありません。</p>
                </div>`;
            return;
        }

        // 年ごとにグループ化
        const groupedByYear = {};
        announcementsList.forEach(item => {
            const year = item.date ? item.date.substring(0, 4) : '不明';
            if (!groupedByYear[year]) {
                groupedByYear[year] = [];
            }
            groupedByYear[year].push(item);
        });

        // 年を降順にソート
        const years = Object.keys(groupedByYear).sort((a, b) => b.localeCompare(a));

        // 年リンクとリストのHTML生成（左右レイアウト）
        listContainer.innerHTML = `
            <div class="ann-layout">
                <!-- 左側: 年リンク -->
                <div class="ann-year-nav" role="tablist" aria-label="年ごとのお知らせ">
                    ${years.map((year, index) => `
                        <a href="#" class="ann-year-link ${index === 0 ? 'active' : ''}"
                           data-year="${year}"
                           role="tab"
                           aria-selected="${index === 0}"
                           aria-controls="ann-panel-${year}"
                           tabindex="${index === 0 ? '0' : '-1'}">
                            ${year}年
                        </a>
                    `).join('')}
                </div>

                <!-- 右側: リスト -->
                <div class="ann-year-content">
                    ${years.map((year, index) => `
                        <div class="ann-year-group ${index === 0 ? 'active' : ''}"
                             data-year="${year}"
                             id="ann-panel-${year}"
                             role="tabpanel"
                             aria-labelledby="ann-tab-${year}">
                            <div class="ann-list">
                                ${groupedByYear[year].map((item) => {
                                    const hasLink = item.link && item.link.trim() !== '';
                                    const tag = hasLink ? 'a' : 'div';
                                    const linkAttr = hasLink ? ` href="${DudUtils.escapeHtml(item.link)}" target="_blank" rel="noopener noreferrer"` : '';
                                    const dateFormatted = DudUtils.formatDate(item.date);
                                    const dataIndex = announcementsList.indexOf(item);

                                    return `
                                        <${tag}${linkAttr} class="news-item-simple" data-index="${dataIndex}">
                                            <div class="news-item-left">
                                                <span class="news-date">${DudUtils.escapeHtml(dateFormatted)}</span>
                                                <span class="news-category">${DudUtils.escapeHtml(item.category || '')}</span>
                                                <span class="news-title-text">${DudUtils.escapeHtml(item.title || '')}</span>
                                            </div>
                                            ${hasLink ? `
                                                <svg class="news-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                </svg>
                                            ` : ''}
                                        </${tag}>
                                    `;
                                }).join('')}
                            </div>
                        </div>
                    `).join('')}
                </div>
            </div>
        `;

        // イベントリスナーを設定
        attachClickListeners();
        attachYearTabListeners();
    }

    /**
     * 年リンクのクリック・キーボードイベントを設定
     */
    function attachYearTabListeners() {
        const yearLinks = document.querySelectorAll('.ann-year-link');
        const yearGroups = document.querySelectorAll('.ann-year-group');

        function selectTab(link) {
            const selectedYear = link.getAttribute('data-year');

            yearLinks.forEach(l => {
                l.classList.remove('active');
                l.setAttribute('aria-selected', 'false');
                l.setAttribute('tabindex', '-1');
            });
            yearGroups.forEach(g => g.classList.remove('active'));

            link.classList.add('active');
            link.setAttribute('aria-selected', 'true');
            link.setAttribute('tabindex', '0');
            link.focus();

            const selectedGroup = document.querySelector(`.ann-year-group[data-year="${selectedYear}"]`);
            if (selectedGroup) {
                selectedGroup.classList.add('active');
            }
        }

        yearLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                selectTab(link);
            });

            // キーボードナビゲーション（矢印キー対応）
            link.addEventListener('keydown', (e) => {
                const links = Array.from(yearLinks);
                const currentIndex = links.indexOf(link);
                let targetIndex = -1;

                if (e.key === 'ArrowDown' || e.key === 'ArrowRight') {
                    e.preventDefault();
                    targetIndex = (currentIndex + 1) % links.length;
                } else if (e.key === 'ArrowUp' || e.key === 'ArrowLeft') {
                    e.preventDefault();
                    targetIndex = (currentIndex - 1 + links.length) % links.length;
                } else if (e.key === 'Home') {
                    e.preventDefault();
                    targetIndex = 0;
                } else if (e.key === 'End') {
                    e.preventDefault();
                    targetIndex = links.length - 1;
                }

                if (targetIndex >= 0) {
                    selectTab(links[targetIndex]);
                }
            });
        });
    }

    /**
     * クリックイベントリスナーを設定
     */
    function attachClickListeners() {
        const listItems = document.querySelectorAll('.news-item-simple');
        listItems.forEach((item) => {
            item.addEventListener('click', (e) => {
                const index = parseInt(item.getAttribute('data-index'));
                const announcement = announcementsList[index];
                if (!announcement) return;

                // 外部リンクがなく、かつbodyまたはimageがある場合のみ詳細表示
                if (!announcement.link && (announcement.body || announcement.image)) {
                    e.preventDefault();
                    showAnnouncementDetail(announcement);
                }
            });
        });
    }

    /**
     * お知らせの詳細を表示
     */
    function showAnnouncementDetail(announcement) {
        if (!featuredSection) return;

        // 画像を更新
        const imgElement = featuredSection.querySelector('.ann-featured-image img');
        if (imgElement && announcement.image) {
            imgElement.src = announcement.image;
            imgElement.alt = announcement.title;
            imgElement.parentElement.style.display = 'block';
        } else if (imgElement) {
            imgElement.parentElement.style.display = 'none';
        }

        // 日付を更新
        const dateElement = featuredSection.querySelector('.ann-featured-date');
        if (dateElement) {
            dateElement.textContent = announcement.date || '';
        }

        // カテゴリを更新
        const categoryElement = featuredSection.querySelector('.ann-featured-category');
        if (categoryElement) {
            categoryElement.textContent = announcement.category || '';
        }

        // タイトルを更新
        const titleElement = featuredSection.querySelector('.ann-featured-title');
        if (titleElement) {
            titleElement.textContent = announcement.title || '';
        }

        // 本文を更新
        const contentElement = featuredSection.querySelector('.ann-featured-content');
        if (contentElement && announcement.body && announcement.body.length > 0) {
            contentElement.innerHTML = '';
            announcement.body.forEach(block => {
                if (block.type === 'heading') {
                    const heading = document.createElement('h3');
                    heading.textContent = block.content;
                    contentElement.appendChild(heading);
                } else if (block.type === 'paragraph') {
                    const paragraph = document.createElement('p');
                    paragraph.textContent = block.content;
                    contentElement.appendChild(paragraph);
                }
            });
            contentElement.style.display = 'block';
        } else if (contentElement) {
            contentElement.style.display = 'none';
        }

        // リンクを更新
        const linkElement = featuredSection.querySelector('.award-link');
        if (linkElement && announcement.link) {
            linkElement.href = announcement.link;
            linkElement.style.display = 'flex';
        } else if (linkElement) {
            linkElement.style.display = 'none';
        }

        // スムーズスクロールで表示エリアまで移動
        featuredSection.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
});
