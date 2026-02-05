# Google Search Console 設定ガイド

**作成日**: 2026年2月5日
**対象サイト**: https://digup-data.co.jp

---

## 📋 目次

1. [Google Search Console とは](#what-is-gsc)
2. [登録前の確認事項](#pre-registration)
3. [登録手順](#registration-steps)
4. [サイトマップの送信](#sitemap-submission)
5. [確認すべき重要項目](#important-checks)
6. [トラブルシューティング](#troubleshooting)

---

## <a name="what-is-gsc"></a>1. Google Search Console とは

Google Search Console（GSC）は、Googleが無料で提供する、Webサイトの検索パフォーマンスを監視・改善するためのツールです。

### 主な機能
- **検索パフォーマンスの確認**: どのキーワードで検索されているか
- **インデックス状況の確認**: Googleに何ページ登録されているか
- **エラーの検出**: クロールエラー、インデックスエラーの通知
- **サイトマップの送信**: サイト構造をGoogleに通知
- **モバイルユーザビリティ**: スマホ対応状況の確認
- **Core Web Vitals**: ページ速度とユーザー体験の指標

---

## <a name="pre-registration"></a>2. 登録前の確認事項

### ✅ 必要なもの
- Googleアカウント
- Webサイトのドメイン所有権（サーバーアクセス権限）
- FTPまたはサーバー管理画面へのアクセス

### ✅ 事前準備
- [ ] サイトが本番環境で公開されている
- [ ] `sitemap.xml` がアップロードされている（`https://digup-data.co.jp/sitemap.xml`）
- [ ] `robots.txt` がアップロードされている（`https://digup-data.co.jp/robots.txt`）

---

## <a name="registration-steps"></a>3. 登録手順

### ステップ1: Google Search Consoleにアクセス

1. https://search.google.com/search-console にアクセス
2. Googleアカウントでログイン

### ステップ2: プロパティを追加

1. 「プロパティを追加」をクリック
2. プロパティタイプを選択：
   - **ドメイン**: `digup-data.co.jp`（推奨）
   - **URLプレフィックス**: `https://digup-data.co.jp`

### ステップ3: 所有権の確認

**方法1: HTMLファイルをアップロード（推奨）**

1. GSCが提供するHTMLファイルをダウンロード
   - 例: `google1234567890abcdef.html`
2. このファイルをサーバーのルートディレクトリにアップロード
   - アップロード先: `/Users/ts-shuichi.nagatomi/Documents/git/dud_hp_ver2/`
   - アクセス可能URL: `https://digup-data.co.jp/google1234567890abcdef.html`
3. GSCで「確認」ボタンをクリック

**方法2: HTMLタグを追加**

1. GSCが提供するメタタグをコピー
   ```html
   <meta name="google-site-verification" content="xxxxxxxxxxxx" />
   ```
2. `app_hp/includes/header.php` の `<head>` 内に追加
   - 既存のメタタグの後に追加
3. 変更をアップロード
4. GSCで「確認」ボタンをクリック

**方法3: Google Analytics を使用**

1. Google Analytics がすでに設置されている場合
2. GSCで「Google Analytics」を選択
3. 自動的に確認される

**方法4: DNSレコードを追加**

1. GSCが提供するTXTレコードをコピー
2. ドメイン管理画面でDNS設定を開く
3. TXTレコードを追加
4. GSCで「確認」ボタンをクリック

---

## <a name="sitemap-submission"></a>4. サイトマップの送信

### ステップ1: サイトマップの確認

ブラウザで以下のURLにアクセスして、サイトマップが正しく表示されるか確認：
```
https://digup-data.co.jp/sitemap.xml
```

### ステップ2: GSCでサイトマップを送信

1. Google Search Console にログイン
2. 左メニューから「サイトマップ」を選択
3. 「新しいサイトマップの追加」に以下を入力：
   ```
   sitemap.xml
   ```
4. 「送信」をクリック

### ステップ3: 送信結果の確認

- ステータスが「成功しました」になれば完了
- 「取得できませんでした」の場合は、URLを確認
- 数時間～数日でインデックスが開始される

---

## <a name="important-checks"></a>5. 確認すべき重要項目

### 登録後1週間以内

#### ① サマリーを確認
- 左メニュー「概要」
- クロールエラーがないか確認

#### ② カバレッジを確認
- 左メニュー「カバレッジ」
- 有効なページ数を確認
- エラーページがあれば修正

**期待される有効ページ数**: 9ページ
- home.php
- vision.php
- services.php
- company.php
- careers.php
- contact.php
- privacy.php
- compliance.php
- recruit-privacy.php

#### ③ モバイルユーザビリティを確認
- 左メニュー「モバイルユーザビリティ」
- エラーがないか確認
- レスポンシブデザインが正しく機能しているか

### 登録後2週間～1ヶ月

#### ④ 検索パフォーマンスを確認
- 左メニュー「検索パフォーマンス」
- クリック数、表示回数、CTR、掲載順位を確認

**重要キーワード**:
- AI開発 横浜
- データ分析 横浜
- DX推進支援
- 生成AI 教育
- Web システム開発 横浜

#### ⑤ Core Web Vitals を確認
- 左メニュー「ウェブに関する主な指標」
- LCP（読み込み速度）、FID（インタラクティブ性）、CLS（視覚的安定性）
- 「良好」を目指す

---

## <a name="troubleshooting"></a>6. トラブルシューティング

### 問題1: サイトマップが取得できない

**原因**:
- robots.txt でブロックされている
- サイトマップのURLが間違っている
- サーバーエラー

**解決方法**:
1. `robots.txt` を確認
   ```
   Sitemap: https://digup-data.co.jp/sitemap.xml
   ```
2. ブラウザで直接アクセスして確認
3. サーバーのエラーログを確認

### 問題2: ページがインデックスされない

**原因**:
- robots.txt で Disallow されている
- meta robots で noindex が設定されている
- 内部リンクがない（孤立ページ）

**解決方法**:
1. robots.txt を確認
   ```
   # 許可されているか確認
   Allow: /app_hp/public/
   ```
2. header.php の `<head>` を確認
   ```html
   <!-- noindex がないか確認 -->
   <meta name="robots" content="noindex"> ← これがあったら削除
   ```
3. 内部リンクを追加

### 問題3: モバイルユーザビリティエラー

**原因**:
- テキストが小さすぎる
- タップ要素が近すぎる
- コンテンツが画面幅を超えている

**解決方法**:
1. レスポンシブデザインを確認
2. `viewport` メタタグを確認
   ```html
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   ```
3. CSS のメディアクエリを確認

### 問題4: Core Web Vitals が不良

**LCP（読み込み速度）が遅い**:
- 画像サイズを最適化（WebP変換、圧縮）
- 画像の遅延読み込み（`loading="lazy"`）
- サーバーのレスポンス時間を改善

**CLS（レイアウトシフト）が大きい**:
- 画像に `width` と `height` を指定
- フォントの読み込みを最適化
- 広告やチャットボットの配置を調整

---

## 📊 登録完了後のチェックリスト

### 初期設定
- [ ] プロパティの所有権確認完了
- [ ] サイトマップ送信完了（sitemap.xml）
- [ ] robots.txt 確認完了
- [ ] ユーザー権限設定（必要に応じて他のユーザーを追加）

### 定期確認（週1回）
- [ ] カバレッジ（インデックス状況）
- [ ] クロールエラーの確認
- [ ] 検索パフォーマンス（クリック数、表示回数）

### 定期確認（月1回）
- [ ] Core Web Vitals
- [ ] モバイルユーザビリティ
- [ ] セキュリティ問題
- [ ] 手動対策（ペナルティ）の確認

---

## 🔗 参考リンク

- [Google Search Console 公式ヘルプ](https://support.google.com/webmasters/)
- [Search Console の概要](https://support.google.com/webmasters/answer/9128668)
- [サイトマップについて](https://support.google.com/webmasters/answer/156184)
- [ウェブに関する主な指標（Core Web Vitals）](https://support.google.com/webmasters/answer/9205520)

---

## 💡 Tips

### Bing Webmaster Tools も登録しよう
Googleだけでなく、Bingの検索エンジンにも登録することで、より多くの検索流入が期待できます。

**登録URL**: https://www.bing.com/webmasters

**手順**:
1. Microsoftアカウントでログイン
2. Google Search Console からインポート（簡単）
3. または、手動で登録

---

**最終更新**: 2026年2月5日
