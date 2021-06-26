<?php
session_start();
require 'scripts.php';
if (!session_on()) {
    header('Location: ../updOpinForm.php');
}
require 'connect.php';
require 'defaults.php';

global $connect, $MAX_RATING;
global $product_id, $user_id;

$product_id = array_key_exists('product_id', $_GET) ? $_GET['product_id'] : $product_id;
$user_id = array_key_exists('user_id', $_GET) ? $_GET['user_id'] : $user_id;
print_r("prod - ".$product_id."<br>");
print_r("user - ".$user_id."<br>");

$rate = array_key_exists('rate', $_POST) ? $_POST['rate'] : 0;
$review = $_POST['review'];
print_r("rate - ".$rate."<br>");
print_r("review - ".$review."<br>");

$product = mysqli_query($connect, "select * from `products` where `products`.`product_id` = '$product_id'");
$product = mysqli_fetch_object($product);
print_r($product);
print_r("<br>");
$user = mysqli_query($connect, "select * from `users` where `users`.`user_id` = '$user_id'");
$user = mysqli_fetch_object($user);
print_r($user);
print_r("<br>");

$oldRate = mysqli_query($connect, "select `rate` from `opinions` where `user_id` = '$user_id' and `product_id` = '$product_id'");
$oldRate = mysqli_fetch_object($oldRate)->rate;
print_r("oldrate - ".$oldRate."<br>");
print_r("<br>");

$newRating = ($product->rating * $product->opin_count - $oldRate + $rate) / ($product->opin_count);

print_r("newrating - ".$newRating."<br>");
print_r("<br>");

mysqli_query($connect, "update `opinions` set `rate` = '$rate', `review` = '$review'
where `user_id` = '$user_id' and `product_id` = '$product_id'");

mysqli_query($connect, "update `products` set `rating` = '$newRating' where `products`.`product_id` = '$product_id'");

header("Location: ../product.php?product_id=" . $product_id);

$connect->close();