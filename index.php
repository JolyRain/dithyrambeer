<?php
$title = "Dithyramb";
require "header.php";
?>

<body>
<?php
showHeader();
?>
<div class="container w-75">
    <div class="container-fluid w-25">
        <a class="btn btn-dark w-100 mb-4 hidden" href="forms/addProductForm.php">Добавить товар</a>
    </div>
    <?php
    require 'vendor/defaults.php';
    require 'vendor/connect.php';
    global $connect, $MAX_RATING;
    $products = mysqli_query($connect, "SELECT * FROM `products`");
    while ($product = mysqli_fetch_object($products)) {
        ?>
        <div class="border rounded  mb-4 shadow-sm  position-relative">
            <div class="p-4">
                <h3 class="mb-3"><?= $product->name ?></h3>
                <h5 class="mb-3">Рейтинг - <?= $product->rating . '/' . $MAX_RATING ?></h5>
                <h5 class="mb-3">Отзывов всего - <?= $product->opin_count ?></h5>
                <p class="card-text mb-auto font-weight-light">User: beer_lover777</p>
                <p class="card-text mb-auto">Очень вкусно-очень приятно обожаю пиво прям пиздец пил бы и пил серьезно
                    пиво
                    это моя жизнь нахуй сколько литров утекло с тех пор как я начал пить пиво обожаю готов умереть ради
                    него</p>
                <div class="container w-25 text-center">
                    <a href="product.php" class="link-dark w-100">Посмотреть товар</a>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
</body>