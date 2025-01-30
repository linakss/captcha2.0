<?php
session_start(); // Начинаем сессию

// Подключение к базе данных
$link = mysqli_connect('localhost', 'root1', '', 'simple_auth'); // Замените на свои данные
$user = null;
if (!$link) {
    die('Ошибка подключения: ' . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['login']) && !empty($_POST['password'])) {
        $login = mysqli_real_escape_string($link, $_POST['login']);
        $password = mysqli_real_escape_string($link, $_POST['password']);
        
        // Проверка на наличие пользователя в базе данных
        $query = "SELECT * FROM users WHERE login='$login' AND password='$password'";
        $result = mysqli_query($link, $query);
        $user = mysqli_fetch_assoc($result);
        
        if ($user) {
            // Успешная авторизация
            $_SESSION['user'] = $user['login']; // Сохраняем логин в сессии
            header('Location: http://localhost/sockayasotnikova/mdk03/1prr/2prr/indexauth.php'); // Редирект на index.php
            exit();
        } else {
            $error = 'Неверный логин или пароль';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>
<body>
    <h1>Авторизация</h1>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; 
        if ($user) {
            $_SESSION['user'] = $user['login']; // Сохраняем логин в сессии
            $_SESSION['message'] = 'Вы успешно авторизованы!';} // Устанавливаем флеш-со
    ?>
    <form action="" method="POST">
        <input name="login" placeholder="Логин" required>
        <input name="password" type="password" placeholder="Пароль" required>
        <input type="submit" value="Войти">
    </form>
</body>
</html>
