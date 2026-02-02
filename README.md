# DIG-UP DATA コーポレートサイト (ver2)

## プロジェクト概要

株式会社DIG-UP DATAの企業ホームページ。AI、データ分析、DX推進支援を提供するテクノロジー企業向けの現代的なコーポレートサイトです。

### 企業情報

- **企業名**: 株式会社DIG-UP DATA
- **代表取締役**: 永富 修一
- **設立**: 2023年1月4日
- **所在地**: 〒220-0004 神奈川県横浜市西区北幸一丁目11番1号水信ビル7階
- **Email**: inquiry@mail.digup-data.com
- **ドメイン**: digup-data.co.jp

## 技術スタック

### バックエンド
- **PHP**: メイン言語
- **PHPMailer**: メール送信処理
- **セッション管理**: CSRF対策、セキュリティ強化

### フロントエンド
- **HTML5**
- **CSS3**: カスタムプロパティ、アニメーション、レスポンシブデザイン
- **Vanilla JavaScript**: IntersectionObserver、Fetch API

### 外部サービス
- **Dify AI チャットボット**: フッターに統合
- **Google Fonts**: M PLUS Rounded 1c、Noto Sans JP

## ディレクトリ構造

```
dud_hp_ver2/
├── index.php                    # エントリーポイント（ホームへリダイレクト）
├── app_hp/                      # メインアプリケーション
│   ├── config/                  # 設定ファイル群
│   │   ├── cfg_app.php         # アプリケーション設定
│   │   ├── cfg_company.php     # 企業情報
│   │   ├── cfg_constants.php   # 定数定義
│   │   ├── cfg_messages.php    # メッセージ定義
│   │   ├── cfg_pages.php       # ページ設定
│   │   └── cfg_security.php    # セキュリティ関数
│   ├── public/                  # 公開ページ
│   │   ├── home.php            # トップページ
│   │   ├── vision.php          # ビジョン
│   │   ├── services.php        # サービス紹介
│   │   ├── company.php         # 会社概要
│   │   ├── careers.php         # 採用情報
│   │   ├── contact.php         # お問い合わせ
│   │   └── thanks.php          # 送信完了
│   ├── includes/                # 共通テンプレート
│   │   ├── header.php          # ヘッダー・ナビゲーション
│   │   └── footer.php          # フッター・チャットボット
│   ├── api/                     # APIエンドポイント
│   │   ├── mail.php            # メール送信API
│   │   └── token.php           # CSRFトークン生成
│   └── vendor/                  # 外部ライブラリ
│       └── PHPMailer/          # メール送信ライブラリ
├── css/                         # スタイルシート
│   ├── style.css               # メインスタイル（3,000行以上）
│   └── variables.css           # CSS変数
├── js/                          # JavaScript
│   ├── script.js               # メインスクリプト
│   ├── home.js                 # ホームページ専用（Ticker, Bento Grid）
│   ├── contact.js              # フォーム処理
│   ├── config.js               # 設定
│   ├── animation-config.js     # アニメーション設定
│   └── company-data.js         # 企業データ
├── data/                        # データファイル
│   └── news.json               # ニュース・インサイト
├── img/                         # 画像
│   ├── company_logo.svg        # ロゴ
│   └── (ビジョン画像3点)
└── video/                       # 動画ファイル
    ├── home_bkground.mp4       # ホーム背景
    ├── header_*.mp4            # 各ページヘッダー背景
    └── (ビジョン動画2点)
```

## ページ構成

| ページ | URL | 説明 |
|--------|-----|------|
| Home | `/app_hp/public/home.php` | **リニューアル版**：ヒーロー、News Ticker、Bento Grid（サイトナビ、お知らせ、最新ニュース、注目記事） |
| Our Vision | `/app_hp/public/vision.php` | 企業ビジョン、3つの価値観 |
| Services | `/app_hp/public/services.php` | 6つのサービス紹介 |
| Company | `/app_hp/public/company.php` | 会社概要、沿革タイムライン |
| Careers | `/app_hp/public/careers.php` | 採用情報、募集要項 |
| Contact | `/app_hp/public/contact.php` | お問い合わせフォーム |
| Thanks | `/app_hp/public/thanks.php` | 送信完了ページ |
| Privacy Policy | `/app_hp/public/privacy.php` | プライバシーポリシー |
| Compliance | `/app_hp/public/compliance.php` | コンプライアンスポリシー |
| Recruit Privacy | `/app_hp/public/recruit-privacy.php` | 採用個人情報の取扱い |

## 主要サービス

