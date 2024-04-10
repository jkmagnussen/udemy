<?php

include 'config.php';

// NEW pdo('mysql:host=localhost; dbname= the name of the database; option to add port', 'database user', 'database password')

// the pdo class requires 3 arguments ('','','')
// the first argument is driver invocation - 'mysql:dbname=testdb;host=127.0.0.1';
// second argument is user and third argument is password. 

$con = new PDO('mysql:host='.DB_HOST.'dbname='.DB_NAME.'port=80', DB_USER, DB_PASS);

// to find out what drivers are available, use method on PDO:: 

$drivers = PDO::getAvailableDrivers();

var_dump($drivers);




// <?php
// /* Connect to a MySQL database using driver invocation */
// $dsn = 'mysql:dbname=testdb;host=127.0.0.1';
// $user = 'dbuser';
// $password = 'dbpass';

// $dbh = new PDO($dsn, $user, $password);

// ?>