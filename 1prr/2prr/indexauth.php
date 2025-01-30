<?php
session_start(); // Начинаем сессию

// Проверка на авторизацию
if (!isset($_SESSION['user'])) {
    header('Location: login.php'); // Если не авторизован, редирект на страницу авторизации
    exit();
}

// Флеш-сообщение
$message = '';
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']); // Удаляем сообщение после отображения
}
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Портфолио ССКР</title>
        <link rel="stylesheet" href="../styleasr.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <a href="http://localhost/sockayasotnikova/mdk03/1prr/index.php" title="Вернуться на главную страницу ССКР" >ССКР</a>
            <nav class="sections">
                <a href="/sockayasotnikova/mdk03/1prr/captcha.html" id="obrsvyaz">обратная связь</a>
                <a href="http://localhost/sockayasotnikova/mdk03/1prr/index.php#about">обо мне</a>
                <a href="http://localhost/sockayasotnikova/mdk03/1prr/index.php#skills">навыки</a>
                <a href="http://localhost/sockayasotnikova/mdk03/1prr/index.php#brands">бренды</a>
                <a href="http://localhost/sockayasotnikova/mdk03/1prr/index.php#contact">контакты</a>
            </nav>
            <nav class="socseti">
                <a href="http://localhost/sockayasotnikova/mdk03/1prr/2prr/authorize.php" alt="авторизация"><img class="pad" src="https://img.icons8.com/?size=100&id=61102&format=png&color=000000" title="Авторизация" width='35px'/></a>
                <a href="#" alt="вк"><img class="pad" src="https://img.icons8.com/?size=100&id=60454&format=png&color=000000" title="Наш вк" width='35px'/></a>
                <a href="#" alt="ватсап"><img class="pad" src="https://img.icons8.com/?size=100&id=16733&format=png&color=000000" title="Наш ватсапп" width='35px'/></a>
                <a href="#" alt="телеграм"><img src="https://img.icons8.com/?size=100&id=QP6ADhc43z2T&format=png&color=000000" title="Наш телеграм" width='50px' class="lefpad"/></a>
            </nav>
        </header>
        <main>
    <h1>Добро пожаловать, <?php echo $_SESSION['user']; ?>!</h1>
    <?php if ($message): ?>
        <p style="color: green;"><?php echo $message; ?></p>
    <?php endif; ?>
    <a href="http://localhost/sockayasotnikova/mdk03/1prr/index.php">Выйти</a>
</body>
</html>
