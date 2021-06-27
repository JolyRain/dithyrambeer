<?php
session_start();
require 'scripts.php';
if (!isAdminSession()) {
    header('Location: ../index.php');
    die();
}
require 'connect.php';
require 'validation.php';
global $connect;

$email = $_POST['email'];
$login = $_POST['login'];
$pass = $_POST['pass'];
$passConfirm = isAdminSession() ? $pass : $_POST['pass-confirm'];

$role = array_key_exists('role', $_POST) ? $_POST['role'] : 'user';

if (isValidUserData($email, $login, $pass, $passConfirm) and !isEmptyFields($email, $login, $pass, $passConfirm)) {
    $pass = md5($pass);
    mysqli_query($connect,
        "insert into `users` (`login`, `pass`, `email`, `role`, `opin_count`) values ('$login', '$pass', '$email', '$role', '0')");
    $_SESSION['message'] = isAdminSession() ? 'Пользователь успешно добавлен!' : 'Вы успешно зарегистрированы!';
    $_SESSION['msg-color'] = 'border-success';
    $redirect = isAdminSession() ? "../addUserForm.php" : "../signin.php";
    header("Location: " . $redirect);
    $connect->close();
} else {
    $_SESSION['message'] = userMessage($email, $login, $pass, $passConfirm);
    $_SESSION['msg-color'] = 'border-danger';
    header("Location: " . $_SERVER['HTTP_REFERER']);
    $connect->close();
}

