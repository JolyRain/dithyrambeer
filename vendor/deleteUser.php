<?php
require 'connect.php';
$user_id = $_GET['id'];

global $connect;
mysqli_query($connect, "delete from `users` where `users`.`user_id` = '$user_id'");

$products = mysqli_query($connect, "select `product_id` from `opinions` where `opinions`.`user_id` = '$user_id'");
while ($product = mysqli_fetch_object($products)) {
    $rate_result = mysqli_query($connect,
        "select `rate` from `opinions` where `user_id` = '$user_id' and `product_id` = '$product->product_id'");
    $rate = mysqli_fetch_object($rate_result)->rate;
    $new_opin_count = $product->opin_count - 1;
    $new_rating = ($product->rating * $product->opin_count - $rate) / ($new_opin_count);
    mysqli_query($connect, "update `products` set `rating` = '$new_rating', `opin_count`='$new_opin_count' 
where `product_id` = '$product->product_id'");
}
mysqli_query($connect, "delete from `opinions` where `opinions`.`user_id` = '$user_id'");

$connect->close();

header("Location: " . $_SERVER['HTTP_REFERER']);

