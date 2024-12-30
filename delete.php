<?php
require 'Database.php';

$id = $_POST['id'];

// if(empty($id)){
//     header('Location: index.php');
// } else {
    $task = new Database('MySQL-8.2', 'root', '', 'blog_db');
    $task->delete($id);
    header('Location: index.php');
//}

// $id = $_POST['delete_button'];
// $task = new Database('MySQL-8.2', 'root', '', 'blog_db');
// $task->delete($id);
// header('Location: index.php');
?>