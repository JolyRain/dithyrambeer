<?php
session_start();
require 'connect.php';
require 'validation.php';
global $connect;

$login = $_POST['login'];
$pass = $_POST['pass'];

$pass = md5($pass);
$result = mysqli_query($connect,
    "select * from `users` where `users`.login = '$login' and `users`.`pass` = '$pass'");
if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_object($result);
    $_SESSION['user'] = [
        "user_id" => $user->user_id,
        "email" => $user->email,
        "login" => $user->login,
        "role" => $user->role,
        "opin_count" => $user->opin_count
    ];
    if ($user->role == 'admin') {
        header("Location: ../admin.php?user_id=" . $user->user_id);
    } else {
        header("Location: ../user.php?user_id=" . $user->user_id);
    }
} else {
    $_SESSION['message'] = 'Неверный логин или пароль';
    $_SESSION['msg-color'] = 'border-danger';
    $connect->close();
    header("Location: " . $_SERVER['HTTP_REFERER']);
}