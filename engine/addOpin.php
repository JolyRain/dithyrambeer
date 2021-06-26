<?php

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

$newOpinCount = $product->opin_count + 1;
$newRating = ($product->rating * $product->opin_count + $rate) / ($newOpinCount);

mysqli_query($connect, "insert into `opinions`(`user_id`, `product_id`, `rate`, `review`) 
values('$user_id', '$product_id', '$rate', '$review')");

mysqli_query($connect, "update `products` set `rating` = '$newRating', `opin_count` = '$newOpinCount'
where `products`.`product_id` = '$product_id'");

$userOpinCount = $user->opin_count + 1;
mysqli_query($connect, "update `users` set `opin_count` = '$userOpinCount'
where `users`.`user_id` = '$user_id'");

$connect->close();

header("Location: ../product.php?product_id=" . $product_id);
