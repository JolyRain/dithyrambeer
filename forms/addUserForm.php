<?php
$title = "Добавить пользователя";
require "../header.php";
?>
<link rel="stylesheet" href="../css/style.css">

<body class="text-center">

<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="../index.php"
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

<div class="container w-25" >

    <form class="w-100" method="post" action="../vendor/addUser.php">
        <h1 class="h3 mb-3 fw-normal">Данные пользователя</h1>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
            <label for="email">Почта</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="login" id="login" placeholder="name@example.com">
            <label for="login">Логин</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
            <label for="pass">Пароль</label>
        </div>
        <div class="form-floating mb-3">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" id="user" value="user" checked>
                <label class="form-check-label" for="user">Пользователь</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" id="admin" value="admin">
                <label class="form-check-label" for="admin">Админ</label>
            </div>
        </div>

        <button class="btn btn-lg btn-dark w-100" type="submit">Добавить пользователя</button>
        <p class="mt-3 mb-3 text-success">Пользователь успешно добавлен!</p>
    </form>
</div>

</body>