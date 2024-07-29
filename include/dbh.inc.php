<?php

$dsn = 'localhost';
$dbname = 'test';
$dbusername = "root";
$dbpassword = '';

// Php Data Object
try {
    $pdo = new PDO("mysql:host=$dsn;dbname=$dbname", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die("Connection failed: " . $e->getMessage());
}
