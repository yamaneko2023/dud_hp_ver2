<?php
/**
 * ページコントローラー
 * 非公開ディレクトリ（app/）に配置
 */

class PageController {

    /** ビューに渡すデータ */
    private $viewData = [];

    public function render($route) {
        $routeInfo = getRoute($route);

        if (!$routeInfo) {
            $this->render404();
            return;
        }

        // ページ固有ロジック（ビューデータを $this->viewData に蓄積）
        $this->executePageLogic($routeInfo['page_key']);

        // ビューで使えるローカル変数に展開
        $page_key = $routeInfo['page_key'];
        $page_title = $routeInfo['title'];
        extract($this->viewData); // $announcements_json 等がローカル変数になる

        // レンダリング（APP_DIR定数を使用）
        require APP_DIR . '/views/layouts/header.php';
        require APP_DIR . '/views/' . $routeInfo['view'];
        require APP_DIR . '/views/layouts/footer.php';
    }

    private function executePageLogic($pageKey) {
        switch ($pageKey) {
            case 'home':
                // お知らせJSON読み込み（DATA_DIR使用）
                $json_path = DATA_DIR . '/announcements.json';
                $this->viewData['announcements_json'] = file_exists($json_path)
                    ? file_get_contents($json_path)
                    : '[]';
                // 最新ニュースJSON読み込み
                $news_path = DATA_DIR . '/tech_news.json';
                $this->viewData['tech_news_json'] = file_exists($news_path)
                    ? file_get_contents($news_path)
                    : '[]';
                break;

            case 'announcements':
                $json_path = DATA_DIR . '/announcements.json';
                $raw = file_exists($json_path) ? file_get_contents($json_path) : '[]';
                $all = json_decode($raw, true) ?: [];

                // published のみ、日付降順
                $published = array_filter($all, fn($a) => ($a['published'] ?? false));
                usort($published, fn($a, $b) => strcmp($b['date'] ?? '', $a['date'] ?? ''));

                // ピン留め記事を取得（先頭1件）
                $pinned = null;
                foreach ($published as $item) {
                    if ($item['pinned'] ?? false) {
                        $pinned = $item;
                        break;
                    }
                }

                // リストには全てのお知らせを含める（ピン留め記事も含む）
                $this->viewData['pinned_announcement'] = $pinned;
                $this->viewData['announcements_list'] = $published;
                break;
        }
    }

    private function render404() {
        header("HTTP/1.0 404 Not Found");
        $page_key = '404';
        $page_title = 'ページが見つかりません - 株式会社DIG-UP DATA';

        // 404テンプレートを使用
        require APP_DIR . '/views/layouts/header.php';
        require APP_DIR . '/views/pages/404.php';
        require APP_DIR . '/views/layouts/footer.php';
    }
}
