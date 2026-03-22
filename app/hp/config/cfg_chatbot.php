<?php
/**
 * チャットボット設定ファイル
 * Dify Chat API との連携設定
 */

// Dify API設定
define('CHATBOT_API_URL', 'https://api.dify.ai/v1');
define('CHATBOT_API_KEY', 'app-OCYCsUcI6zzJuugzAjkYyxYP');

// レート制限（秒）
define('CHATBOT_RATE_LIMIT_SECONDS', 2);

// 入力文字数上限
define('CHATBOT_MAX_MESSAGE_LENGTH', 2000);

// ウェルカムメッセージ
define('CHATBOT_WELCOME_MESSAGE', 'こんにちは！DIG-UP DATAのAIアシスタントです。サービス内容や会社情報について、お気軽にご質問ください。');
