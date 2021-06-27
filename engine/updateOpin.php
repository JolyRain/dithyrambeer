<?php
session_start();
require 'scripts.php';
if (!session_on()) {
    header('Location: ../updOpinForm.php');
    die();
}
require 'connect.php';
require 'defaults.php';

global $connect, $MAX_RATING;
global $product_id, $user_id;

$product_id = array_key_exists('product_id', $_GET) ? $_GET['product_id'] : $product_id;
$user_id = array_key_exists('user_id', $_GET) ? $_GET['user_id'] : $user_id;

$rate = array_key_exists('rate', $_POST) ? $_POST['rate'] : 0;
$review = $_POST['review'];

$product = mysqli_query($connect, "select * from `products` where `products`.`product_id` = '$product_id'");
$product = mysqli_fetch_object($product);

$user = mysqli_query($connect, "select * from `users` where `users`.`user_id` = '$user_id'");
$user = mysqli_fetch_object($user);

$oldRate = mysqli_query($connect, "select `rate` from `opinions` where `user_id` = '$user_id' and `product_id` = '$product_id'");
$oldRate = mysqli_fetch_object($oldRate)->rate;

$newRating = ($product->rating * $product->opin_count - $oldRate + $rate) / ($product->opin_count);

mysqli_query($connect, "update `opinions` set `rate` = '$rate', `review` = '$review'
where `user_id` = '$user_id' and `product_id` = '$product_id'");

mysqli_query($connect, "update `products` set `rating` = '$newRating' where `products`.`product_id` = '$product_id'");

header("Location: ../product.php?product_id=" . $product_id);

$connect->close();