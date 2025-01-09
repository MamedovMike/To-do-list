<?php
require '../Database.php';
session_start();

$username    = $_POST['username'];
$email       = $_POST['email'];
$password    = $_POST['password'];
$retype_pass = $_POST['retype_pass'];

$status = null;

$allowTypes = ['image/jpeg', 'image/png'];
$maxAvatarSize = 2 * 1024 * 1024;

function validatePassword($password){

    if(strlen($password) < 8){
        $status = "Длина пароля должна быть не меньше 8 символов!";
        header("Location: sign_up.php?status=$status");
        exit;
    }

    if(!preg_match('/[A-Z]/', $password)){
        $status = "Пароль должен содержать хотя бы одну заглавную букву!";
        header("Location: sign_up.php?status=$status");    
        exit;
    }

    if(!preg_match('/[a-z]/', $password)){
        $status = "Пароль должен содержать хотя бы одну строчную букву!";
        header("Location: sign_up.php?status=$status");  
        exit;  
    }

    if(!preg_match('/\d/', $password)){
        $status = "Пароль должен содержать хотя бы одну цифру!";
        header("Location: sign_up.php?status=$status");    
        exit;
    }

    if(!preg_match('/[\W_]/', $password)){
        $status = "Пароль должен содержать хотя бы один специальный символ!";
        header("Location: sign_up.php?status=$status");
        exit;    
    }
}

$hashpassword = password_hash($password, PASSWORD_DEFAULT);
validatePassword($password);

if($password !== $retype_pass){
    $status = "Пароли не совпадают!";
    header("Location: sign_up.php?status=$status");
}

if(isset($_FILES['avatar'])){
    $avatar      = $_FILES['avatar']['name'];
    $tmp_name    = $_FILES['avatar']['tmp_name'];
    $avatarSize  = $_FILES['avatar']['size'];
    $avatarType  = $_FILES['avatar']['type'];

    if(!in_array($avatarType, $allowTypes)){
        $status = "Доступно только загрузка формата jpeg и png";
        header("Location: sign_up.php?status=$status");
        exit;
    }

    if($avatarSize > $maxAvatarSize){
        $status = "Размер файла превышает 2МБ.";
        header("Location: sign_up.php?status=$status");
        exit;
    }

    $ext = pathinfo($avatar, PATHINFO_EXTENSION); 

    $uniqueAvatarName = 'avatar_' . time() . ".$ext";
    move_uploaded_file($tmp_name, "../avatars/" . $avatar);

    $avatarPath = "../avatars/" . $uniqueAvatarName;

} else {
    $status = "Загрузите аватарку!";
    header("Location: sign_up.php?status=$status");
    exit;
}

if(empty($email) || empty($username) || empty($password) || empty($retype_pass)){
    $status = "Заполните все поля!";
    header("Location: sign_up.php?status=$status");
    exit;
} else {
    $user = new Database('MySQL-8.2', 'root', '', 'users_to_do_list');
    $user->addUser($email, $username, $hashpassword, $avatarPath);
    header("Location: ../own_user_tasks.php");
    exit;
}
?>
