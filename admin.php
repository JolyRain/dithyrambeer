<?php
$title = "Личный кабинет";
require "header.php";

?>

<body>
<?php showHeader(); ?>

<div class="container w-75">
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <p class="card-text mb-auto"><b>Юзер</b>: beer_lover777</p>
            <p class="card-text mb-auto"><b>Пошта</b>: beeeer@beer.com</p>
            <p class="card-text mb-auto"><b>Статус</b> - нормис</p>
            <p class="card-text mb-auto"><b>Уровень</b> - всезнающий хуй</p>
            <p class="card-text mb-auto"><b>Отзывов</b> - дохуя</p>

        </div>
    </div>
</div>


<div class="container-fluid w-75">
    <ul class="nav nav-tabs justify-content-center" id="product">
        <li class="nav-item">
            <a class="nav-link active h4 fw-normal" href="#opinions">Мои отзывы</a>
        </li>
        <li class="nav-item">
            <a class="nav-link h4 fw-normal" href="#users">Пользователи</a>
        </li>
        <li class="nav-item">
            <a class="nav-link h4 fw-normal" href="#products">Товары</a>
        </li>
    </ul>
    <div class="tab-content p-3 align-content-lg-center">
        <div class="tab-pane fade show active" id="opinions">
            <h2 class="h4 mb-3">Мои отзывы</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, in et nulla impedit, mollitia eos quae
                inventore, minus molestiae est consequuntur nobis similique repudiandae reprehenderit fugit cumque voluptatum
                laudantium tempore.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi consequatur deleniti animi, voluptates expedita
                incidunt dignissimos fugiat repellendus dolorem ut corrupti sit libero nemo est iusto saepe, facilis rerum
                quam.</p>
        </div>
        <div class="tab-pane fade" id="users">
            <h2 class="h4 mb-3">Пользователи</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae soluta qui labore quas repudiandae illum
                dolore eum incidunt, quam aut perferendis autem iusto repellat ut nesciunt ullam dignissimos recusandae quo.
            </p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque atque incidunt modi quam laboriosam velit sit
                corporis veritatis optio voluptatum, officia quis quas debitis, commodi nisi, reprehenderit ratione nesciunt
                asperiores.</p>
        </div>
        <div class="tab-pane fade" id="products">
            <h2 class="h4 mb-3">Описание товара</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt accusantium sapiente animi suscipit magnam ex
                quasi nihil quas voluptas! Eius minus incidunt iure deserunt dolor praesentium. Ullam aperiam optio omnis!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, cupiditate! Aspernatur accusamus dolores
                tenetur iure rerum ut quibusdam nisi aliquam facilis impedit. Sed amet nemo, veniam in placeat eveniet illo!
            </p>
        </div>
    </div>
</div>


<script>
    $('#product a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
</script>
</body>

