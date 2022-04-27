<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$news['title']?></title>
    <style>
* {
    margin: 0;
    padding: 0;
}
    </style>
</head>
<body class="body">

    <div>
        <?=$news['title']?>
        <br>
        <img src="<?=$news['image']?>" style="width:200px;">
        <br>
        <p><strong>Aвтор:</strong><?=$news['author']?></p>
        <p><?=$news['text']?></p>
    </div>

</body>
</html>
