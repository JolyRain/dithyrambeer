<?php
require 'connect.php';
$prod_id = $_GET['prod_id'];

global $connect;
mysqli_query($connect, "DELETE FROM `products` WHERE `products`.`product_id` = '$prod_id'");
mysqli_query($connect, "DELETE FROM `opinions` WHERE `opinions`.`product_id` = '$prod_id'");
mysqli_query($connect, "update FROM `products` WHERE `products`.`product_id` = '$prod_id'");


$connect->close();

header("Location: ".$_SERVER['HTTP_REFERER']);
