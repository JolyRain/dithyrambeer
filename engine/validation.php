<?php
require 'connect.php';
global $connect;

function isEqualPass($pass, $passConfirm): bool
{
    return $pass == $passConfirm;
}

function isValidEmail($email): bool
{
    return preg_match("[[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+]", $email);
}

function isUniqLogin($login): bool
{
    global $connect;
    $result = mysqli_query($connect, "select 1 from `users` where `users`.`login` = '$login'");
    return $result->num_rows == 0;
}

function isUniqEmail($email): bool
{
    global $connect;
    $result = mysqli_query($connect, "select 1 from `users` where `users`.`email` = '$email'");
    return $result->num_rows == 0;
}

function isUniqProd($prodName): bool
{
    global $connect;
    $result = mysqli_query($connect, "select 1 from `products` where `products`.`name` = '$prodName'");
    return $result->num_rows == 0;
}

function signupMessage($email, $login, $pass, $passConfirm): string
{
    if (emptyFields($email, $login, $pass, $passConfirm)) {
        return 'Заполните все поля';
    }

    if (!isValidEmail($email)) {
        return 'Неверный формат почты';
    } elseif (!isUniqEmail($email)) {
        return 'Пользователь с такой почтой уже существует';
    } elseif (!isUniqLogin($login)) {
        return 'Пользователь с таким логином уже существует';
    } elseif (!isEqualPass($pass, $passConfirm)) {
        return 'Пароли не совпадают';
    } else {
        return 'Вы успешно зарегистрированы!';
    }
}

function emptyFields($email, $login, $pass, $passConfirm): bool
{
    return isEmptyField($email) or isEmptyField($login) or isEmptyField($pass) or isEmptyField($passConfirm);
}

function isEmptyField($field): bool
{
    $field = filter_var($field, FILTER_SANITIZE_STRING);
    return strlen($field) == 0;
}


function signupValidate($email, $login, $pass, $passConfirm): bool
{
    return isValidEmail($email) and isUniqLogin($login) and isUniqEmail($email) and isEqualPass($pass, $passConfirm)
        and !emptyFields($email, $login, $pass, $passConfirm);
}








