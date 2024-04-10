<?php

include 'config.php';

$con = new PDO('mysql:host='.DB_HOST.'dbname='.DB_NAME.'port=80', DB_USER, DB_PASS);

$id = 2;

$con->query("
    INSERT INTO users(first_name, username, email, active, password)
    VALUES ('Maria', 'maria1989', 'maria1989@gmail.com', 1, '30041989')
");

$user_id = $con->lastInsertId();

$con->query("
UPDATE users SET active = 0 WHERE id = $user_id ");