/**
 * 会社情報データ（JavaScript用）
 *
 * フロントエンドで使用する会社情報を定義します。
 * PHPの company.php と同じデータを保持します。
 */

const COMPANY_DATA = {
    name: {
        jp: '株式会社DIG-UP DATA',
        en: 'DIG-UP DATA Inc.'
    },
    ceo: '永富 修一',
    established: '2023年1月4日',
    address: '〒220-0004 神奈川県横浜市西区北幸一丁目１１番１号水信ビル７階',
    email: {
        inquiry: 'inquiry@mail.digup-data.com',
        info: 'info@digupdata.co.jp',
        privacy: 'privacy@digupdata.co.jp'
    },
    domain: 'digup-data.co.jp',
    url: 'https://digup-data.co.jp'
};

// ===== ヘルパー関数 =====

/**
 * data-company属性を持つ要素に会社情報を動的に挿入
 *
 * 使用例:
 *   <span data-company="name"></span> → "株式会社DIG-UP DATA"
 *   <span data-company="address"></span> → "〒220-0004 神奈川県..."
 *   <a data-company="email.inquiry" href="mailto:"></a> → href属性も設定
 */
function populateCompanyData() {
    const elements = document.querySelectorAll('[data-company]');

    elements.forEach(el => {
        const key = el.getAttribute('data-company');
        const value = getNestedValue(COMPANY_DATA, key);

        if (value) {
            // テキストコンテンツを設定
            el.textContent = value;

            // メールアドレスの場合、href属性も設定
            if (key.startsWith('email.') && el.tagName === 'A' && !el.hasAttribute('href')) {
                el.setAttribute('href', `mailto:${value}`);
            }

            // URLの場合、href属性を設定
            if (key === 'url' && el.tagName === 'A') {
                el.setAttribute('href', value);
            }
        }
    });
}

/**
 * ネストされたオブジェクトから値を取得
 *
 * @param {Object} obj 対象オブジェクト
 * @param {string} path パス（例: "name.jp", "email.inquiry"）
 * @return {*} 取得した値、存在しない場合はnull
 */
function getNestedValue(obj, path) {
    return path.split('.').reduce((current, key) => current?.[key], obj) || null;
}

// ===== DOMContentLoaded時に自動実行 =====
if (typeof document !== 'undefined') {
    document.addEventListener('DOMContentLoaded', populateCompanyData);
}

// ===== フリーズして変更不可にする =====
Object.freeze(COMPANY_DATA);
Object.freeze(COMPANY_DATA.name);
Object.freeze(COMPANY_DATA.email);
