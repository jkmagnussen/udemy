<?php

include 'config.php';

try {
    
    $con = new PDO('mysql:host='.DB_HOST.'dbname='.DB_NAME.'port=80', DB_USER, DB_PASS);

} catch(PDOException $e){

    die("database connection failed");

}


?>