    <!-- フッター -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-links">
                    <a href="privacy.php">プライバシーポリシー</a>
                    <a href="compliance.php">コンプライアンスポリシー</a>
                    <a href="recruit-privacy.php">採用における個人情報の取扱い</a>
                </div>
                <p>&copy; <span id="current-year"></span> DIG-UP DATA Inc. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="../../js/script.js"></script>

    <!-- Home Page Script（home.phpでのみ読み込む） -->
    <?php if (basename($_SERVER['PHP_SELF']) == 'home.php'): ?>
    <script src="../../js/home.js"></script>
    <?php endif; ?>

    <!-- Dify Chatbot -->
    <script>
        window.difyChatbotConfig = {
            token: 'OkBZ34JfRUjvuznX',
            isDev: false,
            baseUrl: 'https://udify.app',
            containerProps: {
                style: {
                    right: '20px',
                    bottom: '20px'
                }
            },
            draggable: false
        }
        console.log('Dify config loaded:', window.difyChatbotConfig);
    </script>
    <script
        src="https://udify.app/embed.min.js"
        id="OkBZ34JfRUjvuznX"
        onload="console.log('Dify script loaded successfully')"
        onerror="console.error('Failed to load Dify script')">
    </script>
    <style>
        #dify-chatbot-bubble-button {
            background-color: #1C64F2 !important;
        }
        #dify-chatbot-bubble-window {
            width: 24rem !important;
            height: 40rem !important;
        }
    </style>
</body>
</html>
