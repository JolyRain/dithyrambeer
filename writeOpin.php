<?php
$title = "Отзыв";
require "header.php";
?>

<body class="text-center">

<?php showHeader(); ?>
<div class="container signin">

<form class="w-25" method="post" action="registration.php">
    <h1 class="h3 mb-3 fw-normal">Зарегистрируйтесь</h1>
    <div class="form-floating mb-3">
        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
        <label for="email">Email</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="login" id="login" placeholder="name@example.com">
        <label for="login">Login</label>
    </div>
    <div class="form-floating mb-3">
        <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
        <label for="floatingPassword">Password</label>
    </div>
    <button class="btn btn-lg btn-dark w-100" type="submit">Sign up</button>
    <p class="mt-3 mb-3 ">У вас уже есть аккаунт? <a class="text-dark" href="signin.php">Войти!</a></p>
</form>
</div>

</body>