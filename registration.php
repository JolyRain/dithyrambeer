<?php
$email = $_POST['email'];
$login = $_POST['login'];
$pass = $_POST['pass'];

$pass = md5($pass);

require 'vendor/connect.php';

/*
 * валидация
 * существующий логин
 * существующая почта
 */
$result = mysqli_query($connect,
    "INSERT INTO `users` (`login`, `pass`, `email`, `role`, `opin_count`)
 VALUES('$login', '$pass', '$email', 'user', '0')");

print_r($result);

$connect->close();

header("Location: /");



