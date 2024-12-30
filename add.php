<?php
require 'Database.php';

$title   = $_POST['title'];
$content = $_POST['content'];

if(empty($title) || empty($content)){
    header('Location: index.php');
} else {
    $task = new Database('MySQL-8.2', 'root', '', 'blog_db');
    $task->insert($title, $content);
    header('Location: index.php');
}

?>