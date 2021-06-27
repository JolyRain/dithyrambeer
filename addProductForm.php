<?php
session_start();
$title = "Новый товар";
require "header.php";
require 'engine/scripts.php';
if (!isAdminSession()) {
    header("Location: index.php");
    die();
}
?>
<link rel="stylesheet" href="css/style.css">

<body class="text-center">
<?php
showHeader(session_on());
$admin = $_SESSION['user'];
?>

<div class="container w-50">
    <div class="container w-75 mb-3">
        <h6 class="fs-4 w-75 fw-normal text-white rounded-3 w-100 py-1 btn-dark">Новый товар</h6>
    </div>
    <form class="w-100" method="post" action="engine/addProduct.php?user_id=<?=$admin['user_id']?>">
        <div class="form-group mb-3">
            <label for="prod_name" class="mb-1">Название</label>
            <input type="text" class="form-control text-center" name="prod_name" id="prod_name">
        </div>
        <?php
        if (array_key_exists('message', $_SESSION) and array_key_exists('msg-color', $_SESSION)): ?>
            <div class="form-group mb-3">
                <p class="border <?=$_SESSION['msg-color']?> text-dark"><?=$_SESSION['message']?></p>
            </div>
            <?php unset($_SESSION['message']); endif;?>
        <div class="form-group">
            <button class="btn mt-3 btn-lg btn-dark w-50" type="submit" id="send_opin">Добавить товар</button>
        </div>
    </form>
</div>

</body>