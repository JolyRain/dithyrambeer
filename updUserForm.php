<?php
session_start();
$title = "Изменить данные пользователя";
require "header.php";
require 'engine/scripts.php';
if (!isAdminSession()) {
    header("Location: index.php");
    die();
}
?>
<link rel="stylesheet" href="css/style.css">

<body class="text-center">
<?php showHeader(session_on());
require 'engine/connect.php';
global $connect;
$user_id = $_GET['user_id'];
$user = mysqli_query($connect, "select * from `users` where `user_id` = '$user_id'");
$user = mysqli_fetch_object($user);
?>
<div class="container w-25">
    <form class="w-100" method="post" action="engine/updUser.php?user_id=<?=$user_id?>">
        <h1 class="h3 mb-3 fw-normal">Данные пользователя</h1>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="email" id="email" value="<?= $user->email ?>">
            <label for="email">Почта</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="login" id="login" value="<?= $user->login ?>">
            <label for="login">Логин</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="pass" id="pass">
            <label for="pass">Новый пароль</label>
        </div>
        <div class="form-floating mb-3">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" id="user" value="user"
                    <?= $user->role == 'user' ? 'checked' : '' ?>>
                <label class="form-check-label" for="user">Пользователь</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" id="admin"
                       value="admin" <?= $user->role == 'admin' ? 'checked' : '' ?>>
                <label class="form-check-label" for="admin">Админ</label>
            </div>
        </div>
        <button class="btn btn-lg btn-dark w-100" type="submit">Изменить данные</button>
        <?php
        if (array_key_exists('message', $_SESSION) and array_key_exists('msg-color', $_SESSION)): ?>
            <div class="form-floating mt-3">
                <p class="border <?= $_SESSION['msg-color'] ?> text-dark"><?= $_SESSION['message'] ?></p>
            </div>
            <?php unset($_SESSION['message']); endif; ?>
    </form>
</div>

</body>