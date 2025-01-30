<?php
session_start();

// Функция для генерации текста капчи
function generateCaptchaText($length = 6) {
    $characters = 'ABCDEFGHJKMNOPQRSTUVWXYZabcdefghjkmnopqrstuvwxyz0123456789';
    $captchaText = '';
    for ($i = 0; $i < $length; $i++) {
        $captchaText .= $characters[rand(0, strlen($characters) - 1)];
    }
    $_SESSION['captcha'] = $captchaText; // Сохраняем капчу в сессии
    return $captchaText;
}

// Генерируем текст капчи
$captchaText = generateCaptchaText();

// Создаем изображение
$width = 400;
$height = 200;
$image = imagecreatetruecolor($width, $height);

$rand1 = rand(30, 140);
$rand2 = rand(150, 200);
// Задаем цвета
$backgroundColor = imagecolorallocate($image, $rand1, $rand1, $rand1); //  фон
$textColor = imagecolorallocate($image, $rand2, $rand2, $rand2); //  текст
$lineColor = imagecolorallocate($image, 0, 0, 0); //  линии

// Заполняем фон
imagefilledrectangle($image, 0, 0, $width, $height, $backgroundColor);

// Добавляем текст капчи
$fontSize = rand(19,30);
$angle = rand(-15, 15); // случайный угол наклона
$x = rand(10, 190); // случайное положение X
$y = rand(40, 150); // случайное положение Y
imagettftext($image, $fontSize, $angle, $x, $y, $textColor, __DIR__ . '/RubikDistressed-Regular.ttf', $captchaText); // Убедитесь, что путь к шрифту корректен

// Добавляем случайные линии
for ($i = 0; $i < rand(13,27); $i++) {
    imageline($image, rand(0, $width), rand(0, $height), rand(0, $width), rand(0, $height), $lineColor);
}

// Отправляем заголовок и выводим изображение
header('Content-Type: image/png');
imagepng($image);
imagedestroy($image);
?>
