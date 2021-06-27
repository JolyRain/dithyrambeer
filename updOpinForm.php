<?php
session_start();
$title = "Изменить отзыв";
require "header.php";
?>
<link rel="stylesheet" href="css/style.css">

<script src="js/main.js">
    count_symbols()
    enter_label()
    leave_label()
</script>

<body class="text-center">

<?php
require 'engine/scripts.php';
showHeader(session_on());
require 'engine/connect.php';
global $connect;

$product_id = $_GET['product_id'];
$user_id = $_GET['user_id'];
$product = mysqli_query($connect, "select * from `products` where `products`.`product_id`='$product_id'");
$product = mysqli_fetch_object($product);

$opinion = mysqli_query($connect, "select * from `opinions` where `user_id` = '$user_id' and `product_id` = '$product_id'");
$opinion = mysqli_fetch_object($opinion);
?>

<div class="container w-50">
    <div class="container w-75 mb-3">
        <a href="product.php?product_id=<?= $product->product_id ?>"
           class="fs-4 w-75 fw-normal text-white rounded-3 btn btn-dark"><?= $product->name ?></a>
    </div>
    <form class="w-100" method="post"
          action="engine/updateOpin.php?product_id=<?= $product_id ?>&user_id=<?= $user_id ?>">
        <div class="form-group">
            <label for="rate-div">Ваша оценка</label>
            <div class="rating" id="rate-div">
                <?php
                require 'engine/defaults.php';
                $name = 'rate';
                global $MAX_RATING;
                for ($value = $MAX_RATING; $value > 0; $value--): ?>
                    <input type="radio" class="radio" onclick="click_radio(this)" name="<?= $name ?>"
                           value="<?= $value ?>"
                           id="<?= $name . $value ?>" <?= $value == $opinion->rate ? 'checked' : ''; ?>>
                    <label onmouseenter="enter_label(this)" onmouseleave="leave_label()" for="<?= $name . $value ?>"
                           class="unselectable">☆</label>
                <?php endfor; ?>
            </div>
            <p class="p-1 text-dark " id="rate"><?= $opinion->rate . '/' . $MAX_RATING ?></p>
        </div>
        <div class="form-group">
            <label for="review">Ваш отзыв</label>
            <textarea type="text" class="form-control" oninput="count_symbols(this)" name="review" id="review"
                      rows="10"><?= $opinion->review ?></textarea>
        </div>
        <p class="hidden p-1 text-danger" id="symb_count">Максимум 1000 символов</script></p>
        <div class="form-group">
            <button class="btn mt-3 btn-lg btn-dark w-50" type="submit" id="send_opin">Изменить отзыв</button>
        </div>

    </form>
</div>


</body>