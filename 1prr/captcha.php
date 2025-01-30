<?php
session_start();

function generateCaptcha() {
    // Генерируем случайную строку из букв и цифр
    $characters = 'ABCDEFGHJKMNOPQRSTUVWXYZabcdefghjkmnopqrstuvwxyz0123456789';
    $captchaText = '';
    for ($i = 2; $i < 6; $i++) {
        $captchaText .= $characters[rand(0, strlen($characters) - 1)];
    }
    
    // Сохраняем капчу в сессии
    $_SESSION['captcha'] = $captchaText;
    return $captchaText;

    
}
?>
