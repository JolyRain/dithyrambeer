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


$user_id = $_GET['user_id'];
$user = mysqli_query($connect, "select * from `users` where `user_id` = '$user_id'");
$user = mysqli_fetch_object($user);
$email = $_POST['email'];
$login = $_POST['login'];
$role = $_POST['role'];
$pass = strlen($_POST['pass']) > 0 ? $_POST['pass'] : null;

$other_user = mysqli_query($connect, "select * from `users` where `email` = '$email'");
$uniq_email = $other_user->num_rows <= 1;

$other_user = mysqli_query($connect, "select * from `users` where `login` = '$login'");
$uniq_login = $other_user->num_rows <= 1;


if ($uniq_email and $uniq_login and isValidEmail($email)) {
    mysqli_query($connect,
        "update `users` set `login` = '$login', `email`='$email', `role` = '$role' where `user_id` = '$user_id'");
    if (!is_null($pass)) {
        $pass = md5($pass);
        mysqli_query($connect, "update `users` set `pass` = '$pass' where `user_id` = '$user_id'");
    }
    $_SESSION['message'] = 'Данные успешно изменены!';
    $_SESSION['msg-color'] = 'border-success';
    header("Location: ../updUserForm.php?user_id=" . $user_id);
} else {
    $_SESSION['message'] = updMsg($email, $login);
    $_SESSION['msg-color'] = 'border-danger';
    header("Location: ../updUserForm.php?user_id=" . $user_id);
}
$connect->close();
print_r($_SESSION);

function updMsg($email, $login): string
{
    global $uniq_login, $uniq_email;
    if (isEmptyField($email) or isEmptyField($login)) {
        return 'Поля "Почта" и "Логин" должы быть заполнены';
    }

    if (!isValidEmail($email)) {
        return 'Неверный формат почты';
    } elseif (!$uniq_email) {
        return 'Пользователь с такой почтой уже существует';
    } elseif (!$uniq_login) {
        return 'Пользователь с таким логином уже существует';
    } else {
        return 'Данные успешно изменены';
    }
}