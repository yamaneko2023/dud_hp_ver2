<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Test</title>
</head>
<body>
    <h1>Data Test Page</h1>
    <div id="output"></div>

    <script>
    <?php
    // JSONデータを読み込み
    $announcements_json = file_get_contents('../../data/announcements.json');
    $tech_news_json = file_get_contents('../../data/tech_news.json');
    $featured_json = file_get_contents('../../data/featured.json');

    // お知らせとテックニュースを結合してTickerデータを作成
    $announcements = json_decode($announcements_json, true);
    $tech_news = json_decode($tech_news_json, true);

    // published: trueのお知らせのみを抽出
    $published_announcements = array_filter($announcements, function($item) {
        return isset($item['published']) && $item['published'] === true;
    });

    // お知らせとテックニュースを結合
    $ticker_data = array_merge($published_announcements, $tech_news);

    // 日付順にソート（新しい順）
    usort($ticker_data, function($a, $b) {
        return strtotime($b['date']) - strtotime($a['date']);
    });

    // 最新10件のみ
    $ticker_data = array_slice($ticker_data, 0, 10);
    $ticker_json = json_encode($ticker_data);
    ?>

    // PHPから受け取ったJSONをJavaScript変数に格納
    const tickerData = <?php echo $ticker_json; ?>;
    const internalNews = <?php echo $announcements_json; ?>;
    const externalNews = <?php echo $tech_news_json; ?>;
    const featuredItem = <?php echo $featured_json; ?>;

    console.log('=== DATA TEST ===');
    console.log('tickerData:', tickerData);
    console.log('internalNews:', internalNews);
    console.log('externalNews:', externalNews);
    console.log('featuredItem:', featuredItem);

    // ページに表示
    document.getElementById('output').innerHTML = `
        <h2>Ticker Data (${tickerData.length} items)</h2>
        <pre>${JSON.stringify(tickerData, null, 2)}</pre>

        <h2>Internal News (${internalNews.length} items)</h2>
        <pre>${JSON.stringify(internalNews, null, 2)}</pre>

        <h2>External News (${externalNews.length} items)</h2>
        <pre>${JSON.stringify(externalNews, null, 2)}</pre>

        <h2>Featured Item</h2>
        <pre>${JSON.stringify(featuredItem, null, 2)}</pre>
    `;
    </script>
</body>
</html>
