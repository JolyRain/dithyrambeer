<?php
$title = "Личный кабинет";
require "header.php";

?>

<body>
<?php showHeader();
require 'vendor/connect.php';
require 'vendor/defaults.php';
global $connect;

$_GET['id'] = 26;

$user_id = $_GET['id'];

$admin = mysqli_query($connect, "select * from `users` where `user_id` = '$user_id'");
$admin = mysqli_fetch_object($admin);

?>

<div class="container w-25">
    <div class="border rounded  mb-4 shadow-sm  position-relative">
        <div class=" p-4 text-center">
            <p class="card-text mb-auto"><b>Логин</b>: <?= $admin->login ?></p>
            <p class="card-text mb-auto"><b>Почта</b>: <?= $admin->email ?></p>
            <p class="card-text mb-auto"><b>Роль</b>: <?= $admin->role ?></p>
            <p class="card-text mb-auto"><b>Уровень</b>: <?= getUserLevel($admin->opin_count) ?></p>
            <p class="card-text mb-auto"><b>Отзывов всего</b>: <?= $admin->opin_count ?></p>
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
                    <th scope="col">
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $opinions = mysqli_query($connect, "select * from `opinions` where `user_id` = '$user_id'");

                while ($opin = mysqli_fetch_object($opinions)) {
                    $prod = mysqli_query($connect, "select * from `products` where `product_id` = '$opin->product_id'");
                    $prod = mysqli_fetch_object($prod);
                    ?>
                    <tr>
                        <td><?=$prod->name?></td>
                        <td><?= $opin->rate ?></td>
                        <td><?= $opin->review ?></td>
                        <td><a class="btn btn-dark btn-sm" href="product.php?product_id=<?= $opin->product_id ?>">Страница</a>
                        </td>
                        <td>
                            <a class="btn btn-danger btn-sm"
                               href="vendor/deleteOpin.php?user_id=<?= $opin->user_id ?>&product_id=<?= $opin->product_id ?>">Удалить</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade show active" id="users">
            <div class="container-fluid w-25">
                <a class="btn btn-dark w-100" href="forms/addUserForm.php">Добавить пользователя</a>
            </div>
            <table class="table table-striped ">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Логин</th>
                    <th scope="col">Почта</th>
                    <th scope="col">Роль</th>
                    <th scope="col">
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $users = mysqli_query($connect, "SELECT * FROM `users`");
                while ($user = mysqli_fetch_object($users)) {
                    if ($user->user_id == $admin->user_id) {
                        continue;
                    }
                    ?>
                    <tr>
                        <td><?= $user->user_id ?></td>
                        <td><?= $user->login ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->role ?></td>
                        <td><a class="btn btn-dark btn-sm" href="user.php?id=<?= $user->user_id ?>">Страница</a></td>
                        <td>
                            <a class="btn btn-danger btn-sm" href="vendor/deleteUser.php?id=<?= $user->user_id ?>">Удалить</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="products">
            <div class="container-fluid w-25">
                <a class="btn btn-dark w-100" href="forms/addProductForm.php">Добавить товар</a>
            </div>
            <table class="table table-striped ">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Название</th>
                    <th scope="col">Рейтинг</th>
                    <th scope="col">Отзывов всего</th>
                    <th scope="col">
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $products = mysqli_query($connect, "SELECT * FROM `products`");
                while ($product = mysqli_fetch_object($products)) {
                    ?>
                    <tr>
                        <td><?= $product->product_id ?></td>
                        <td><?= $product->name ?></td>
                        <td><?= $product->rating ?></td>
                        <td><?= $product->opin_count ?></td>
                        <td><a class="btn btn-dark btn-sm" href="product.php">Страница</a></td>
                        <td><a class="btn btn-danger btn-sm" href="vendor/deleteProduct.php?prod_id=<?= $product->product_id ?>">Удалить</a></td>
                    </tr>
                    <?php
                }
                ?>
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