1. **Webシステム／サイト構築**: コーポレートサイト、業務Webシステム
2. **AIアプリ開発**: チャットボット、AIエージェント、ワークフロー自動化
3. **生成AI教育・学習支援**: 企業研修、プロンプトエンジニアリング
4. **データ分析**: ビッグデータ分析、データ基盤構築
5. **DX推進支援**: 業務プロセス可視化、デジタル化戦略
6. **その他**: ECサイト開発、コンサルティング

## ホームページ リニューアル（2026年2月）

### 新機能

#### 1. News Ticker（ニュースティッカー）
- ヒーローセクション直下に配置
- 右から左へ無限ループするアニメーション
- 最新ニュースをリアルタイム表示
- JavaScriptで動的にデータ読み込み

#### 2. Bento Grid デザイン
モダンなタイル形式のレイアウトで以下の4つのセクションを配置：

**a) サイトナビゲーション（大タイル: 2列×2行）**
- 主要6ページへの詳細リンク
- Our Vision、Services、Company、Careers、Contact、Privacy Policy
- 各ページの説明文付き
- Glassmorphism + ホバーエフェクト

**b) お知らせ（中タイル: 2列×1行）**
- 外部向けの企業お知らせ
- プレスリリース、オフィス移転、休業日、メディア掲載など
- スクロール可能なリスト形式
- カテゴリタグ・日付付き
- データ管理: `data/announcements.json`

**c) 最新ニュース（中タイル: 2列×1行）**
- AI自動取得の世界ニュース（毎日更新予定）
- AI、DX、データ分析、テクノロジー全般のトレンド
- 個別日付非表示（"Today"バッジで現在性を強調）
- 外部リンクへの遷移機能
- データ管理: `data/tech_news.json`（将来的にAI自動更新）

**d) 注目記事（小タイル: 1列×1行）**
- Featured バッジ付き
- 重要なお知らせや記事をハイライト

### デザイン特徴

- **Glassmorphism**: 半透明背景 + ぼかし効果
- **Glow エフェクト**: ホバー時の紫色の発光
- **グラデーションオーバーレイ**: インタラクティブな視覚効果
- **カードアニメーション**: 浮き上がり効果（translateY）
- **レスポンシブ対応**: デスクトップ（4列）→ タブレット（2列）→ モバイル（1列）

### 技術実装

**JavaScript (home.js)**
- DOMContentLoaded での初期化
- 動的HTMLレンダリング
- 日付フォーマット処理
- クリックイベントハンドリング

**CSS (style.css)**
- CSS Grid レイアウト
- Flexbox による内部配置
- CSS変数でカラー管理
- cubic-bezier による滑らかなアニメーション
- z-index による階層管理

**データ構造**
```javascript
// ティッカーデータ
{ date, category, title }

// ニュースデータ
{ date, category, title, link }

// 注目記事
{ title, summary, link }
```

## セキュリティ機能

### 実装済みの対策

| 対策 | 実装方法 |
|------|---------|
| CSRF対策 | セッションベースのトークン生成・検証 |
| XSS対策 | 入力値のサニタイズ（htmlspecialchars） |
| スパム対策 | Honeypot（ダミーフィールド） |
| レート制限 | IPベース（5分間に1回） |
| リファラチェック | HTTP_REFERERの検証 |
| メールインジェクション対策 | 改行文字の除去 |
| バリデーション | クライアント・サーバー両側 |
| セッション保護 | HttpOnly、Secure Cookie |

### セキュリティ設定（cfg_app.php）

```php
HONEYPOT_ENABLED: true
RATE_LIMIT_ENABLED: true
RATE_LIMIT_WINDOW: 300秒（5分）
ALLOWED_DOMAINS: ['localhost', 'digup-data.co.jp']
```

## デザインの特徴

### カラースキーム
- **プライマリ**: #6366f1（インディゴ）
- **セカンダリ**: #8b5cf6（紫）
- **アクセント**: #ec4899（ピンク）
- **背景**: rgba(20, 20, 40, 0.85)（濃い紫青）
- **グラデーション**: 複数のカラフルなグラデーション

### UI/UX機能
- **ビデオ背景**: 各ページで異なる動画
- **News Ticker**: 右から左へ無限ループアニメーション
- **Bento Grid**: モダンなタイル形式レイアウト
- **Glassmorphism**: 半透明 + ぼかし効果
- **Glow エフェクト**: ホバー時の発光
- **スクロールアニメーション**: IntersectionObserver
- **ハンバーガーメニュー**: モバイル対応
- **パラレックス効果**: 浮遊カード
- **完全レスポンシブ**: デスクトップ/タブレット/モバイル
- **Dify AIチャットボット**: フッターに統合

