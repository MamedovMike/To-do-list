<?php

// Скрипт для удаления задачи из БД

require '../Database.php';

$id = $_POST['id'];

$task = new Database('MySQL-8.2', 'root', '', 'users_to_do_list');
$task->deleteTask($id);
header('Location: ../index.php');
?> 