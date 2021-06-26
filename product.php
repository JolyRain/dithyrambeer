<?php
session_start();

require 'engine/connect.php';
require 'engine/defaults.php';
global $connect, $MAX_RATING;

$product_id = $_GET['product_id'];

$product = mysqli_query($connect, "select * from `products` where `products`.`product_id` = '$product_id'");
$product = mysqli_fetch_object($product);

$title = $product->name;
require "header.php";
require 'engine/scripts.php';

?>
<body>
<?php showHeader(session_on());
?>

<div class="container w-25">
    <div class="border rounded mb-4 text-center">
        <div class="col p-4 d-flex flex-column position-static">
            <h3 class="mb-3"><?= $product->name ?></h3>
            <h5 class="mb-3">Рейтинг - <?= roundRating($product->rating) . '/' . $MAX_RATING ?></h5>
            <h5 class="mb-3">Всего отзывов - <?= $product->opin_count ?></h5>
        </div>
    </div>
</div>
<?php
global $user_id;
if (session_on()) {
    $user_id = $_SESSION['user']['user_id'];
}
$result = mysqli_query($connect, "select 1 from `opinions` 
where `opinions`.`user_id` = '$user_id' and `opinions`.`product_id` = '$product_id'");
$hasOpinion = $result->num_rows > 0;
if (session_on()): ?>
    <div class="container w-25">
        <div class="container">
            <a href="<?= $hasOpinion ? "updOpinForm.php" : "addOpinForm.php" ?>?product_id=<?= $product_id ?>&user_id=<?= $_SESSION['user']['user_id'] ?>"
               class="btn btn-dark  w-100"><?= $hasOpinion ? "Изменить отзыв" : "Написать отзыв" ?></a>
        </div>
    </div>
<?php else: ?>
    <div class="container w-25 ">
        <div class="container text-center">
            <h6><a href="signin.php" class="user-link text-dark w-25 ">Войдите в аккаунт, чтобы написать отзыв</a></h6>
        </div>
    </div>
<?php
endif;
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
                <h5 class="mb-1"><a class="user-link text-dark"
                                    href="user.php?user_id=<?= $user_id ?>"><?= $user_login ?></a></h5>
                <h6 class="mb-1">Оценка - <?= $opinion->rate ?></h6>
                <p>
                    <?= $opinion->review ?>
                </p>
            </div>
        </div>
    </div>
<?php } ?>
</body>
