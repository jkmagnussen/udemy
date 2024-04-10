<?php

include 'config.php';

$con = new PDO('mysql:host='.DB_HOST.'dbname='.DB_NAME.'port=80', DB_USER, DB_PASS);

$first_name = $_GET['first_name'];

$user = $con->prepare(" 
    SELECT * FROM users 
    WHERE first_name = :first_name
");

// bindParam: reference
// bindValue: variable (more common to use) 

$user->bindParam(':first_name', $first_name);

$first_name = "Jose";

$user->execute();

$user = $user->fetchAll(PDO::FETCH_OBJ);
var_dump($user);