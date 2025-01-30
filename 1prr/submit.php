
<html>
    <head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Результат проверки</title>
    <link rel="stylesheet" href="stylea.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ruslan+Display&display=swap" rel="stylesheet">
</head>
    <body style="height: 100%;">
        <h1>
            <?php
            session_start(); if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Проверяем, существует ли капча в сессии
                if (isset($_SESSION['captcha'])) {
                    $captchaInput = $_POST['captcha_input'];

                    // Сравниваем введенную капчу с сохраненной в сессии
                    if ($captchaInput === $_SESSION['captcha']) {
                        echo "<h1>Капча успешно пройдена!</h1><br>
                        <button class='pulse-button'>
                        <a class='btn' href='obrsvyaz.html' >Супер!</a>
                        <span class='pulse-button__rings'></span>
                        <span class='pulse-button__rings'></span>
                        <span class='pulse-button__rings'></span>
                        </button>";
                        // Здесь можно продолжить обработку формы
                    } else {
                        echo "<h1>Вы не прошли капчу :(<br>Может вы робот?</h1><br>
                        <button class='pulse-button'>
                        <a class='btn' href='http://localhost/sockayasotnikova/mdk03/1prr/index.php' >назад</a>
                        <span class='pulse-button__rings'></span>
                        <span class='pulse-button__rings'></span>
                        <span class='pulse-button__rings'></span>
                        </button>";
                    }
                } else {
                    echo "<h1>Капча не была сгенерирована. Пожалуйста, обновите страницу.</h1><br>";
                }
            } else {
                echo "<h1>Неверный запрос.</h1><br>";
            }?>
        </h1>
        
    </body>
</html>