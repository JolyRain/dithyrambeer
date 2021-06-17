<?php
$title = "Личный кабинет";
require "header.php";

?>
<body>
<?php showHeader(); ?>

<div class="container w-75">
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <p class="card-text mb-auto"><b>Никнейм</b>: user_name</p>
            <p class="card-text mb-auto"><b>Почта</b>: pochta@pochta.ru</p>
            <p class="card-text mb-auto"><b>Роль</b>: user</p>
            <p class="card-text mb-auto"><b>Уровень</b>: Мудрейший</p>
            <p class="card-text mb-auto"><b>Отзывов</b>: opinions_amount</p>
        </div>
    </div>
</div>

<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
    <h1 class="display-6 fw-normal">Мои отзывы</h1>
</div>

<?php for ($i = 0; $i <= 10; $i++) {

echo "<div class=\"container w-75\">
    <div class=\"row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative\">
    <div class=\"col p-4 d-flex flex-column position-static\">
    <h3 class=\"mb-3\">Пиво \"Два бобра\"</h3>
    <h5 class=\"mb-3\">Оценка - 4/5</h5>
    <p class=\"card-text mb-auto font-weight-light\">User: beer_lover777</p>
    <p class=\"card-text mb-auto\">Очень вкусно-очень приятно</p>
    <a href=\"#\" class=\"stretched-link\">continue reading</a>
</div>

</div>
</div>"; }?>



</body>
