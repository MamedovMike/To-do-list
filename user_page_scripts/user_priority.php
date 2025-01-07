<?php
require '../Database.php';

$priority = $_POST['priority'];
$prior_id = $_POST['prior_id'];

if(empty($priority)){
    header('Location: ../own_user_tasks.php');
}

if($priority == 'high'){
    $priority = 'high';
} elseif($priority == 'medium'){
    $priority = 'medium';
} else{
    $priority = 'low';
}
$task = new Database('MySQL-8.2', 'root', '', 'users_to_do_list');
$task->addUserTaskPriority($prior_id, $priority);
header('Location: ../own_user_tasks.php');
?>