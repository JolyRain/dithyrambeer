<?php
$title = "Отзыв";
require "header.php";
?>
<link rel="stylesheet" href="css/style.css">


<script src="js/main.js">
    count_symbols()
    enter_label()
    leave_label()
</script>

<body class="text-center">

<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="index.php"
           class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark fs-4 text-decoration-none">
            Dithyramb</a>
        <ul class="nav nav-pills\">
            <a href="signin.php" class="nav-link active text-white bg-dark">Войти</a>
        </ul>
        <ul class="nav nav-pills ">
            <a href="signup.php" class="nav-link text-dark">Регистрация</a>
        </ul>
    </header>
</div>
<?php
require 'vendor/connect.php';
global $connect;

$product_id = $_GET['product_id'];
$user_id = $_GET['user_id'];
$product = mysqli_query($connect, "select * from `products` where `products`.`product_id`='$product_id'");
$product = mysqli_fetch_object($product);
?>


<div class="container w-50">
    <h1 class="h3 mb-3 fw-normal"><?=$product->name?></h1>
    <form class="w-100" method="post" action="vendor/addOpin.php?product_id=<?=$product_id?>&user_id=<?=$user_id?>">
        <div class="form-group">
            <label for="rate-div">Ваша оценка</label>
            <div class="rating" id="rate-div">
                <?php
                require 'vendor/ratingStars.php';
                ?>
            </div>
            <p class="p-1 text-dark " id="rate"></p>
        </div>
        <div class="form-group">
            <label for="review">Ваш отзыв</label>
            <textarea type="text" class="form-control" oninput="count_symbols(this)" name="review" id="review" rows="10"></textarea>
        </div>
        <p class="hidden p-1 text-danger" id="symb_count">Максимум 1000 символов</script></p>
        <div class="form-group">
            <button class="btn mt-3 btn-lg btn-dark w-50" type="submit" id="send_opin">Оставить отзыв</button>
        </div>

    </form>
</div>


</body>