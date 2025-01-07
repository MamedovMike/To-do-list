<?php

// Общий скрипт для обработки данных и добавления новой задачи в БД

require '../Database.php';

$task_title   = $_POST['title'];
$task_content = $_POST['content'];

if(empty($task_title) || empty($task_content)){
    header('Location: ../index.php');
} else {
    $task = new Database('MySQL-8.2', 'root', '', 'users_to_do_list');
    $task->insertTask($task_title, $task_content);
    header('Location: ../index.php');
}
?>