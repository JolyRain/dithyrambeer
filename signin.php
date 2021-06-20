<?php
$title = "Войти";
require "header.php";
?>

<body class="text-center">
<div class="container signin ">

    <form class="w-25">
        <h1 class="h3 mb-3 fw-normal">Diphyramb</h1>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Логин</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Пароль</label>
        </div>
        <button class="btn btn-lg btn-dark w-100" type="submit">Войти</button>
        <p class="mt-3 mb-3 ">У вас еще нет аккаунта? <a class="text-dark" href="signup.php">Зарегистироваться!</a></p>
    </form>
</div>

</body>
