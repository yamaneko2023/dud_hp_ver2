# データ管理ガイド

## 📂 データファイル構成

```
data/
├── announcements.json    # お知らせ（手動更新）
├── tech_news.json        # テックニュース（将来的に自動更新）
├── featured.json         # 注目記事
└── README_DATA_MANAGEMENT.md  # このファイル
```

---

## 🔄 Phase 1: 現在の実装（JSONファイル管理）

### お知らせの更新方法

`data/announcements.json` を直接編集してください。

#### データ構造
```json
{
    "id": 1,
    "date": "YYYY-MM-DD",
    "category": "プレスリリース | お知らせ | 休業日 | メディア掲載",
    "title": "お知らせのタイトル",
    "link": "リンクURL（オプション）",
    "published": true
}
```

#### 更新手順
1. `data/announcements.json` を開く
2. 配列の先頭に新しいお知らせを追加
3. `id` を最新の番号にする
4. `date` を現在の日付にする
5. `published: true` で公開、`false` で非公開
6. 保存してブラウザをリフレッシュ

#### 例
```json
[
    {
        "id": 6,
        "date": "2025-02-10",
        "category": "お知らせ",
        "title": "新しいお知らせのタイトル",
        "link": "",
        "published": true
    },
    ...既存のデータ
]
```

---

## 🤖 Phase 2: 将来の拡張（管理画面）

### 計画中の機能

#### 簡易CMS機能
- Webブラウザからお知らせを追加・編集・削除
- ドラッグ&ドロップで並び替え
- 公開/非公開の切り替え
- プレビュー機能

#### 実装予定技術
- バックエンド: PHP
- データベース: MySQL または SQLite
- 管理画面: シンプルなHTML/CSS/JS

#### 管理画面の構成（案）
```
app_hp/admin/
├── login.php              # ログイン画面
├── dashboard.php          # ダッシュボード
├── announcements.php      # お知らせ管理
├── preview.php            # プレビュー
└── api/
    ├── create.php         # お知らせ作成
    ├── update.php         # お知らせ更新
    └── delete.php         # お知らせ削除
```

---

## 🚀 Phase 3: テックニュース自動取得

### 実装予定の機能

#### AI/APIによる自動ニュース取得
- **ニュースソース**:
  - TechCrunch API
  - Google News API
  - RSS Feed（日経新聞、Forbes、Gigazineなど）
  - OpenAI APIでニュース要約

#### 自動更新フロー
```
1. スケジューラー（cron）が1日1回実行
2. 外部APIからニュース取得
3. AI（GPT）で日本語に要約
4. tech_news.jsonに自動追加
5. auto_generated: true フラグを設定
```

#### 実装予定技術
- スケジューラー: cron（Linux）または Task Scheduler（Windows）
- ニュース取得: PHP curl または Python requests
- AI要約: OpenAI API（GPT-4）
- データ保存: tech_news.json または データベース

#### スクリプト構成（案）
```
scripts/
├── fetch_tech_news.php       # ニュース取得メインスクリプト
├── news_sources.json         # ニュースソース設定
└── lib/
    ├── NewsAPI.php           # ニュースAPI連携
    ├── OpenAI.php            # OpenAI API連携
    └── DataManager.php       # データ管理
```

---

## 📊 データ構造の拡張性

### tech_news.json の拡張フィールド

将来の自動取得に備えて、以下のフィールドを追加予定：

```json
{
    "id": 1,
    "date": "YYYY-MM-DD",
    "category": "AI | DX | データ | テクノロジー",
    "title": "ニュースタイトル",
    "link": "元記事のURL",
    "source": "ニュースソース名",
    "auto_generated": true,           // 自動生成フラグ
    "original_lang": "en",            // 元の言語
    "summary": "AI生成の要約",        // 将来追加
    "keywords": ["AI", "GPT"],        // 将来追加
    "relevance_score": 0.85,          // 将来追加（関連度スコア）
    "fetched_at": "2025-02-02 10:00:00"  // 将来追加
}
```

---

## 🔐 セキュリティ考慮事項

### Phase 2（管理画面）
- ログイン認証（セッション管理）
- CSRF対策（トークン）
- XSS対策（入力サニタイゼーション）
- アクセス制限（IP制限またはBasic認証）

### Phase 3（API連携）
- APIキーの環境変数管理（.envファイル）
- レート制限対策
- エラーハンドリング
- ログ記録

---

## 📝 現在の更新手順（Phase 1）

### 1. お知らせを追加する

```bash
# 1. announcements.jsonを開く
vi data/announcements.json

# 2. 配列の先頭に新しいエントリを追加
# 3. ファイルを保存

# 4. ブラウザで確認
# http://localhost/app_hp/public/home.php
```

### 2. テックニュースを追加する

```bash
# 1. tech_news.jsonを開く
vi data/tech_news.json

# 2. 配列の先頭に新しいエントリを追加
# 3. ファイルを保存

# 4. ブラウザで確認
```

### 3. 注目記事を変更する

```bash
# featured.jsonを編集
vi data/featured.json
```

---

## 🛠️ トラブルシューティング

### データが表示されない場合

1. **ブラウザのコンソールを確認**
   - F12 → Console タブ
   - エラーメッセージを確認

2. **JSONファイルの構文チェック**
   ```bash
   # JSONが正しいか確認
   php -r "json_decode(file_get_contents('data/announcements.json'));"
   ```

3. **ファイルの権限確認**
   ```bash
   # 読み取り権限があるか確認
   ls -la data/
   ```

4. **PHPエラーログ確認**
   - サーバーのエラーログを確認
   - 通常は `/var/log/apache2/error.log` など

---

## 📞 サポート

質問や問題がある場合は、プロジェクト管理者に連絡してください。

---

---

## 🔍 現在のデータファイル一覧

| ファイル名 | 用途 | 更新方法 |
|-----------|------|---------|
| `announcements.json` | お知らせ | 手動更新 |
| `tech_news.json` | テックニュース | 手動更新（将来AI自動化） |
| `featured.json` | 注目記事 | 手動更新 |
| `news.json` | ニュース・インサイト（旧形式） | 使用中（互換性維持） |

---

**最終更新**: 2026年2月3日
**バージョン**: 1.1（Phase 1）
