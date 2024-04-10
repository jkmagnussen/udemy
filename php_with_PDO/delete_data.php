<?php

include 'config.php';

$con = new PDO('mysql:host='.DB_HOST.'dbname='.DB_NAME.'port=80', DB_USER, DB_PASS);

$id = 1;

$user = $con->prepare("
    DELETE FROM users 
    WHERE id = :id
");

$user->execute([

    'id' => $id,

]);