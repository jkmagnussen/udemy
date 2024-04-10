<?php

// include 'config.php';

// $con = new PDO('mysql:host='.DB_HOST.'dbname='.DB_NAME.'port=80', DB_USER, DB_PASS);

// $user = $con->prepare("
//     SELECT * FROM users 
//     WHERE first_name = :first_name
// ");

// $userExecution = $user->execute([

//     'first_name' => $_GET['first_name'],

// ]);

// if($userExecution){
    
//     $user = $user->fetchAll(PDO::FETCH_OBJ);
//     var_dump($user);

//}


// $user = $con->query("SELECT * FROM users");

// $users = $user->fetchAll(PDO::FETCH_OBJ);