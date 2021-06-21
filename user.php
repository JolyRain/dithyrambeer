<?php
$title = "Личный кабинет";
require "header.php";

?>
<body>
<?php showHeader();
require 'vendor/connect.php';
require 'vendor/defaults.php';
global $connect;

$user_id = $_GET['id'];

$user = mysqli_query($connect, "select * from `users` where `user_id` = '$user_id'");
$user = mysqli_fetch_object($user);
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

<?= $connect->close(); ?>

<div class=" text-center">
    <h6 class="display-6 fw-normal">Мои отзывы</h6>
</div>

<div class="p-3 align-content-center">
    <div class="container w-75">
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Товар</th>
                <th scope="col">Оценка</th>
                <th scope="col">Отзыв</th>
                <th scope="col">
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Пиво</td>
                <td>5</td>
                <td>какое то вкусное пиво кайф</td>
                <td><a class="btn btn-dark btn-sm" href="product.php">Страница</a></td>
                <td><a class="btn btn-danger btn-sm" href="vendor/deleteOpin.php">Удалить</a></td>
            </tr>

            </tbody>
        </table>
    </div>
</div>

</body>

