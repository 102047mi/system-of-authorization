<?php
function checkAuth($login, $password)
{
    require __DIR__ . '/usersDB.php';

    foreach ($arrayUsers as $user) {
        if ($user['login'] == $login && $user['pass'] == $password) {
        }
    }

    return false;
}

function getUserLogin()
{
    $loginFromCoockie = $_COOKIE['login'] ?? '';
    $passFromCookie = $_COOKIE['pass'] ?? '';

    if (checkAuth($loginFromCoockie, $passFromCookie)) {
        return $loginFromCoockie;
    } else {
        return null;
    }
}
