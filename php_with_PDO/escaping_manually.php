<?php

include 'config.php';

$con = new PDO('mysql:host='.DB_HOST.'dbname='.DB_NAME.'port=80', DB_USER, DB_PASS);

$first_name = $con->quote($_GET['first_name']);

$user = $con->query(" 
    SELECT * FROM users 
    WHERE first_name = $first_name
");

// var_dump($user->fetch(PDO::FETCH_OBJ));