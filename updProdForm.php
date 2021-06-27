<?php
session_start();
$title = "Изменить товар";
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
require 'engine/connect.php';
global $connect;
$product_id = $_GET['product_id'];
$product = mysqli_query($connect, "select * from `products` where `product_id` = '$product_id'");
$product = mysqli_fetch_object($product);
?>

<div class="container w-50">
    <form class="w-100" method="post" action="engine/updProduct.php?product_id=<?=$product_id?>">
        <div class="form-group mb-3">
            <label for="prod_name" class="mb-1">Название</label>
            <input type="text" class="form-control text-center" name="prod_name" id="prod_name" value="<?= $product->name ?>">
        </div>
        <?php
        if (array_key_exists('message', $_SESSION) and array_key_exists('msg-color', $_SESSION)): ?>
            <div class="form-group mb-3">
                <p class="border <?=$_SESSION['msg-color']?> text-dark"><?=$_SESSION['message']?></p>
            </div>
            <?php unset($_SESSION['message']); endif;?>
        <div class="form-group">
            <button class="btn mt-3 btn-lg btn-dark w-50" type="submit" id="send_opin">Изменить товар</button>
        </div>
    </form>
</div>
</body>