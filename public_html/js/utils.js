/**
 * 共通ユーティリティ関数
 * home.js, announcements.js で共有する関数を定義
 */
const DudUtils = (() => {
    /**
     * 日付を YYYY.MM.DD 形式にフォーマット
     * @param {string} dateString - 日付文字列
     * @returns {string}
     */
    function formatDate(dateString) {
        if (!dateString) return '';
        const date = new Date(dateString);
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}.${month}.${day}`;
    }

    /**
     * HTMLエスケープ
     * @param {string} text
     * @returns {string}
     */
    function escapeHtml(text) {
        if (!text) return '';
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    /**
     * 記事タイプのラベル変換
     * @param {string} type
     * @returns {string}
     */
    function formatType(type) {
        const labels = { article: '記事', youtube: 'YouTube' };
        return labels[type] || type || '';
    }

    /**
     * スロットル関数
     * @param {Function} func
     * @param {number} limit - 間隔（ミリ秒）
     * @returns {Function}
     */
    function throttle(func, limit) {
        let inThrottle;
        return function (...args) {
            if (!inThrottle) {
                func.apply(this, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    }

    /**
     * <script type="application/json"> からデータを読み込む
     * @param {string} elementId
     * @returns {*} パースされたデータ、または null
     */
    function loadJsonData(elementId) {
        const el = document.getElementById(elementId);
        if (!el) return null;
        try {
            return JSON.parse(el.textContent);
        } catch (e) {
            console.error(`Failed to parse JSON from #${elementId}:`, e);
            return null;
        }
    }

    return { formatDate, escapeHtml, formatType, throttle, loadJsonData };
})();
