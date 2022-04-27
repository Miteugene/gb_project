<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <style>
* {
    margin: 0;
    padding: 0;
}
.auth {
    width: 300px;
}
.auth__form {
    padding: 34px 36px 37px 36px;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
}
.auth__header {

}
.auth__input-text {
    width: 100%;
    height: 27px;
    margin-top: 30px;
}
.auth__checkbox {
    margin-top: 30px;
}
.auth__button-submit {
    width: 100%;
    height: 50px;
    margin-top: 50px;
    box-sizing: border-box;
    cursor: pointer;
}
    </style>
</head>
<body class="body">

    <div class="auth">
        <form name="auth" class="auth__form">
            <h2 class="auth__header">Авторизация</h2>
            <input type="text" class="auth__input-text" placeholder="Логин"   value="">
            <input type="password" class="auth__input-text" placeholder="Пароль" value="">
            <label><input type="checkbox" class="auth__checkbox">Запомнить меня</label>
            <button type="submit" class="auth__button-submit">Войти</button>
        </form>
    </div>

</body>
</html>
