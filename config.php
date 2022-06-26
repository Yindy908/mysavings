<?php

session_start();

$host = 'localhost';
$db = 'my_savings';
$user = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try{
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=UTF8", $user, $password);
}catch(PDOException $e){
    echo $e->getMessage();
}