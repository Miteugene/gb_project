<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Категории</title>
    <style>
* {
    margin: 0;
    padding: 0;
}
    </style>
</head>
<body class="body">

    <?php foreach($categoriesList as $category): ?>
    <div>
        <a href="<?=route('news.news', ['catId' => $category['catId']])?>"><?=$category['title']?></a>
        <hr>
    </div>
    <?php endforeach; ?>

</body>
</html>
