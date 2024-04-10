<?php

include 'config.php';


$con = new PDO('mysql:host='.DB_HOST.'dbname='.DB_NAME.'port=80', DB_USER, DB_PASS);

$user = $con->query("SELECT * FROM users WHERE id = 1");

$user = $user->fetch(PDO::FETCH_OBJ);

// echo $user->first_name;