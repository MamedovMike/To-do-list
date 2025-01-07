<?php
require '../Database.php';

$id = $_POST['id'];

$task = new Database('MySQL-8.2', 'root', '', 'users_to_do_list');
$task->deleteUserTask($id);
header('Location: ../own_user_tasks.php');
?> 