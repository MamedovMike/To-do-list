<?php
require '../Database.php';
session_start();

$email       = $_POST['email'];
$username    = $_POST['username'];
$password    = $_POST['password'];
$retype_pass = $_POST['retype_pass'];

$hashpassword = password_hash($password, PASSWORD_DEFAULT);

$status = null;

// function validateEmail($email){
//     if(!preg_match('/[@a-z.ru]/', $email))
// }

function validatePassword($password){

    if(strlen($password) < 8){
        $status = "Длина пароля должна быть не меньше 8 символов!";
        header("Location: sign_up.php?status=$status"); 
    }

    if(!preg_match('/[A-Z]/', $password)){
        $status = "Пароль должен содержать хотя бы одну заглавную букву!";
        header("Location: sign_up.php?status=$status");    
    }

    if(!preg_match('/[a-z]/', $password)){
        $status = "Пароль должен содержать хотя бы одну строчную букву!";
        header("Location: sign_up.php?status=$status");    
    }

    if(!preg_match('/\d/', $password)){
        $status = "Пароль должен содержать хотя бы одну цифру!";
        header("Location: sign_up.php?status=$status");    
    }

    if(!preg_match('/[\W_]/', $password)){
        $status = "Пароль должен содержать хотя бы один специальный символ!";
        header("Location: sign_up.php?status=$status");    
    }
}

validatePassword($password);

if($password !== $retype_pass){
    $status = "Пароли не совпадают!";
    header("Location: sign_up.php?status=$status");
}
if(empty($email) || empty($username) || empty($password) || empty($retype_pass)){
    $status = "Заполните все поля!";
    header("Location: sign_up.php?status=$status");
} else {
    $user = new Database('MySQL-8.2', 'root', '', 'users_to_do_list');
    $user->addUser($email, $username, $hashpassword);
    header("Location: ../own_user_tasks.php");
}
?>
