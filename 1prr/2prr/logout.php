<?php
session_start();
session_destroy(); // Удаляем сессию
header('Location: http://localhost/sockayasotnikova/mdk03/1prr/2prr/indexauth.php'); // Редирект на страницу авторизации
exit();
?>
