    <!-- フッター -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-links">
                    <a href="/privacy">プライバシーポリシー</a>
                    <a href="/compliance">コンプライアンスポリシー</a>
                    <a href="/recruit-privacy">採用における個人情報の取扱い</a>
                </div>
                <p>&copy; <span id="current-year"></span> DIG-UP DATA Inc. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- JSON-LD 構造化データ -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@graph": [
            {
                "@type": "Organization",
                "@id": "https://digup-data.co.jp/#organization",
                "name": "株式会社DIG-UP DATA",
                "alternateName": "DIG-UP DATA Inc.",
                "url": "https://digup-data.co.jp",
                "logo": "https://digup-data.co.jp/img/company_logo.svg",
                "image": "https://digup-data.co.jp/img/home_company.png",
                "description": "株式会社DIG-UP DATAは横浜を拠点に、AI開発、データ分析、DX/AX推進支援を提供するテクノロジー企業です。",
                "email": "inquiry@mail.digup-data.com",
                "telephone": "+81-45-xxx-xxxx",
                "address": { "@id": "https://digup-data.co.jp/#address" },
                "foundingDate": "2023-01-04",
                "founder": {
                    "@type": "Person",
                    "name": "永富 修一",
                    "jobTitle": "代表取締役"
                },
                "sameAs": [
                    "https://github.com/yamaneko2023/dud_hp_ver2"
                ],
                "contactPoint": {
                    "@type": "ContactPoint",
                    "contactType": "customer service",
                    "email": "inquiry@mail.digup-data.com",
                    "availableLanguage": ["Japanese"]
                }
            },
            {
                "@type": "LocalBusiness",
                "@id": "https://digup-data.co.jp/#localbusiness",
                "name": "株式会社DIG-UP DATA",
                "image": "https://digup-data.co.jp/img/home_company.png",
                "url": "https://digup-data.co.jp",
                "telephone": "+81-45-xxx-xxxx",
                "priceRange": "要相談",
                "address": { "@id": "https://digup-data.co.jp/#address" },
                "geo": {
                    "@type": "GeoCoordinates",
                    "latitude": 35.4659,
                    "longitude": 139.6221
                },
                "openingHoursSpecification": {
                    "@type": "OpeningHoursSpecification",
                    "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
                    "opens": "09:00",
                    "closes": "18:00"
                }
            },
            {
                "@type": "PostalAddress",
                "@id": "https://digup-data.co.jp/#address",
                "streetAddress": "北幸一丁目11番1号 水信ビル7階",
                "addressLocality": "横浜市西区",
                "addressRegion": "神奈川県",
                "postalCode": "220-0004",
                "addressCountry": "JP"
            }
        ]
    }
    </script>

    <?php if (ANALYTICS_ENABLED && COOKIE_CONSENT_ENABLED): ?>
    <!-- Cookie同意バナー -->
    <div id="cookie-consent-banner" class="cookie-consent-banner" style="display:none;">
        <div class="cookie-consent-inner">
            <p class="cookie-consent-text">
                当サイトでは、サービス向上やアクセス解析のためにCookieを使用しています。
                詳しくは<a href="/privacy">プライバシーポリシー</a>をご確認ください。
            </p>
            <div class="cookie-consent-buttons">
                <button id="cookie-consent-accept" class="cookie-consent-btn cookie-consent-btn-accept">同意する</button>
                <button id="cookie-consent-reject" class="cookie-consent-btn cookie-consent-btn-reject">拒否する</button>
            </div>
        </div>
    </div>
    <script>
    (function() {
        var COOKIE_NAME = '<?php echo COOKIE_CONSENT_COOKIE_NAME; ?>';
        var EXPIRY_DAYS = <?php echo COOKIE_CONSENT_EXPIRY_DAYS; ?>;

        function getCookie(name) {
            var match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
            return match ? match[2] : null;
        }

        function setCookie(name, value, days) {
            var expires = new Date(Date.now() + days * 864e5).toUTCString();
            document.cookie = name + '=' + value + '; expires=' + expires + '; path=/; SameSite=Lax';
        }

        var consent = getCookie(COOKIE_NAME);

        if (consent === 'accepted') {
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({'event': 'cookie_consent_update', 'cookie_consent': 'accepted'});
        } else if (!consent) {
            document.getElementById('cookie-consent-banner').style.display = 'block';
        }

        document.getElementById('cookie-consent-accept').addEventListener('click', function() {
            setCookie(COOKIE_NAME, 'accepted', EXPIRY_DAYS);
            document.getElementById('cookie-consent-banner').style.display = 'none';
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({'event': 'cookie_consent_update', 'cookie_consent': 'accepted'});
        });

        document.getElementById('cookie-consent-reject').addEventListener('click', function() {
            setCookie(COOKIE_NAME, 'rejected', EXPIRY_DAYS);
            document.getElementById('cookie-consent-banner').style.display = 'none';
        });
    })();
    </script>
    <?php endif; ?>

    <script src="/js/utils.js"></script>
    <script src="/js/script.js"></script>

    <!-- Home Page Script（home.phpでのみ読み込む） -->
    <?php if ($page_key === 'home'): ?>
    <script src="/js/home.js"></script>
    <?php endif; ?>

    <!-- Chatbot Widget -->
    <link rel="stylesheet" href="/css/chatbot.css">
    <script src="/js/chatbot.js" defer></script>
</body>
</html>
