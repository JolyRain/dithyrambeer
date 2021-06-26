<?php
session_start();

global $user_id;
if (array_key_exists('user_id', $_GET)) {
    $user_id = $_GET['user_id'];
} else {
    header('Location: index.php');
}
require 'engine/connect.php';
require 'engine/defaults.php';
global $connect;

$user = mysqli_query($connect, "select * from `users` where `user_id` = '$user_id'");
$user = mysqli_fetch_object($user);

$title = $user->login;
require "header.php";
require 'engine/scripts.php';
?>
<body>
<?php
showHeader(session_on());
?>

<div class="container w-25">
    <div class="border rounded  mb-4 shadow-sm  position-relative">
        <div class=" p-4 text-center">
            <p class="card-text mb-auto"><b>Логин</b>: <?= $user->login ?></p>
            <p class="card-text mb-auto"><b>Почта</b>: <?= $user->email ?></p>
            <p class="card-text mb-auto"><b>Роль</b>: <?= $user->role ?></p>
            <p class="card-text mb-auto"><b>Уровень</b>: <?= getUserLevel($user->opin_count) ?></p>
            <p class="card-text mb-auto"><b>Отзывов всего</b>: <?= $user->opin_count ?></p>
        </div>
    </div>
</div>

<div class=" text-center">
    <h6 class="display-6 fw-normal"><?= isPersonalPage($user_id) ? "Мои отзывы" : "Отзывы"; ?></h6>
</div>

<div class="p-3 align-content-center">
    <div class="container w-75">
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Товар</th>
                <th scope="col">Оценка</th>
                <th scope="col">Отзыв</th>
                <?php if (isPersonalPage($user_id)): ?>
                <th scope="col">
                    <?php endif; ?>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $opinions = mysqli_query($connect, "select * from `opinions` where `user_id` = '$user_id'");

            while ($opin = mysqli_fetch_object($opinions)):
                $prod = mysqli_query($connect, "select * from `products` where `product_id` = '$opin->product_id'");
                $prod = mysqli_fetch_object($prod);
                ?>
                <tr>
                    <td><?= $prod->name ?></td>
                    <td><?= $opin->rate ?></td>
                    <td><?= $opin->review ?></td>
                    <td><a class="btn btn-dark btn-sm"
                           href="product.php?product_id=<?= $opin->product_id ?>">Страница</a>
                    </td>

                    <?php if (isPersonalPage($user_id)): ?>
                        <td>
                            <a class="btn btn-danger btn-sm"
                               href="engine/deleteOpin.php?user_id=<?= $opin->user_id ?>&product_id=<?= $opin->product_id ?>">Удалить</a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endwhile ?>
            </tbody>
        </table>
    </div>
</div>

</body>

