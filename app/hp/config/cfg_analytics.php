<?php
/**
 * アナリティクス設定
 * GTM / GSC / Cookie同意に関する設定を一元管理
 */

// 全アナリティクス一括有効/無効（false で全タグ出力停止）
define('ANALYTICS_ENABLED', true);

// Google Tag Manager コンテナID（要置換）
define('GTM_CONTAINER_ID', 'GTM-PXTMHGDF');

// Google Search Console サイト所有権確認コード（要置換）
define('GSC_VERIFICATION_CODE', '8F24bgJgzoeXdGlGj-iHsLj4aVCEjCL9ozp8CUDHHhQ');

// Cookie同意バナー
define('COOKIE_CONSENT_ENABLED', true);
define('COOKIE_CONSENT_COOKIE_NAME', 'dud_cookie_consent');
define('COOKIE_CONSENT_EXPIRY_DAYS', 365);
