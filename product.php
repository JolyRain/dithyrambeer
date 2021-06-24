<?php
session_start();
$title = "Певасек";
require "header.php";
require 'vendor/scripts.php';

?>
<body>
<?php showHeader(session_on());
require 'vendor/connect.php';
require 'vendor/defaults.php';
global $connect, $MAX_RATING;

$product_id = $_GET['product_id'];

$product = mysqli_query($connect, "select * from `products` where `products`.`product_id` = '$product_id'");
$product = mysqli_fetch_object($product);


?>

<div class="container w-25">
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <h3 class="mb-3"><?= $product->name ?></h3>
            <h5 class="mb-3">Рейтинг - <?= $product->rating . '/' . $MAX_RATING ?></h5>
            <h5 class="mb-3">Всего отзывов - <?= $product->opin_count ?></h5>
        </div>
    </div>
</div>
<?php
if (session_on()) {
    ?>
    <div class="container w-25">
        <div class="container">
            <a href="addOpinForm.php?product_id=<?= $product_id ?>&user_id=<?= $_SESSION['user']['user_id'] ?>"
               class="btn btn-dark  w-100">Написать
                отзыв</a>
        </div>
    </div>
    <?php
}
$opinions = mysqli_query($connect, "select * from `opinions` where `opinions`.`product_id` = '$product_id'");
while ($opinion = mysqli_fetch_object($opinions)) {
    $user_id = $opinion->user_id;
    $result = mysqli_query($connect, "select `login` from `users` where `users`.`user_id` = '$user_id'");
    $result = mysqli_fetch_object($result);
    $user_login = $result->login;

    ?>

    <div class="container mt-md-5 w-75">
        <div class="border rounded-3  mb-4 shadow-sm">
            <div class="p-4">
                <h5 class="mb-1"><?= $user_login ?></h5>
                <h6 class="mb-1">Оценка - <?= $opinion->rate ?></h6>
                <p>
                    <?= $opinion->review ?>
                </p>
            </div>
        </div>
    </div>
<?php } ?>

</body>
