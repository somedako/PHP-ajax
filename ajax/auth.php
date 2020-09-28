<?php
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
$password = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

$error = '';
if  (strlen($login) <= 3) {
    $error = 'Введите логин';
} elseif (strlen($password) <= 3) {
    $error = 'Введите пароль';
}

if ($error != '') {
    echo $error;
    exit();
}



require_once '../connection.php';
$sql = 'SELECT id, pass FROM users WHERE login = :login';
$query = $pdo->prepare($sql);
$query->execute(['login' => $login]);


$user = $query->fetch(PDO::FETCH_OBJ);

    if($user->id) {
        if (password_verify($password, $user->pass)) {
            setcookie('login', $login, time() + 3600 * 24 * 30, '/');
            echo 'Готово';
        } else {
            echo 'Неправильный логин или пароль';
        }
    } else {
        echo 'Такого пользователя не существует';
    }





