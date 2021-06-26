<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>
        <?php
        global $title;
        echo $title ?>
    </title>
</head>
<?php
function showHeader(bool $session_on)
{
    if ($session_on) {
        $user_id = $_SESSION['user']['user_id'];
        $label = "Выйти";
        $path = "engine/out.php";
        $labelActive = "Личный кабинет";
        $pathActive = $_SESSION['user']['role'] == 'admin' ? "admin.php?user_id=" . $user_id : "user.php?user_id=" . $user_id;
    } else {
        $label = "Регистрация";
        $path = "signup.php";
        $labelActive = "Войти";
        $pathActive = "signin.php";
    }
    ?>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="index.php"
               class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark fs-4 text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                     class="bi bi-house-fill mx-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                          d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"></path>
                    <path fill-rule="evenodd"
                          d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"></path>
                </svg>
                Dithyramb
            </a>
            <ul class="nav nav-pills\">
                <a href="<?= $pathActive ?>" class="nav-link active text-white btn btn-dark"><?= $labelActive ?></a>
            </ul>
            <ul class="nav nav-pills ">
                <a href="<?= $path ?>" class="nav-link text-dark"><?= $label ?></a>
            </ul>
        </header>
    </div>
    <?php
}

?>
