<?php

require '../Database.php';


$email       = $_POST['email'];
$password    = $_POST['password'];
// password_verify($password, $userData['password'])
$status = null;

if(empty($email) || empty($password)){
    $status = "Заполните все поля!";
    header("Location: sign_in.php?status=$status");
} else {
    $user = new Database('MySQL-8.2', 'root', '', 'users_to_do_list');
    $userData = $user->sign_in($email);
}

if(($userData['email'] == $email) && (password_verify($password, $userData['password']))){
    session_start();
    $_SESSION['user_id'] = $userData['id']; 
    $status = "You are successfuly sign in!";
    header("Location: ../own_user_tasks.php?status=$status");
} else {
    $sign_in_status = "Неверный email или пароль!";
    header("Location: sign_in.php?status=$sign_in_status");
}
?>