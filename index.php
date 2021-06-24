<?php
session_start();
$title = "Dithyramb";
require "header.php";
require 'vendor/scripts.php';
require 'vendor/defaults.php';
require 'vendor/connect.php';
global $connect, $MAX_RATING;
?>
<link rel="stylesheet" href="css/style.css">

<body>
<?php
showHeader(session_on());
?>

<div class="container-fluid w-25 text-center">
    <a class="btn btn-dark w-50 mb-4" href="addProductForm.php">Добавить товар</a>
</div>
<div class="container ">


    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
        <?php
        if (session_on()) {
            ?>

            <?php
        }
        $products = mysqli_query($connect, "SELECT * FROM `products`");
        while ($product = mysqli_fetch_object($products)) {
            ?>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="p-4">
                        <h3 class="mb-3"><?= $product->name ?></h3>
                        <h5 class="mb-3">Рейтинг - <?= $product->rating . '/' . $MAX_RATING ?></h5>
                        <h5 class="mb-3">Отзывов всего - <?= $product->opin_count ?></h5>
                        <a href="product.php?product_id=<?= $product->product_id ?>"
                           class="link-dark stretched-link"></a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>

</body>