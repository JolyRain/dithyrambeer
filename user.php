<?php
$title = "Личный кабинет";
require "header.php";

?>
<body>
<?php showHeader(); ?>

<div class="container w-75">
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <p class="card-text mb-auto"><b>Логин</b>: beer_lover777</p>
            <p class="card-text mb-auto"><b>Почта</b>: beeeer@beer.com</p>
            <p class="card-text mb-auto"><b>Роль</b> - нормис</p>
            <p class="card-text mb-auto"><b>Уровень</b> - всезнающий хуй</p>
            <p class="card-text mb-auto"><b>Отзывов всего</b> - дохуя</p>
        </div>
    </div>
</div>

<div class=" text-center">
    <h1 class="display-6 fw-normal">Мои отзывы</h1>
</div>

<div class="p-3 align-content-lg-center">
    <div class="container">
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

