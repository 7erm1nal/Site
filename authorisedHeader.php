<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <link rel="stylesheet" href="headstyle.css">
    <header>
        <h1>Добро пожаловать, <?php session_start(); echo $_SESSION['login']; ?></h1>
        <h2><a href="header.php">Выход</a></h2>
    </header>
</body>
</html>