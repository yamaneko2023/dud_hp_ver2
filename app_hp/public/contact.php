<?php
$page_key = 'contact'; // SEO用ページキー
$page_title = 'お問い合わせ - 株式会社DIG-UP DATA';
?>
<?php include '../includes/header.php'; ?>

<!-- メインコンテンツ -->
<main>

    <!-- ページヘッダー -->
    <section class="page-header">
        <video class="page-header-video" autoplay muted playsinline>
            <source src="../../video/header_bkground.mp4" type="video/mp4">
        </video>
        <div class="container">
            <h1 class="page-title">Contact</h1>
            <p class="page-subtitle">お気軽にご相談ください</p>
        </div>
    </section>

    <!-- お問い合わせセクション -->
    <section class="contact">
        <div class="container">
            <div class="contact-content">
                <!-- 入力フォーム -->
                <form id="contactForm" class="contact-form" style="display: block;">
                    <div class="form-group">
                        <label for="name">お名前<span class="required">*</span></label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">メールアドレス<span class="required">*</span></label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="title">題名<span class="required">*</span></label>
                        <input type="text" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">お問い合わせ内容<span class="required">*</span></label>
                        <select id="subject" name="subject" required>
                            <option value="">選択してください</option>
                            <option value="recruitment">求人応募について</option>
                            <option value="service">サービスについて</option>
                            <option value="other">その他</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">メッセージ本文</label>
                        <textarea id="message" name="message" rows="8"></textarea>
                    </div>

                    <!-- Honeypot（スパム対策用の隠しフィールド） -->
                    <input type="text" name="website" style="display: none;" tabindex="-1" autocomplete="off">

                    <div class="form-buttons">
                        <button type="button" id="confirmBtn" class="btn btn-primary">入力内容を確認</button>
                    </div>
                </form>

                <!-- 確認画面 -->
                <div id="confirmSection" class="contact-form" style="display: none;">
                    <div class="confirm-header">
                        <h2 class="confirm-title">✓ 入力内容の確認</h2>
                        <p class="confirm-description">
                            以下の内容でお間違いないですか？
                        </p>
                    </div>

                    <div class="confirm-table">
                        <div class="confirm-row">
                            <div class="confirm-label">お名前</div>
                            <div class="confirm-value" id="confirm-name"></div>
                        </div>
                        <div class="confirm-row">
                            <div class="confirm-label">メールアドレス</div>
                            <div class="confirm-value" id="confirm-email"></div>
                        </div>
                        <div class="confirm-row">
                            <div class="confirm-label">題名</div>
                            <div class="confirm-value" id="confirm-title"></div>
                        </div>
                        <div class="confirm-row">
                            <div class="confirm-label">お問い合わせ内容</div>
                            <div class="confirm-value" id="confirm-subject"></div>
                        </div>
                        <div class="confirm-row" id="confirm-message-row" style="display: none;">
                            <div class="confirm-label">メッセージ本文</div>
                            <div class="confirm-value" id="confirm-message"></div>
                        </div>
                    </div>

                    <div class="form-buttons">
                        <button type="button" id="backBtn" class="btn btn-secondary">戻る</button>
                        <button type="button" id="submitBtn" class="btn btn-primary">送信する</button>
                    </div>

                    <div id="loadingMessage" style="display: none; text-align: center; margin-top: 2rem;">
                        <p>送信中です。しばらくお待ちください...</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="../../js/contact.js"></script>

</main>
<!-- /メインコンテンツ -->

<?php include '../includes/footer.php'; ?>
