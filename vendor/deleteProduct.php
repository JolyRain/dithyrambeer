<?php
require 'connect.php';
$prod_id = $_GET['prod_id'];

global $connect;
mysqli_query($connect, "delete from `products` where `products`.`product_id` = '$prod_id'");
$users_id = mysqli_query($connect, "select `user_id` from `opinions` where `opinions`.`product_id` = '$prod_id'");
foreach (mysqli_fetch_row($users_id) as $id) {
    $result = mysqli_query($connect, "select `opin_count` from `users` where `user_id` = '$id'");
    $opin_count = mysqli_fetch_object($result)->opin_count;
    $opin_count--;
    mysqli_query($connect, "update `users` set `opin_count` = '$opin_count' where `user_id` = '$id'");
}
mysqli_query($connect, "delete from `opinions` where `opinions`.`product_id` = '$prod_id'");

$connect->close();

header("Location: " . $_SERVER['HTTP_REFERER']);
