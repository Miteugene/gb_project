<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новости категории</title>
    <style>
* {
    margin: 0;
    padding: 0;
}
    </style>
</head>
<body class="body">

    <?php foreach($newsList as $news): ?>
    <div>
        <a href="<?=route('news.show', ['catId' => $news['catId'], 'id' => $news['id']])?>"><?=$news['title']?></a>
        <br>
        <img src="<?=$news['image']?>" style="width:200px;">
        <br>
        <p><strong>Aвтор:</strong><?=$news['author']?></p>
        <p><?=$news['text']?></p>
    </div>
    <br><hr>
    <?php endforeach; ?>

</body>
</html>
