<?php
session_start();
require 'connect.php';
require 'scripts.php';
global $connect;

if (!isAdminSession()) {
    header('Location: ../index.php');
    die();
}

$user_id = $_GET['user_id'];
$prod_name = $_POST['prod_name'];

mysqli_query($connect, "insert into `products`(`name`, `rating`, `opin_count`) values ('$prod_name', '0', '0')");

$product_id = mysqli_query($connect, "select `product_id` from `products` where `name` = '$prod_name'");
$product_id = mysqli_fetch_object($product_id);
$product_id = $product_id->product_id;


$rate = array_key_exists('rate', $_POST) ? $_POST['rate'] : 0;
$review = filter_var($_POST['review'], FILTER_SANITIZE_STRING);

if (strlen(filter_var($prod_name, FILTER_SANITIZE_STRING)) == 0) {
    $_SESSION['message'] = 'Введите название товара';
    $_SESSION['msg-color'] = 'border-danger';
    header("Location: ../addProductForm.php");
} else {
    $_SESSION['message'] = 'Товар успешно добавлен!';
    $_SESSION['msg-color'] = 'border-success';

    if ($rate == 0 and strlen($review) == 0) {
        header("Location: ../addProductForm.php");
    } else {
        require 'addOpin.php';
    }
}




