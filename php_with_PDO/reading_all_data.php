<?php

include 'config.php';


$con = new PDO('mysql:host='.DB_HOST.'dbname='.DB_NAME.'port=80', DB_USER, DB_PASS);

$user = $con->query("SELECT * FROM users");

$users = $user->fetchAll(PDO::FETCH_OBJ);

// foreach ($users as $user) {
//     echo $user->username . "<br>";
// }