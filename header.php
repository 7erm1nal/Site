<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body color="000000">
    <?php
        session_start();
        unset($_SESSION['login']);
        $_SESSION['auth']=false;
    ?>
    <link rel="stylesheet" href="headstyle.css">
    <header>
        <h1>Добро пожаловать</h1>
        <h2><a href="auth.html">Регистрация</a><br>
            <a href="login.html">Вход</a>
        </h2>
    </header>
</body>
</html>