<?php
$user = 'mysql';
$pass = 'mysql';
$db = 'php-ajax';
$host = 'localhost';

$dsn = 'mysql:host='.$host.';dbname='.$db;
$pdo = new PDO($dsn, $user, $pass);