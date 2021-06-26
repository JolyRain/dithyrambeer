<?php
session_start();
require 'scripts.php';
if (!session_on()) {
    header('Location: ../index.php');
}
require 'connect.php';
$user_id = $_GET['user_id'];

global $connect;
mysqli_query($connect, "delete from `users` where `users`.`user_id` = '$user_id'");

$products_id = mysqli_query($connect, "select `product_id` from `opinions` where `opinions`.`user_id` = '$user_id'");
if ($products_id->num_rows > 0) {
    foreach (mysqli_fetch_row($products_id) as $product_id) {
        $product = mysqli_query($connect, "select * from `products` where `product_id` = '$product_id'");
        $product = mysqli_fetch_object($product);
        $rate_result = mysqli_query($connect,
            "select `rate` from `opinions` where `user_id` = '$user_id' and `product_id` = '$product->product_id'");
        $rate = mysqli_fetch_object($rate_result)->rate;
        $new_opin_count = $product->opin_count - 1;
        $new_rating = ($product->rating * $product->opin_count - $rate) / ($new_opin_count);
        mysqli_query($connect, "update `products` set `rating` = '$new_rating', `opin_count`='$new_opin_count' 
where `product_id` = '$product->product_id'");
    }
    mysqli_query($connect, "delete from `opinions` where `opinions`.`user_id` = '$user_id'");
}

header("Location: " . $_SERVER['HTTP_REFERER']);

//$connect->close();

