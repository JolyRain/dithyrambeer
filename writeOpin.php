<?php
$title = "Отзыв";
require "header.php";
?>

<body class="text-center">

<?php showHeader(); ?>
<div class="container w-50">
    <h1 class="h3 mb-3 fw-normal">Пиво Пивной угар</h1>
    <form class="w-100">
        <div class="form-group">
            <label for="rate-div">Ваша оценка</label>
            <div class="rating" id="rate-div">
                <?php
                require 'vendor/rating.php';
                print_star();
                ?>
            </div>
            <p class="p-1 text-dark " id="rate"></p>
        </div>
        <div class="form-group">
            <label for="review">Ваш отзыв</label>
            <textarea class="form-control" id="review" rows="10"></textarea>
        </div>
        <p class="hidden p-1 text-danger" id="symb_count">Максимум 1000 символов</script></p>
        <div class="form-group">
            <button class="btn mt-3 btn-lg btn-dark w-50" type="submit" id="send_opin">Оставить отзыв</button>
        </div>

    </form>
</div>

<script>
    count_symbols()
    enter_label()
    leave_label()
</script>

</body>