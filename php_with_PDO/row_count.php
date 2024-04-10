<?php

include 'config.php';

$con = new PDO('mysql:host='.DB_HOST.'dbname='.DB_NAME.'port=80', DB_USER, DB_PASS);

$id = 2;

$users = $con->query("
    SELECT * FROM users
");

echo $users->rowCount();