## お問い合わせフォーム機能

### フロー
1. ユーザー入力 → バリデーション
2. 確認画面表示（データは一時保存）
3. CSRFトークン取得
4. API送信（/app_hp/api/mail.php）
5. メール送信（PHPMailer）
6. 完了ページへリダイレクト

### 入力項目
- 会社名
- お名前
- メールアドレス
- 電話番号
- お問い合わせ内容

### メール設定
- **モード**: PHP mail() 関数
- **自動返信**: 無効
- **ハニーポット**: 有効
- **レート制限**: 有効（5分間に1回/IP）

## データ管理

ホームページのニュースデータは以下のJSONファイルで管理されています。

### データファイル構成
- `data/announcements.json`: お知らせ（手動更新）
- `data/tech_news.json`: 最新ニュース（将来的にAI自動更新）
- `data/featured.json`: 注目記事
- `data/README_DATA_MANAGEMENT.md`: データ管理の詳細ガイド

### announcements.json構造
```json
[
  {
    "id": 1,
    "date": "2025-02-02",
    "category": "プレスリリース | お知らせ | 休業日 | メディア掲載",
    "title": "お知らせのタイトル",
    "link": "リンクURL（オプション）",
    "published": true
  }
]
```

### tech_news.json構造（最新ニュース）
```json
[
  {
    "id": 1,
    "date": "2025-02-02",
    "category": "AI | DX | データ | テクノロジー",
    "title": "ニュースタイトル",
    "link": "元記事のURL",
    "source": "ニュースソース名",
    "auto_generated": false
  }
]
```

### データ更新方法
詳細は `data/README_DATA_MANAGEMENT.md` を参照してください。

#### Phase 1（現在）: JSONファイル直接編集
- お知らせ: `data/announcements.json` を手動更新
- 最新ニュース: `data/tech_news.json` を手動更新

#### Phase 2（計画中）: 管理画面CMS
- Webブラウザから編集可能に
- データベース（MySQL/SQLite）へ移行

#### Phase 3（計画中）: AI自動更新
- 外部ニュースAPIから自動取得
- OpenAI APIで日本語要約
- 1日1回自動更新（cron）

## 採用情報

### 募集条件
- **雇用形態**: 正社員、契約社員、個人事業主
- **勤務地**: 本社（横浜）、テレワーク、プロジェクト先
- **給与**: 月給23万円以上（経験・スキルによる）
- **勤務時間**: 09:00〜18:00（フレックス選択可）

### 休日・福利厚生
- 週休二日制、祝日、年末年始、夏季休暇
- 有給休暇、育児休暇
- 社会保険完備
- 交通費支給、時間外手当
- 社員紹介制度
- 生成AI利用制度

## 開発・デプロイ

### 必要な環境
- PHP 7.4以上
- Webサーバー（Apache/Nginx）
- メール送信機能（SMTP or mail()）

### 設定ファイルの編集箇所
- `app_hp/config/cfg_company.php`: 企業情報
- `app_hp/config/cfg_app.php`: メール・セキュリティ設定
- `data/news.json`: ニュース更新

### 本番環境での注意点
1. HTTPSを有効化（セキュアCookie対応）
2. エラーログのパス確認（app_hp/logs/）
3. メール送信テスト
4. CSRF許可ドメインの設定
5. レート制限の設定確認

## パフォーマンス最適化

### 実装済み
- IntersectionObserver（効率的なスクロール検出）
- 画像はSVG形式（ロゴ）
- CSS変数でスタイル管理
- 遅延ロードの検討余地あり

### 改善提案
- 画像の遅延読み込み（lazy loading）
- 動画ファイルの最適化・圧縮
- CSSの最小化
- JavaScriptのバンドル化

## ブランチ戦略

- **main**: 本番環境用
- **renewal_1**: 現在の開発ブランチ

## ライセンス・著作権

Copyright © 2025 株式会社DIG-UP DATA All Rights Reserved.

---

## 開発者向けメモ

### コードの特徴
- 設定ファイルで一元管理（保守性が高い）
- セキュリティ関数を分離（再利用可能）
- Vanilla JS（フレームワーク不使用）
- モダンCSS（カスタムプロパティ、Grid、Flexbox）

### 拡張性
- ニュースはJSON管理（CMS化可能）
- サービスの追加が容易
- ページテンプレートの共通化

### 注意点
- PHPMailerのバージョン管理
- セキュリティアップデート
- ブラウザ互換性テスト
- 動画ファイルサイズの管理
