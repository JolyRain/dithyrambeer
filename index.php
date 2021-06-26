<?php
session_start();
$title = "Dithyramb";
require "header.php";
require 'engine/scripts.php';
require 'engine/defaults.php';
require 'engine/connect.php';
global $connect, $MAX_RATING;
?>
<link rel="stylesheet" href="css/style.css">

<body>
<?php
showHeader(session_on());
//if (session_on()) {
//    ?>
<!---->
<!--    <div class="container-fluid w-25 text-center">-->
<!--        <a class="btn btn-dark w-50 mb-4" href="addProductForm.php">Добавить товар</a>-->
<!--    </div>-->
    <?php
//}
//?>

<div class="container ">
    <div class="row row-cols-3 row-cols-md-3 mb-3 text-center">
        <?php
        $products = mysqli_query($connect, "SELECT * FROM `products`");
        while ($product = mysqli_fetch_object($products)): ?>
            <div class="col ">
                <div class="card card-link border border-secondary rounded mb-4  text-center">
                    <div class="card-header  text-white bg-dark">
                        <h5 class="m-0 fw-normal"><?= $product->name ?></h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mt-3 mb-4">
                            <li class="fw-normal fs-5">Рейтинг - <?= roundRating($product->rating) . '/' . $MAX_RATING ?></li>
                            <li  class="fw-normal fs-5">Всего отзывов - <?= $product->opin_count ?></li>
                        </ul>
                    </div>
                    <a href="product.php?product_id=<?= $product->product_id ?>"
                       class="link-dark stretched-link"></a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

</body>
