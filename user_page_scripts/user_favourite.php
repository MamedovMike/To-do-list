<?php
require '../Database.php';

$button_id  = $_POST['button'];
$favourite = $_POST['favourite'];
if($favourite == "0"){
    $favourite = "1";
} else {
    $favourite = "0";
}
$task = new Database('MySQL-8.2', 'root', '', 'users_to_do_list');
$task->addUserFavouriteTask($button_id, $favourite);
header('Location: ../own_user_tasks.php');
?>