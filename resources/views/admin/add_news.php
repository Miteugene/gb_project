<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить новость</title>
    <style>
* {
    margin: 0;
    padding: 0;
}
.news-add {
    width: 300px;
}
.news-add__form {
    padding: 34px 36px 37px 36px;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
}
.news-add__header {

}
.news-add__input-text {
    width: 100%;
    height: 27px;
    margin-top: 20px;
}
.news-add__input-textarea {
    width: 100%;
    height: 100px;
    margin-top: 20px;
}
.news-add__button-submit {
    width: 100%;
    height: 50px;
    margin-top: 20px;
    box-sizing: border-box;
    cursor: pointer;
}
    </style>
</head>
<body class="body">

    <div class="news-add">
        <form name="news-add" class="news-add__form">
            <h2 class="news-add__header">Добавить новость</h2>
            <input type="text" class="news-add__input-text" placeholder="Заголовок" value="">
            <textarea  class="news-add__input-textarea" placeholder="Краткое описание новости"></textarea>
            <textarea  class="news-add__input-textarea" placeholder="Текст новости"></textarea>
            <button type="submit" class="news-add__button-submit">Добавить</button>
        </form>
    </div>

</body>
</html>
