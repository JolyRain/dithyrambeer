<?php
session_start();
require 'connect.php';
require 'scripts.php';
require 'validation.php';
global $connect;

if (!isAdminSession()) {
    header('Location: ../index.php');
    die();
}

$user_id = $_GET['user_id'];
$prod_name = $_POST['prod_name'];
$filtered_name = filter_var($prod_name, FILTER_SANITIZE_STRING);

if (!isUniqProd($filtered_name)) {
    $_SESSION['message'] = 'Такой товар уже существует';
    $_SESSION['msg-color'] = 'border-danger';
    header("Location: ../addProductForm.php");
    die();
}


if (strlen($filtered_name) == 0) {
    $_SESSION['message'] = 'Введите название товара';
    $_SESSION['msg-color'] = 'border-danger';
    header("Location: ../addProductForm.php");
} else {
    mysqli_query($connect, "insert into `products`(`name`, `rating`, `opin_count`) values ('$filtered_name', '0', '0')");
    $_SESSION['message'] = 'Товар успешно добавлен!';
    $_SESSION['msg-color'] = 'border-success';
    header("Location: ../addProductForm.php");
}





