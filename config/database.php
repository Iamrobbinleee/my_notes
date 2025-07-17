<?php

$pdo = new PDO('mysql:host=localhost;dbname=my_notes;charset=utf8mb4', 'root', '');

$mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");

session_start();
?>