<?php
session_start();
require 'connect.php';
require 'validation.php';
global $connect;

$email = $_POST['email'];
$login = $_POST['login'];
$pass = $_POST['pass'];
$passConfirm = array_key_exists('pass-confirm', $_POST) ? $_POST['pass-confirm'] : $pass;

$role = array_key_exists('role', $_POST) ? $_POST['role'] : 'user';

if (signupValidate($email, $login, $pass, $passConfirm)) {
    $pass = md5($pass);
    mysqli_query($connect,
        "insert into `users` (`login`, `pass`, `email`, `role`, `opin_count`) values ('$login', '$pass', '$email', '$role', '0')");
    $_SESSION['message'] = 'Вы успешно зарегистрированы!';
    $_SESSION['msg-color'] = 'border-success';
    $connect->close();
    header("Location: ../signin.php");

} else {
    $_SESSION['message'] = signupMessage($email, $login, $pass, $passConfirm);
    $connect->close();
    header("Location: " . $_SERVER['HTTP_REFERER']);
}

