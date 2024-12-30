<?php
require 'Database.php';

$id      = $_POST['id'];
$title   = $_POST['title'];
$content = $_POST['content'];

if(empty($id) || empty($title) || empty($content)){
    header('Location: index.php');
} else {
    $task = new Database('MySQL-8.2', 'root', '', 'blog_db');
    $task->update($id, $title, $content);
    header('Location: index.php');
}
?>