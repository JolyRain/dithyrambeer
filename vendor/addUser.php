<?php
$email = $_POST['email'];
$login = $_POST['login'];
$pass = $_POST['pass'];


$role = $_POST['role'] ? array_key_exists('role', $_POST) : 'user';

$pass = md5($pass);

require 'connect.php';
global $connect;
/*
 * валидация
 * существующий логин
 * существующая почта
 */
$result = mysqli_query($connect,
    "INSERT INTO `users` (`login`, `pass`, `email`, `role`, `opin_count`)
 VALUES('$login', '$pass', '$email', '$role', '0')");

$connect->close();

header("Location: ".$_SERVER['HTTP_REFERER']);



