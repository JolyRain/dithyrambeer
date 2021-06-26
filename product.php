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
    <div class="card shadow-sm border border-secondary rounded mb-4  text-center">
        <div class="card-header  text-white bg-dark">
            <h5 class="m-0 fw-normal"><?= $product->name ?></h5>
        </div>
        <div class="card-body">
            <ul class="list-unstyled mt-3 mb-4">
                <li class="fw-normal fs-5">Рейтинг - <?= roundRating($product->rating) . '/' . $MAX_RATING ?></li>
                <li class="fw-normal fs-5">Всего отзывов - <?= $product->opin_count ?></li>
            </ul>
        </div>
    </div>
</div>
<?php
global $user_id;
if (session_on()) {
    $user_id = $_SESSION['user']['user_id'];
}
$result = mysqli_query($connect, "select * from `opinions` 
where `opinions`.`user_id` = '$user_id' and `opinions`.`product_id` = '$product_id'");
$hasOpinion = $result->num_rows > 0;
$user_opin = mysqli_fetch_object($result);
if (session_on() and !$hasOpinion): ?>
    <div class="container w-25">
        <div class="<?= $hasOpinion ? "row row-cols-2" : "container" ?>">
            <div class="col">
                <a href="<?= $hasOpinion ? "updOpinForm.php" : "addOpinForm.php" ?>?product_id=<?= $product_id ?>&user_id=<?= $user_id ?>"
                   class="btn btn-dark  w-100"><?= $hasOpinion ? "Изменить отзыв" : "Написать отзыв" ?></a>
            </div>
            <?php if ($hasOpinion): ?>
                <div class="col">
                    <a href="engine/deleteOpin.php?product_id=<?= $product_id ?>&user_id=<?= $user_id ?>"
                       class="btn btn-danger  w-100"><?= "Удалить отзыв" ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php else: ?>
    <div class="container w-25 ">
        <div class="container text-center">
            <h6><a href="signin.php" class="user-link text-dark w-25 ">Войдите в аккаунт, чтобы написать отзыв</a></h6>
        </div>
    </div>
<?php endif;
$opinions = mysqli_query($connect, "select * from `opinions` where `opinions`.`product_id` = '$product_id'");
if ($opinions->num_rows > 0): ?>
    <div class="container mt-md-3 text-center">
        <h6 class="display-6 fw-normal">Отзывы</h6>
    </div>
    <?php if ($hasOpinion): ?>
        <div class="container mt-md-3 w-50">
            <div class="card border rounded-3  mb-4 shadow-sm">
                <div class="card-header text-center bg-dark">
                    <div class="container w-25 float-start text-start">
                        <a class="user-link fw-normal h4 text-white  text-start"
                           href="user.php?user_id=<?= $user_id ?>"><?= $_SESSION['user']['login'] ?> </a>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="mb-1">Оценка - <?= $user_opin->rate ?></h6>
                    <p class="card-text">
                        <?= $user_opin->review ?>
                    </p>
                </div>
            </div>

        </div>
    <?php endif;
    while ($opinion = mysqli_fetch_object($opinions)):
        if (session_on() and $_SESSION['user']['user_id'] == $opinion->user_id) {
            continue;
        }
        $user_id = $opinion->user_id;
        $result = mysqli_query($connect, "select `login` from `users` where `users`.`user_id` = '$user_id'");
        $result = mysqli_fetch_object($result);
        $user_login = $result->login; ?>
        <div class="container mt-md-3 w-50">
            <div class="card border rounded-3  mb-4 shadow-sm">
                <div class="card-header bg-dark text-center">
                    <div class="container w-25 float-start text-start">
                        <a class="user-link fw-normal h4 text-white  text-start"
                           href="user.php?user_id=<?= $user_id ?>"><?= $user_login ?> </a>
                    </div>
                    <?php if (isAdminSession()):?>
                    <div class="container w-25 float-end text-end">
                        <a class="text-white btn btn-sm btn-danger"
                           href="user.php?user_id=<?= $user_id ?>">Удалить</a>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <h6 class="mb-1">Оценка - <?= $opinion->rate ?></h6>
                    <p class="card-text">
                        <?= $opinion->review ?>
                    </p>
                </div>
            </div>

        </div>
    <?php endwhile; ?>
<?php endif; ?>
</body>

<script>

</script>
