<?php
session_start();
require 'scripts.php';
if (!session_on()) {
    header('Location: ../index.php');
    die();
}
require 'connect.php';
$user_id = $_GET['user_id'];
$product_id = $_GET['product_id'];

global $connect;

$result = mysqli_query($connect, "select `opin_count` from `users` where user_id = '$user_id'");
$opin_count = mysqli_fetch_object($result)->opin_count;
print_r('opin_count = '.$opin_count."<br>");
$opin_count--;
mysqli_query($connect, "update `users` set `opin_count` = '$opin_count' where `users`.`user_id` = '$user_id'");

$product = mysqli_query($connect, "select * from `products` where `product_id`='$product_id'");
$product = mysqli_fetch_object($product);

$rate_result = mysqli_query($connect,
    "select `rate` from `opinions` where `user_id` = '$user_id' and `product_id` = '$product_id'");
$rate = mysqli_fetch_object($rate_result)->rate;
$new_opin_count = $product->opin_count - 1;

$new_rating = $new_opin_count == 0 ? 0 : ($product->rating * $product->opin_count - $rate) / ($new_opin_count);
mysqli_query($connect, "update `products` set `rating` = '$new_rating', `opin_count`='$new_opin_count' 
where `product_id` = '$product_id'");

mysqli_query($connect, "delete from `opinions` 
where `opinions`.`user_id` = '$user_id' and `opinions`.product_id= '$product_id'");

header("Location: ".$_SERVER['HTTP_REFERER']);

$connect->close();
