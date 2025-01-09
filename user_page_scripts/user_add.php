<?php
require '../Database.php';
session_start();
$user_id = $_SESSION['user_id'];

$title   = $_POST['title'];
$content = $_POST['content'];
$priority = $_POST['priority'];
// $prior_id = $_POST['prior_id'];

if($priority == 'high'){
    $priority = 'high';
} elseif($priority == 'medium'){
    $priority = 'medium';
} else{
    $priority = 'low';
}
// $task = new Database('MySQL-8.2', 'root', '', 'users_to_do_list');

// header('Location: ../own_user_tasks.php');

if(empty($title) || empty($content)){
    //header('Location: ../index.php');
    header('Location: ../own_user_tasks.php');
} else {
    $task = new Database('MySQL-8.2', 'root', '', 'users_to_do_list');
    $task->insertUserTask($title, $content, $user_id, $priority);
    // $task->addUserTaskPriority($prior_id, $priority);
    //header('Location: ../index.php');
    header('Location: ../own_user_tasks.php');
}

// if(empty($title) || empty($content)){
//     header('Location: ../index.php');
//     // header('Location: ../own_user_tasks.php');
// } else {
//     $task = new Database('MySQL-8.2', 'root', '', 'users_to_do_list');
//     $task->insert($title, $content);
//     header('Location: ../index.php');
//     // header('Location: ../own_user_tasks.php');
// }
?>