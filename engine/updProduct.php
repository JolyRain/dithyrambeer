<?php
session_start();
require 'scripts.php';
if (!isAdminSession()) {
    header('Location: ../updOpinForm.php');
    die();
}
require 'connect.php';

global $connect;

$product_id = $_GET['product_id'];
$prod_name = filter_var($_POST['prod_name'], FILTER_SANITIZE_STRING);

$filtered_name = filter_var($prod_name, FILTER_SANITIZE_STRING);

if (strlen($filtered_name) == 0) {
    $_SESSION['message'] = 'Введите название товара';
    $_SESSION['msg-color'] = 'border-danger';
    header("Location: ../updProdForm.php?product_id=" . $product_id);
} else {
    mysqli_query($connect, "update `products` set `name` = '$prod_name' where `product_id` = '$product_id'");
    header("Location: ../product.php?product_id=" . $product_id);
}


$connect->close();