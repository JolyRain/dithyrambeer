<?php
require 'connect.php';
$user_id = $_GET['id'];

global $connect;
mysqli_query($connect, "DELETE FROM `users` WHERE `users`.`user_id` = '$user_id'");
mysqli_query($connect, "DELETE FROM `opinions` WHERE `opinions`.`user_id` = '$user_id'");

$connect->close();

header("Location: ".$_SERVER['HTTP_REFERER']);

