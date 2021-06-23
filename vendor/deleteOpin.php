<?php
require 'connect.php';
$user_id = $_GET['user_id'];
$product_id = $_GET['product_id'];

global $connect;
mysqli_query($connect, "delete from `opinions` where `opinions`.`user_id` = '$user_id' and `opinions`.product_id= '$product_id'");
$result = mysqli_query($connect, "select `opin_count` from `users` where user_id = '$user_id'");
$opin_count = mysqli_fetch_object($result)->opin_count;
$opin_count--;
mysqli_query($connect, "update `users` set `opin_count` = '$opin_count' WHERE `users`.`user_id` = '$user_id'");

$connect->close();

header("Location: ".$_SERVER['HTTP_REFERER']);