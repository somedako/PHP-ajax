<?php
$username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
$password = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

$error = '';
if (strlen($username) <= 3) {
    $error = 'Введите имя';
} elseif (strlen($email) <= 3) {
    $error = 'Введите email';
} elseif (strlen($login) <= 3) {
    $error = 'Введите логин';
} elseif (strlen($password) <= 3) {
    $error = 'Введите пароль';
}

if ($error != '') {
    echo $error;
    exit();
}

$hash = password_hash($password, PASSWORD_DEFAULT);

require_once '../connection.php';
$sql = 'INSERT INTO users(name, email, login, pass) VALUES(?, ?, ?, ?)';
$query = $pdo->prepare($sql);
$query->execute([$username, $email, $login, $hash]);

echo 'Готово';