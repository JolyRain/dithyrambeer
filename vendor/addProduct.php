<?php
require 'connect.php';
global $connect;

$user_id = $_GET['user_id'];
$prod_name = $_POST['prod_name'];

mysqli_query($connect, "insert into `products`(`name`, `rating`, `opin_count`) values ('$prod_name', '0', '0')");

$product_id = mysqli_query($connect, "select `product_id` from `products` where `name` = '$prod_name'");
$product_id = mysqli_fetch_object($product_id);
$product_id = $product_id->product_id;

require 'addOpin.php';

