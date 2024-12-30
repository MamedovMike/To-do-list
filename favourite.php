<?php
require 'Database.php';


$button_id  = $_POST['button'];
$favourite = $_POST['favourite'];
if($favourite == "0"){
    $favourite = "1";
} else {
    $favourite = "0";
}
$task = new Database('MySQL-8.2', 'root', '', 'blog_db');
$task->addFavourite($button_id, $favourite);
header('Location: index.php');
?>