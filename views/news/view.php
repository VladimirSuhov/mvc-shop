<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/templates/css/style.css">
</head>
<body>

    <div class="news-item">
        <h2><?php echo $newsItem['title']; ?></h2>
        <p><strong><?php echo $newsItem['date']; ?></strong></p>
        <p><?php echo $newsItem['short_content']; ?></p>
    </div>

</body>
<script src="/templates/js/script.js"></script>
</html>