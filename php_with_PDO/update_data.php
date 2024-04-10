<?php

include 'config.php';

$con = new PDO('mysql:host='.DB_HOST.'dbname='.DB_NAME.'port=80', DB_USER, DB_PASS);

$first_name = "Jose";
$id = 1;

$user = $con->prepare("
    UPDATE users SET first_name = :first_name
    WHERE id = :id
");

// $user->execute([

//     'first_name' => $first_name,
//     'id' => $id,

// ]);