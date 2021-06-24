<?php
$title = "Новый товар";
require "header.php";
if (!session_on()) {
    header("Location: index.php");
}
?>
<link rel="stylesheet" href="css/style.css">

<body class="text-center">
<?php
showHeader(session_on());
?>
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

<div class="container w-50">
    <h1 class="h3 mb-3 fw-normal">Новый товар</h1>
    <form class="w-100" method="post" action="vendor/addProduct.php?user_id=<?= 5 ?>">
        <div class="form-group mb-3">
            <label for="prod_name" class="mb-1">Название</label>
            <input type="text" class="form-control text-center" name="prod_name" id="prod_name">
        </div>
        <div class="form-group mb-3">
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
            <textarea class="form-control" name="review" id="review" rows="10"></textarea>
        </div>
        <p class="hidden p-1 text-danger" id="symb_count">Максимум 1000 символов</script></p>
        <div class="form-group">
            <button class="btn mt-3 btn-lg btn-dark w-50" type="submit" id="send_opin">Добавить товар</button>
        </div>

    </form>
</div>

<script src="js/main.js">
    count_symbols()
    enter_label()
    leave_label()
</script>

</body>