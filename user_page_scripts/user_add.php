<?php
require '../Database.php';
session_start();
$user_id = $_SESSION['user_id'];

$title   = $_POST['title'];
$content = $_POST['content'];

if(empty($title) || empty($content)){
    //header('Location: ../index.php');
    header('Location: ../own_user_tasks.php');
} else {
    $task = new Database('MySQL-8.2', 'root', '', 'users_to_do_list');
    $task->insertUserTask($title, $content, $user_id);
    //header('Location: ../index.php');
    header('Location: ../own_user_tasks.php');
}

if(empty($title) || empty($content)){
    header('Location: ../index.php');
    // header('Location: ../own_user_tasks.php');
} else {
    $task = new Database('MySQL-8.2', 'root', '', 'users_to_do_list');
    $task->insert($title, $content);
    header('Location: ../index.php');
    // header('Location: ../own_user_tasks.php');
}
?>