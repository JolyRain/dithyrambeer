<?php
print_r($_POST);
if (array_key_exists('rating', $_POST)) {
    echo $_POST['rating'];
} else {
    echo 'немае';
}
