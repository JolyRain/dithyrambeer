<?php
session_start();
$title = "Новый товар";
require "header.php";
require 'engine/scripts.php';
if (!isAdminSession()) {
    header("Location: index.php");
}
?>
<link rel="stylesheet" href="css/style.css">

<body class="text-center">
<?php
showHeader(session_on());
$user = $_SESSION['user'];
?>

<div class="container w-50">
    <div class="container w-75 mb-3">
        <h6 class="fs-4 w-75 fw-normal text-white rounded-3 w-100 py-1 btn-dark">Новый товар</h6>
    </div>
    <form class="w-100" method="post" action="engine/addProduct.php?user_id=<?=$user['user_id']?>">
        <div class="form-group mb-3">
            <label for="prod_name" class="mb-1">Название</label>
            <input type="text" class="form-control text-center" name="prod_name" id="prod_name">
        </div>
        <div class="form-group mb-3">
            <label for="rate-div">Ваша оценка</label>
            <div class="rating" id="rate-div">
                <?php
                require 'engine/defaults.php';
                $name = 'rate';
                global $MAX_RATING;
                for ($value = $MAX_RATING; $value > 0; $value--): ?>
                    <input type="radio" class="radio" onclick="click_radio(this)" name="<?= $name ?>" value="<?= $value ?>"
                           id="<?= $name . $value ?>">
                    <label onmouseenter="enter_label(this)" onmouseleave="leave_label(this)" for="<?= $name . $value ?>"
                           class="unselectable">☆</label>
                <?php endfor; ?>
            </div>
            <p class="p-1 text-dark " id="rate"></p>
        </div>
        <div class="form-group mb-3">
            <label for="review">Ваш отзыв</label>
            <textarea class="form-control" name="review" id="review" rows="10"></textarea>
        </div>
        <p class="hidden p-1 text-danger" id="symb_count">Максимум 1000 символов</script></p>
        <?php
        if (array_key_exists('message', $_SESSION) and array_key_exists('msg-color', $_SESSION)): ?>
            <div class="form-group mb-3">
                <p class="border <?=$_SESSION['msg-color']?> text-dark"><?=$_SESSION['message']?></p>
            </div>
            <?php unset($_SESSION['message']); endif;?>
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