<?php
session_start();
$title = "Войти";
require "header.php";
require 'engine/scripts.php';
?>
<link rel="stylesheet" href="css/style.css">
<body class="text-center">
<?php showHeader(session_on()) ?>
<div class="container w-25">
    <form class="" method="post" action="engine/auth.php">
        <h1 class="h3 mb-3 fw-normal">Diphyramb</h1>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="login" id="login" placeholder="name@example.com">
            <label for="login">Логин</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
            <label for="pass">Пароль</label>
        </div>
        <?php if (array_key_exists('message', $_SESSION) and array_key_exists('msg-color', $_SESSION)): ?>
            <div class="form-floating mb-3">
                <p class="border <?= $_SESSION['msg-color'] ?> text-dark"><?= $_SESSION['message'] ?></p>
            </div>
            <?php unset($_SESSION['message']); endif; ?>
        <button class="btn btn-lg btn-dark w-100" type="submit">Войти</button>
        <p class="mt-3 mb-3 ">У вас еще нет аккаунта? <a class="text-dark" href="signup.php">Зарегистрироваться!</a></p>
    </form>
</div>

</body>
