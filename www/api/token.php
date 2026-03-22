<?php
/**
 * CSRFトークンを取得するAPI
 */

// 非公開ディレクトリのパス定義
define('APP_DIR', __DIR__ . '/../../app/hp');

require_once APP_DIR . '/config/cfg_security.php';

// セッション開始
startSecureSession();

// CSRFトークンの生成
$token = generateCSRFToken();

// JSON形式で返す
header('Content-Type: application/json; charset=utf-8');
echo json_encode([
    'success' => true,
    'token' => $token
], JSON_UNESCAPED_UNICODE);
