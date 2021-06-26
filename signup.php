<?php
session_start();
$title = "Регистрация";
require "header.php";
require 'engine/scripts.php';
?>
<link rel="stylesheet" href="css/style.css">

<body class="text-center">
<?php showHeader(session_on()) ?>
    <div class="container w-25">
        <form class="" method="post" action="engine/addUser.php">
            <h1 class="h3 mb-3 fw-normal">Регистрация</h1>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="email" id="email" placeholder="name@example.com">
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
                <input type="password" class="form-control" name="pass-confirm" id="pass-confirm"
                       placeholder="Password">
                <label for="pass-confirm">Повторите пароль</label>
            </div>
            <?php if (array_key_exists('message', $_SESSION)): ?>
                <div class="form-floating mb-3">
                    <p class="border border-danger  text-dark"><?= $_SESSION['message'] ?></p>
                </div>
                <?php unset($_SESSION['message']); endif; ?>
            <button class="btn btn-lg btn-dark w-100" type="submit">Зарегистрироваться</button>
            <p class="mt-3 mb-3 ">У вас уже есть аккаунт? <a class="text-dark" href="signin.php">Войти!</a></p>
        </form>
    </div>

</body>

