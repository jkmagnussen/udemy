<?php

include 'config.php';

$con = new PDO('mysql:host='.DB_HOST.'dbname='.DB_NAME.'port=80', DB_USER, DB_PASS);

$first_name = 'joe';

$password = 123;

$user = $con->prepare("
    SELECT * FROM users 
    WHERE first_name = :first_name
    AND password = :password
");

$user->bindValue('first_name', $first_name);
$user->bindValue('password', $password);

$user->execute();

// $user = $user->fetchAll(PDO::FETCH_OBJ);
// var_dump($user);