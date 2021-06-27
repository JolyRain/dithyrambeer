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
require 'engine/scripts.php';
global $connect;

$admin = mysqli_query($connect, "select * from `users` where `user_id` = '$user_id'");
$admin = mysqli_fetch_object($admin);

if (!isPersonalPage($admin->user_id)) {
    header('Location: user.php?user_id=' . $admin->user_id);
}
$title = $admin->login;
require "header.php";
?>

<body>
<?php
showHeader(session_on());
?>

<div class="container w-25">
    <div class="card border border-secondary rounded mb-4 shadow-sm text-center">
        <div class="card-header text-white bg-dark">
            <h5 class="m-0 fw-normal"><?= $admin->login ?></h5>
        </div>
        <div class="card-body">
            <ul class="list-unstyled ">
                <li class="card-text mb-auto"><b>Почта</b>: <?= $admin->email ?></li>
                <li class="card-text mb-auto"><b>Роль</b>: <?= $admin->role ?></li>
                <li class="card-text mb-auto"><b>Уровень</b>: <?= getUserLevel($admin->opin_count) ?></li>
                <li class="card-text mb-auto"><b>Отзывов всего</b>: <?= $admin->opin_count ?></li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid w-75">
    <ul class="nav nav-tabs" id="tab">
        <li class="nav-item  w-25 text-center">
            <a class="nav-link text-dark h4 fw-normal" href="#opinions">Мои отзывы</a>
        </li>
        <li class="nav-item w-50 text-center">
            <a class="nav-link h4 text-dark active fw-normal" href="#users">Пользователи</a>
        </li>
        <li class="nav-item w-25 text-center">
            <a class="nav-link h4 text-dark fw-normal" href="#products">Товары</a>
        </li>
    </ul>
    <div class="tab-content p-3 align-content-lg-center">
        <div class="tab-pane fade" id="opinions">
            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Название</th>
                    <th scope="col">Оценка</th>
                    <th scope="col">Отзыв</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $opinions = mysqli_query($connect, "select * from `opinions` where `user_id` = '$user_id'");

                while ($opin = mysqli_fetch_object($opinions)):
                    $prod = mysqli_query($connect, "select * from `products` where `product_id` = '$opin->product_id'");
                    $prod = mysqli_fetch_object($prod); ?>
                    <tr>
                        <td><?= $prod->name ?></td>
                        <td><?= $opin->rate ?></td>
                        <td><?= $opin->review ?></td>
                        <td>
                            <a class="btn btn-dark btn-sm" href="product.php?product_id=<?= $opin->product_id ?>">Страница</a>
                        </td>
                        <td>
                            <a class="btn bg-white border-dark btn-sm"
                               href="updOpinForm.php?user_id=<?= $opin->user_id ?>&product_id=<?= $opin->product_id ?>">Изменить</a>
                        </td>
                        <td>
                            <a class="btn btn-danger btn-sm"
                               href="engine/deleteOpin.php?user_id=<?= $opin->user_id ?>&product_id=<?= $opin->product_id ?>">Удалить</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade show active" id="users">
            <div class="container-fluid w-25">
                <a class="btn btn-dark w-100" href="addUserForm.php">Добавить пользователя</a>
            </div>
            <table class="table table-striped ">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Логин</th>
                    <th scope="col">Почта</th>
                    <th scope="col">Роль</th>
                    <th scope="col">Отзывов всего</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $users = mysqli_query($connect, "SELECT * FROM `users`");
                while ($user = mysqli_fetch_object($users)):
                    if ($user->user_id == $admin->user_id) {
                        continue;
                    }
                    ?>
                    <tr>
                        <td><?= $user->user_id ?></td>
                        <td><?= $user->login ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->role ?></td>
                        <td><?= $user->opin_count ?></td>
                        <td>
                            <a class="btn btn-dark btn-sm" href="user.php?user_id=<?= $user->user_id ?>">Страница</a>
                        </td>
                        <td>
                            <a class="btn text-dark bg-white border-dark btn-sm"
                               href="updUserForm.php?user_id=<?= $user->user_id ?>">Изменить</a>
                        </td>
                        <td>
                            <a class="btn btn-danger btn-sm"
                               href="engine/deleteUser.php?user_id=<?= $user->user_id ?>">Удалить</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="products">
            <div class="container-fluid w-25">
                <a class="btn btn-dark w-100" href="addProductForm.php">Добавить товар</a>
            </div>
            <table class="table table-striped ">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Название</th>
                    <th scope="col">Рейтинг</th>
                    <th scope="col">Отзывов всего</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $products = mysqli_query($connect, "SELECT * FROM `products`");
                while ($product = mysqli_fetch_object($products)): ?>
                    <tr>
                        <td><?= $product->product_id ?></td>
                        <td><?= $product->name ?></td>
                        <td><?= roundRating($product->rating) ?></td>
                        <td><?= $product->opin_count ?></td>
                        <td>
                            <a class="btn btn-dark btn-sm"
                               href="product.php?product_id=<?= $product->product_id ?>">Страница</a>
                        </td>
                        <td>
                            <a class="btn border-dark bg-white btn-sm"
                               href="updProdForm.php?product_id=<?= $product->product_id ?>">Изменить</a>
                        </td>
                        <td>
                            <a class="btn btn-danger btn-sm"
                               href="engine/deleteProduct.php?product_id=<?= $product->product_id ?>">Удалить</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
    $('#tab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
</script>
</body>

