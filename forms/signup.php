<?php
$title = "Регистрация";
require "../header.php";
?>
<link rel="stylesheet" href="../css/style.css">

<body class="text-center">
<div class="container signin" >

<form class="w-25" method="post" action="../vendor/addUser.php">
    <h1 class="h3 mb-3 fw-normal">Регистрация</h1>
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
        <label for="floatingPassword">Пароль</label>
    </div>
    <button class="btn btn-lg btn-dark w-100" type="submit">Зарегистрироваться</button>
    <p class="mt-3 mb-3 ">У вас уже есть аккаунт? <a class="text-dark" href="signin.php">Войти!</a></p>
</form>
</div>

</body>

