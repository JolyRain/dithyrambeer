<?php
$title = "Личный кабинет";
require "header.php";

?>

<body>
<?php showHeader(); ?>

<div class="container w-25">
    <div class="border rounded  mb-4 shadow-sm  position-relative">
        <div class=" p-4 text-center">
            <p class="card-text mb-auto"><b>Логин</b>: beer_lover777</p>
            <p class="card-text mb-auto"><b>Почта</b>: beeeer@beer.com</p>
            <p class="card-text mb-auto"><b>Роль</b> - нормис</p>
            <p class="card-text mb-auto"><b>Уровень</b> - всезнающий хуй</p>
            <p class="card-text mb-auto"><b>Отзывов всего</b> - дохуя</p>
        </div>
    </div>
</div>


<div class="container-fluid w-75">
    <ul class="nav nav-tabs justify-content-center" id="tab">
        <li class="nav-item">
            <a class="nav-link text-dark h4 fw-normal" href="#opinions">Мои отзывы</a>
        </li>
        <li class="nav-item">
            <a class="nav-link h4 text-dark active fw-normal" href="#users">Пользователи</a>
        </li>
        <li class="nav-item">
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
                <?php                 ?>
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
        <div class="tab-pane fade show active" id="users">
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
                require 'vendor/connect.php';
                $users = mysqli_query($connect, "SELECT * FROM `users`");
                while ($user = mysqli_fetch_object($users)) {
                    ?>
                    <tr>
                        <td><?= $user->user_id ?></td>
                        <td><?= $user->login ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->role ?></td>
                        <td><a class="btn btn-dark btn-sm" href="user.php">Страница</a></td>
                        <td><a class="btn btn-danger btn-sm" href="vendor/deleteUser.php">Удалить</a></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="products">
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
                        <td><?= $product->name?></td>
                        <td><?= $product->rating?></td>
                        <td><?= $product->opin_count?></td>
                        <td><a class="btn btn-dark btn-sm" href="product.php">Страница</a></td>
                        <td><a class="btn btn-danger btn-sm" href="vendor/deleteProduct.php">Удалить</a></td>
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

