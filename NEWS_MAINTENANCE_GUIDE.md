# NEWS & ANNOUNCEMENTSセクション メンテナンス切り替えガイド

**作成日**: 2026年2月5日

---

## 📝 概要

homeページのNEWS & ANNOUNCEMENTSセクションをメンテナンス中表示に切り替える／元に戻す手順を記載しています。

**対象ファイル**: `app_hp/public/home.php`

---

## 🔧 メンテナンス中に切り替える（3箇所）

### 1. JSONデータ読み込みをコメントアウト（5-6行目）

```php
// JSONデータを読み込み（メンテナンス中のためコメントアウト）
// $announcements_json = file_get_contents('../../data/announcements.json');
// $tech_news_json = file_get_contents('../../data/tech_news.json');
```

### 2. ニュースセクションをメンテナンス表示に変更（157-191行目）

```html
<!-- 4. ニュースセクション（白背景） - メンテナンス中 -->
<section class="news-section">
    <div class="section-circle section-circle-right"></div>

    <div class="container">
        <div class="section-header">
            <span class="section-label">NEWS & ANNOUNCEMENTS</span>
            <h2 class="section-title-large">最新情報</h2>
        </div>

        <!-- メンテナンス中の表示 -->
        <div style="text-align: center; padding: 60px 20px; background: linear-gradient(135deg, rgba(99, 102, 241, 0.05) 0%, rgba(139, 92, 246, 0.05) 100%); border-radius: 20px; margin: 40px 0;">
            <div style="display: inline-block; width: 80px; height: 80px; border-radius: 50%; background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%); display: flex; align-items: center; justify-content: center; margin-bottom: 30px;">
                <svg style="width: 40px; height: 40px; color: white;" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <h3 style="font-size: 1.75rem; font-weight: 700; color: #1f2937; margin-bottom: 15px;">メンテナンス中</h3>
            <p style="font-size: 1.1rem; color: #6b7280; line-height: 1.8; max-width: 600px; margin: 0 auto;">
                現在、ニュース・お知らせセクションはメンテナンス中です。<br>
                より良いコンテンツをお届けするため、準備を進めております。<br>
                しばらくお待ちください。
            </p>
        </div>
    </div>
</section>
```

### 3. JavaScriptデータをコメントアウト（260-264行目）

```html
<!-- JavaScriptにデータを渡す（メンテナンス中のためコメントアウト） -->
<!--
<script>
const announcements = <?php echo $announcements_json; ?>;
const latestNews = <?php echo $tech_news_json; ?>;
</script>
-->
```

---

## ✅ 元に戻す手順（3箇所の変更を逆に）

### 1. JSONデータ読み込みのコメントアウト解除（5-6行目）

**現在（メンテナンス中）:**
```php
// JSONデータを読み込み（メンテナンス中のためコメントアウト）
// $announcements_json = file_get_contents('../../data/announcements.json');
// $tech_news_json = file_get_contents('../../data/tech_news.json');
```

**元に戻す:**
```php
// JSONデータを読み込み
$announcements_json = file_get_contents('../../data/announcements.json');
$tech_news_json = file_get_contents('../../data/tech_news.json');
```

### 2. ニュースセクションを元のレイアウトに戻す（157-191行目）

**現在（メンテナンス中）:**
```html
<!-- メンテナンス中の表示 -->
<div style="text-align: center; padding: 60px 20px; ...">
    ... メンテナンスメッセージ ...
</div>
```

**元に戻す:**
```html
<div class="news-columns">
    <div class="news-column">
        <h3 class="news-column-title">お知らせ</h3>
        <div class="news-list" id="announcementsList">
            <!-- JavaScriptで動的に生成 -->
        </div>
    </div>

    <div class="news-column">
        <h3 class="news-column-title">
            最新ニュース
            <span class="news-badge">Today</span>
        </h3>
        <div class="news-list" id="latestNewsList">
            <!-- JavaScriptで動的に生成 -->
        </div>
    </div>
</div>

<div class="section-cta">
    <a href="#" class="btn-secondary-large">すべて見る</a>
</div>
```

### 3. JavaScriptデータのコメントアウト解除（260-264行目）

**現在（メンテナンス中）:**
```html
<!-- JavaScriptにデータを渡す（メンテナンス中のためコメントアウト） -->
<!--
<script>
const announcements = <?php echo $announcements_json; ?>;
const latestNews = <?php echo $tech_news_json; ?>;
</script>
-->
```

**元に戻す:**
```html
<!-- JavaScriptにデータを渡す -->
<script>
const announcements = <?php echo $announcements_json; ?>;
const latestNews = <?php echo $tech_news_json; ?>;
</script>
```

---

## 🚀 簡単な復旧方法（Git使用）

gitを使っている場合、以下のコマンドで一発で元に戻せます:

### 方法1: 特定ファイルのみ元に戻す
```bash
git checkout app_hp/public/home.php
```

### 方法2: すべての変更を元に戻す
```bash
git reset --hard HEAD
```

**注意**: `git reset --hard` は他の変更もすべて削除されるので注意してください。

---

## 📌 チェックリスト

### メンテナンス中に切り替え時
- [ ] JSONデータ読み込みをコメントアウト（5-6行目）
- [ ] ニュースセクションをメンテナンス表示に変更（157-191行目）
- [ ] JavaScriptデータをコメントアウト（260-264行目）
- [ ] ブラウザで表示確認

### 元に戻す時
- [ ] JSONデータ読み込みのコメント解除（5-6行目）
- [ ] ニュースセクションを2カラムレイアウトに戻す（157-191行目）
- [ ] JavaScriptデータのコメント解除（260-264行目）
- [ ] ブラウザで表示確認
- [ ] データが正しく表示されるか確認

---

**最終更新**: 2026年2月5日
