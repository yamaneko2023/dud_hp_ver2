/**
 * チャットボット ウィジェット
 * IIFE で自己完結。DOM生成 + SSEストリーミング + sessionStorage会話保持
 */
(function () {
    'use strict';

    const API_URL = '/api/chatbot.php';
    const LOGO_URL = '/img/company_logo.svg';
    const BOT_AVATAR = '/img/company_logo.svg';
    const USER_AVATAR = '';
    const STORAGE_KEY = 'chatbot_state';
    const WELCOME_MESSAGE = 'こんにちは！DIG-UP DATAのAIアシスタントです。サービス内容や会社情報について、お気軽にご質問ください。';

    let conversationId = '';
    let isStreaming = false;

    // ===== デフォルトアバターSVG =====

    function botIconSvg() {
        return '<svg viewBox="0 0 24 24" fill="currentColor" width="16" height="16">' +
            '<path d="M12 2a2 2 0 0 1 2 2c0 .74-.4 1.39-1 1.73V7h1a7 7 0 0 1 7 7h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1.07A7 7 0 0 1 14 23h-4a7 7 0 0 1-6.93-4H2a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h1a7 7 0 0 1 7-7h1V5.73A2 2 0 0 1 12 2zm-2 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm4 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>' +
            '</svg>';
    }

    function userIconSvg() {
        return '<svg viewBox="0 0 24 24" fill="currentColor" width="16" height="16">' +
            '<path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>' +
            '</svg>';
    }

    // ===== ユーティリティ =====

    function escapeHtml(str) {
        const div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }

    function saveState() {
        const msgs = [];
        document.querySelectorAll('.chatbot-msg').forEach(function (el) {
            msgs.push({
                role: el.classList.contains('chatbot-msg-user') ? 'user' : 'bot',
                text: el.textContent
            });
        });
        sessionStorage.setItem(STORAGE_KEY, JSON.stringify({
            conversationId: conversationId,
            messages: msgs
        }));
    }

    function loadState() {
        try {
            const raw = sessionStorage.getItem(STORAGE_KEY);
            if (!raw) return null;
            return JSON.parse(raw);
        } catch (e) {
            return null;
        }
    }

    // ===== DOM生成 =====

    function buildWidget() {
        // バブルボタン
        var bubble = document.createElement('button');
        bubble.className = 'chatbot-bubble';
        bubble.setAttribute('aria-label', 'チャットを開く');
        bubble.innerHTML =
            '<img class="chatbot-bubble-logo" src="' + LOGO_URL + '" alt="">' +
            '<span class="chatbot-bubble-label"><span class="tcy">AI</span>アシスタント</span>' +
            '<svg class="chatbot-bubble-close" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">' +
            '<line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>' +
            '</svg>';

        // ウィンドウ
        var win = document.createElement('div');
        win.className = 'chatbot-window';
        win.setAttribute('role', 'dialog');
        win.setAttribute('aria-label', 'チャットウィンドウ');

        // ヘッダー
        win.innerHTML =
            '<div class="chatbot-header">' +
            '  <div class="chatbot-header-avatar"><img src="' + LOGO_URL + '" alt=""></div>' +
            '  <div class="chatbot-header-info">' +
            '    <div class="chatbot-header-title">DIG-UP DATA</div>' +
            '    <div class="chatbot-header-subtitle">AIアシスタント</div>' +
            '  </div>' +
            '  <button class="chatbot-header-close" aria-label="チャットを閉じる">' +
            '    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">' +
            '      <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>' +
            '    </svg>' +
            '  </button>' +
            '</div>' +
            '<div class="chatbot-messages"></div>' +
            '<div class="chatbot-input-area">' +
            '  <textarea class="chatbot-textarea" rows="1" placeholder="メッセージを入力..."></textarea>' +
            '  <button class="chatbot-send-btn" aria-label="送信">' +
            '    <svg viewBox="0 0 24 24"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>' +
            '  </button>' +
            '</div>';

        document.body.appendChild(bubble);
        document.body.appendChild(win);

        return { bubble: bubble, win: win };
    }

    // ===== メッセージ操作 =====

    function getMessagesContainer() {
        return document.querySelector('.chatbot-messages');
    }

    function appendMessage(role, text) {
        var container = getMessagesContainer();

        // メッセージ行（アバター + バブル）
        var row = document.createElement('div');
        row.className = 'chatbot-msg-row chatbot-msg-row-' + role;

        // アバター
        var avatar = document.createElement('div');
        avatar.className = 'chatbot-msg-avatar chatbot-msg-avatar-' + role;
        if (role === 'bot' && BOT_AVATAR) {
            avatar.innerHTML = '<img src="' + BOT_AVATAR + '" alt="" class="chatbot-avatar-img">';
        } else if (role === 'bot') {
            avatar.innerHTML = botIconSvg();
        } else if (role === 'user' && USER_AVATAR) {
            avatar.innerHTML = '<img src="' + USER_AVATAR + '" alt="" class="chatbot-avatar-img">';
        } else {
            avatar.innerHTML = userIconSvg();
        }

        // メッセージバブル
        var msg = document.createElement('div');
        msg.className = 'chatbot-msg chatbot-msg-' + role;
        msg.textContent = text;

        row.appendChild(avatar);
        row.appendChild(msg);
        container.appendChild(row);
        container.scrollTop = container.scrollHeight;
        return msg;
    }

    function appendError(text) {
        var container = getMessagesContainer();
        var msg = document.createElement('div');
        msg.className = 'chatbot-msg-error';
        msg.textContent = text;
        container.appendChild(msg);
        container.scrollTop = container.scrollHeight;
    }

    function showTyping() {
        var container = getMessagesContainer();

        var row = document.createElement('div');
        row.className = 'chatbot-msg-row chatbot-msg-row-bot';
        row.id = 'chatbot-typing-row';

        var avatar = document.createElement('div');
        avatar.className = 'chatbot-msg-avatar chatbot-msg-avatar-bot';
        if (BOT_AVATAR) {
            avatar.innerHTML = '<img src="' + BOT_AVATAR + '" alt="" class="chatbot-avatar-img">';
        } else {
            avatar.innerHTML = botIconSvg();
        }

        var typing = document.createElement('div');
        typing.className = 'chatbot-typing';
        typing.id = 'chatbot-typing';
        typing.innerHTML =
            '<span class="chatbot-typing-dot"></span>' +
            '<span class="chatbot-typing-dot"></span>' +
            '<span class="chatbot-typing-dot"></span>';

        row.appendChild(avatar);
        row.appendChild(typing);
        container.appendChild(row);
        container.scrollTop = container.scrollHeight;
    }

    function removeTyping() {
        var el = document.getElementById('chatbot-typing-row');
        if (el) el.remove();
    }

    // ===== SSEストリーミング送信 =====

    async function sendMessage(text) {
        if (isStreaming || !text.trim()) return;
        isStreaming = true;

        var textarea = document.querySelector('.chatbot-textarea');
        var sendBtn = document.querySelector('.chatbot-send-btn');
        textarea.value = '';
        textarea.style.height = 'auto';
        sendBtn.disabled = true;

        appendMessage('user', text);
        showTyping();
        saveState();

        try {
            var response = await fetch(API_URL, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    message: text,
                    conversation_id: conversationId
                })
            });

            if (!response.ok) {
                var errData;
                try {
                    errData = await response.json();
                } catch (e) {
                    errData = null;
                }
                throw new Error(errData && errData.message ? errData.message : 'エラーが発生しました');
            }

            removeTyping();

            var botMsg = appendMessage('bot', '');
            var reader = response.body.getReader();
            var decoder = new TextDecoder();
            var buffer = '';
            var fullText = '';

            while (true) {
                var result = await reader.read();
                if (result.done) break;

                buffer += decoder.decode(result.value, { stream: true });
                var lines = buffer.split('\n');
                buffer = lines.pop();

                for (var i = 0; i < lines.length; i++) {
                    var line = lines[i].trim();
                    if (!line.startsWith('data: ')) continue;

                    var dataStr = line.slice(6);
                    if (dataStr === '') continue;

                    try {
                        var data = JSON.parse(dataStr);
                    } catch (e) {
                        continue;
                    }

                    if (data.event === 'message' || data.event === 'agent_message') {
                        fullText += data.answer || '';
                        botMsg.textContent = fullText;
                        getMessagesContainer().scrollTop = getMessagesContainer().scrollHeight;
                    } else if (data.event === 'message_end') {
                        if (data.conversation_id) {
                            conversationId = data.conversation_id;
                        }
                    } else if (data.event === 'error') {
                        appendError(data.message || 'エラーが発生しました');
                    }
                }
            }

            if (fullText === '') {
                botMsg.remove();
                appendError('応答を取得できませんでした');
            }

        } catch (err) {
            removeTyping();
            appendError(err.message || '通信エラーが発生しました');
        } finally {
            isStreaming = false;
            sendBtn.disabled = false;
            textarea.focus();
            saveState();
        }
    }

    // ===== テキストエリア自動拡張 =====

    function autoResize(textarea) {
        textarea.style.height = 'auto';
        textarea.style.height = Math.min(textarea.scrollHeight, 120) + 'px';
    }

    // ===== 初期化 =====

    function init() {
        var ui = buildWidget();
        var bubble = ui.bubble;
        var win = ui.win;
        var textarea = win.querySelector('.chatbot-textarea');
        var sendBtn = win.querySelector('.chatbot-send-btn');
        var isOpen = false;

        // 開閉トグル
        bubble.addEventListener('click', function () {
            if (isOpen) {
                win.classList.remove('is-open');
                setTimeout(function () { win.classList.remove('is-visible'); }, 300);
                bubble.classList.remove('is-open');
                bubble.setAttribute('aria-label', 'チャットを開く');
            } else {
                win.classList.add('is-visible');
                requestAnimationFrame(function () {
                    requestAnimationFrame(function () {
                        win.classList.add('is-open');
                    });
                });
                bubble.classList.add('is-open');
                bubble.setAttribute('aria-label', 'チャットを閉じる');
                textarea.focus();
            }
            isOpen = !isOpen;
        });

        // ヘッダー閉じるボタン
        var headerClose = win.querySelector('.chatbot-header-close');
        headerClose.addEventListener('click', function () {
            if (isOpen) {
                win.classList.remove('is-open');
                setTimeout(function () { win.classList.remove('is-visible'); }, 300);
                bubble.classList.remove('is-open');
                bubble.setAttribute('aria-label', 'チャットを開く');
                isOpen = false;
            }
        });

        // 送信
        sendBtn.addEventListener('click', function () {
            sendMessage(textarea.value);
        });

        // Enter送信 / Shift+Enter改行
        textarea.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                sendMessage(textarea.value);
            }
        });

        // テキストエリア自動拡張
        textarea.addEventListener('input', function () {
            autoResize(textarea);
        });

        // モバイルキーボード対応
        if (window.visualViewport) {
            window.visualViewport.addEventListener('resize', function () {
                if (isOpen) {
                    win.style.height = window.visualViewport.height + 'px';
                }
            });
            window.visualViewport.addEventListener('scroll', function () {
                if (isOpen) {
                    win.style.bottom = '0px';
                }
            });
        }

        // セッション復元
        var state = loadState();
        if (state) {
            conversationId = state.conversationId || '';
            if (state.messages && state.messages.length > 0) {
                state.messages.forEach(function (m) {
                    appendMessage(m.role, m.text);
                });
                return;
            }
        }

        // ウェルカムメッセージ
        appendMessage('bot', WELCOME_MESSAGE);
        saveState();
    }

    // DOM Ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
