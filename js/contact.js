/**
 * お問い合わせフォーム処理
 */

// フォームデータを一時保存
let formData = {};

// お問い合わせ種別のマッピング
const subjectMap = {
    'recruitment': '求人応募について',
    'service': 'サービスについて',
    'other': 'その他'
};

// CSRFトークンの取得
async function getCSRFToken() {
    try {
        const response = await fetch('../api/token.php');
        const data = await response.json();
        return data.token;
    } catch (error) {
        console.error('CSRFトークンの取得に失敗しました:', error);
        return null;
    }
}

// 入力内容の改行をブラウザ表示用に変換
function nl2br(str) {
    return str.replace(/\n/g, '<br>');
}

// DOM読み込み完了後に実行
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOMContentLoaded - イベントリスナーを設定します');

    const confirmBtn = document.getElementById('confirmBtn');
    const backBtn = document.getElementById('backBtn');
    const submitBtn = document.getElementById('submitBtn');
    const contactForm = document.getElementById('contactForm');
    const confirmSection = document.getElementById('confirmSection');

    // 要素が存在するか確認
    if (!confirmBtn || !backBtn || !submitBtn || !contactForm || !confirmSection) {
        console.error('必要な要素が見つかりません');
        return;
    }

    // 確認画面へ遷移
    confirmBtn.addEventListener('click', function() {
        console.log('確認ボタンがクリックされました');
        try {
            // フォームバリデーション
            if (!contactForm.checkValidity()) {
                contactForm.reportValidity();
                return;
            }

            // フォームデータの取得
            formData = {
                name: document.getElementById('name').value.trim(),
                email: document.getElementById('email').value.trim(),
                title: document.getElementById('title').value.trim(),
                subject: document.getElementById('subject').value,
                message: document.getElementById('message').value.trim(),
                website: document.querySelector('input[name="website"]').value
            };

            console.log('フォームデータ:', formData);

            // 確認画面に表示
            document.getElementById('confirm-name').textContent = formData.name;
            document.getElementById('confirm-email').textContent = formData.email;
            document.getElementById('confirm-title').textContent = formData.title;
            document.getElementById('confirm-subject').textContent = subjectMap[formData.subject] || formData.subject;

            // メッセージが入力されている場合
            if (formData.message) {
                const confirmMessageEl = document.getElementById('confirm-message');
                confirmMessageEl.innerHTML = nl2br(formData.message);
                document.getElementById('confirm-message-row').style.display = 'flex';
            } else {
                document.getElementById('confirm-message-row').style.display = 'none';
            }

            // 画面切り替え
            contactForm.style.display = 'none';
            confirmSection.style.display = 'block';

            // ページトップにスクロール
            window.scrollTo({ top: 0, behavior: 'smooth' });
            console.log('確認画面に遷移しました');
        } catch (error) {
            console.error('確認画面への遷移中にエラーが発生しました:', error);
            alert('エラーが発生しました: ' + error.message);
        }
    });

    // 入力画面に戻る
    backBtn.addEventListener('click', function() {
        console.log('戻るボタンがクリックされました');
        // フォームの値を復元（formDataから）
        if (formData) {
            document.getElementById('name').value = formData.name || '';
            document.getElementById('email').value = formData.email || '';
            document.getElementById('title').value = formData.title || '';
            document.getElementById('subject').value = formData.subject || '';
            document.getElementById('message').value = formData.message || '';
        }

        // 画面切り替え
        confirmSection.style.display = 'none';
        contactForm.style.display = 'block';
        window.scrollTo({ top: 0, behavior: 'smooth' });
        console.log('入力画面に戻りました');
    });

    // 送信処理
    submitBtn.addEventListener('click', async function() {
        console.log('送信ボタンがクリックされました');
        const loadingMessage = document.getElementById('loadingMessage');

        // ボタンを無効化
        submitBtn.disabled = true;
        backBtn.disabled = true;
        loadingMessage.style.display = 'block';

        try {
            // CSRFトークンの取得
            const csrfToken = await getCSRFToken();
            if (!csrfToken) {
                throw new Error('セキュリティトークンの取得に失敗しました');
            }

            // 送信データの準備
            const sendData = new FormData();
            sendData.append('csrf_token', csrfToken);
            sendData.append('name', formData.name);
            sendData.append('email', formData.email);
            sendData.append('title', formData.title);
            sendData.append('subject', formData.subject);
            sendData.append('message', formData.message);
            sendData.append('website', formData.website);

            // メール送信
            const response = await fetch('../api/mail.php', {
                method: 'POST',
                body: sendData
            });

            const result = await response.json();

            if (result.success) {
                // 送信成功 - 完了ページへリダイレクト
                console.log('送信成功');
                window.location.href = 'thanks.php';
            } else {
                // エラー表示
                alert('エラー: ' + result.message);
                submitBtn.disabled = false;
                backBtn.disabled = false;
                loadingMessage.style.display = 'none';
            }
        } catch (error) {
            console.error('送信エラー:', error);
            alert('送信中にエラーが発生しました。しばらく時間をおいてから再度お試しください。');
            submitBtn.disabled = false;
            backBtn.disabled = false;
            loadingMessage.style.display = 'none';
        }
    });

    console.log('イベントリスナーの設定が完了しました');
});
