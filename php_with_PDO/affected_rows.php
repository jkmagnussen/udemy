<?php

include 'config.php';

$con = new PDO('mysql:host='.DB_HOST.'dbname='.DB_NAME.'port=80', DB_USER, DB_PASS);

$id = 2;

$update = $con->query("
    UPDATE users SET first_name = 'Bobbert'
    WHERE id = 4
");

echo $update->rowCount();