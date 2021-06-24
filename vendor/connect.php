<?php

$connect = mysqli_connect('localhost', 'tishanskij_d_a', 'NewPass21', 'tishanskij_d_a');
if (!$connect) {
    die("<h1 style='color: red'>" . "Error connect to database!" . "</h1>");
}
