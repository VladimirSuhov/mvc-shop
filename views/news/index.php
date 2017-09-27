<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/templates/css/style.css">
</head>
<body>

<?php foreach ($newsList as $newsItem) : ?>
<div class="news-item">
    <h2><?php echo $newsItem['title']; ?></h2>
    <p><strong><?php echo $newsItem['date']; ?></strong></p>
    <p><?php echo $newsItem['short_content']; ?></p>
    <p><a href="/news/<?php echo $newsItem['id']; ?>">Read more</a></p>
</div>
<?php endforeach; ?>

</body>
<script src="/templates/js/script.js"></script>
</html>