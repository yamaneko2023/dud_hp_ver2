/**
 * アニメーション設定ファイル
 *
 * スクロールアニメーション、パララックス効果、IntersectionObserverなどの設定を定義します。
 */

// ===== IntersectionObserver 設定 =====
const OBSERVER_CONFIG = {
    // 基本設定
    THRESHOLD: 0.1,  // 要素の10%が表示されたら発火
    ROOT_MARGIN: '0px 0px -100px 0px',  // 下から100px手前で発火
    ROOT_MARGIN_ALT: '0px 0px -50px 0px',  // 下から50px手前で発火（代替）

    // 複数の閾値を使用する場合
    THRESHOLDS_MULTI: [0, 0.1, 0.5, 1.0]
};

// ===== パララックス効果設定 =====
const PARALLAX_CONFIG = {
    BASE_SPEED: 0.5,        // 基本速度
    SPEED_INCREMENT: 0.2,   // 速度の増分（index * SPEED_INCREMENT）
    ENABLED: true           // パララックス効果を有効にするか
};

// ===== トランジション時間 =====
const TRANSITION = {
    FAST: '0.3s',
    NORMAL: '0.6s',
    SLOW: '0.8s',
    VERY_SLOW: '1s'
};

// ===== アニメーション開始位置 =====
const ANIMATION_OFFSET = {
    TRANSLATE_Y_START: '30px',  // Y軸の開始位置（下から上へ）
    TRANSLATE_Y_END: '0px',
    OPACITY_HIDDEN: 0,
    OPACITY_VISIBLE: 1
};

// ===== スクロール検出設定 =====
const SCROLL_CONFIG = {
    THRESHOLD: 100,  // スクロール検出の閾値（ピクセル）
    DEBOUNCE_DELAY: 100  // デバウンス遅延（ミリ秒）
};

// ===== ナビゲーションバー設定 =====
const NAVBAR_CONFIG = {
    SCROLL_THRESHOLD: 100,  // navbarが固定される閾値
    TRANSITION_DURATION: '0.3s'
};

// ===== フェードイン設定 =====
const FADE_IN_CONFIG = {
    DURATION: '0.6s',
    DELAY_BASE: 0,  // 基本遅延（秒）
    DELAY_INCREMENT: 0.1,  // 連続要素の遅延増分（秒）
    EASING: 'ease'
};

// ===== 対象セレクター（アニメーション適用対象） =====
const ANIMATION_SELECTORS = {
    SERVICE_CARD: '.service-card',
    FEATURE_ITEM: '.feature-item',
    INFO_ITEM: '.info-item',
    PROCESS_STEP: '.process-step',
    MISSION_ITEM: '.mission-item',
    TIMELINE_ITEM: '.timeline-item',
    CONTACT_INFO_CARD: '.contact-info-card',
    FLOATING_CARD: '.floating-card'  // パララックス用
};

// ===== ヘルパー関数 =====

/**
 * デバウンス関数
 * 連続したイベントを制限し、最後のイベントのみ実行する
 *
 * @param {Function} func 実行する関数
 * @param {number} delay 遅延時間（ミリ秒）
 * @return {Function} デバウンスされた関数
 */
function debounce(func, delay = SCROLL_CONFIG.DEBOUNCE_DELAY) {
    let timeoutId;
    return function (...args) {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(() => func.apply(this, args), delay);
    };
}

/**
 * スロットル関数
 * 連続したイベントを一定間隔で実行する
 *
 * @param {Function} func 実行する関数
 * @param {number} limit 間隔（ミリ秒）
 * @return {Function} スロットルされた関数
 */
function throttle(func, limit = SCROLL_CONFIG.DEBOUNCE_DELAY) {
    let inThrottle;
    return function (...args) {
        if (!inThrottle) {
            func.apply(this, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

// ===== フリーズして変更不可にする =====
Object.freeze(OBSERVER_CONFIG);
Object.freeze(PARALLAX_CONFIG);
Object.freeze(TRANSITION);
Object.freeze(ANIMATION_OFFSET);
Object.freeze(SCROLL_CONFIG);
Object.freeze(NAVBAR_CONFIG);
Object.freeze(FADE_IN_CONFIG);
Object.freeze(ANIMATION_SELECTORS);
