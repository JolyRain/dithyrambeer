<?php
$connect = mysqli_connect('localhost', 'root', 'root', 'dithyramb');
if (!$connect) {
    die("<h1 style='color: red'>" . "Error connect to database!" . "</h1>");
}
