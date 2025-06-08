<?php
if (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {

    header("Location: index.php");
    exit();
}

if (!empty($_POST)) {
    require __DIR__ . '/auth.php';

    $login = $_POST['login'] ? $_POST['login'] : '';
    $password = $_POST['password'] ? $_POST['password'] : '';

    if (checkAuth($login, $password)) {
        setcookie('login', $login, 0, '/');
        setcookie('pass', $password, 0, '/');
        header('Location: /index.php');
    } else {
        $error = 'Ошибка автроизации';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if (isset($error)) : ?>
        <p style="color: red;">
            <?= $error ?>
        </p>
    <?php endif; ?>
    <?php if (empty($_COOKIE)) : ?>
        <form action="/login.php" method="POST">
            <p>
                Имя пользователя: <input type="text" name="login" id="login">
            </p>
            <p>
                Пароль: <input type="text" name="password" id="password">
            </p>
            <p>
                <button type="submit">Войти</button>
            </p>
        </form>
    <?php else :
        header('Location: /index.php');
    endif; ?>
</body>

</html>