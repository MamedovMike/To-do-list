<?php

require_once 'Database.php';
$task  = new Database('MySQL-8.2', 'root', '', 'users_to_do_list');

?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>To do list</title>
    <link rel="stylesheet" href="styles/style.css">
  </head>
  <body>
    <div class="navbar">
        <img src="pics/logo.png" alt="logo" style="width: 56px;">
        <ul>
            <li><a href="user_page_scripts/sign_up.php">Sign Up</a></li>
            <li><a href="user_page_scripts/sign_in.php">Log in</a></li>
        </ul>
    </div>
    <div class="description">
        <h2>Проект "To Do List"</h2>
            <div class="text">
            На нашем сайте вы можете записать свой список дел и сохранить для дальнейшего использования! Всё, что вам потребуется - это зарегистрироваться(либо войти, если вы уже зарегистрированы), и всё! Вы можете сохранять свои задачи, редактировать, изменять, удалять и даже поставить приоритет! Все ваши данные надежно защищены в наших серверах! Можно без опаски сохранять свои задачи! Будем рады вашей обратной связи!
            </div>
    </div>
    <div class="navbar-down">
        <ul>
            <li><a href="#">Поддержать проект</a></li>
            <li><a href="#">Связаться с нами</a></li>
            <li><a href="#">Наши соц. сети:</a></li>
        </ul>
    </div>
  </body>
</html>