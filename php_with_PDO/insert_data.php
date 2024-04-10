<?php

include 'config.php';

$con = new PDO('mysql:host='.DB_HOST.'dbname='.DB_NAME.'port=80', DB_USER, DB_PASS);

$id = 2;

$user = $con->prepare("
    INSERT INTO users(first_name, username, email, active, password)
    VALUES (:first, :usern, :email, :active, :pass )
");



$user->execute([
    
    'first' => 'Yosef',
    'usern' => 'JKM',
    'email' => 'jkmagnussen@test.com',
    'active' => 1,
    'pass' => 'password',
]);