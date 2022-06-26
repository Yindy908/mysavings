<?php
require 'config.php';

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password');
$confirm_password = filter_input(INPUT_POST, 'confirm_password');
$monthly_earnings = filter_input(INPUT_POST, 'monthly_earnings');
$monthly_spending = filter_input(INPUT_POST, 'monthly_spending');

//echeck if email is already in use

$query = $pdo->prepare("SELECT * FROM client WHERE email = ?");
$query->execute([$email]);
$result = $query->rowCount();

if($result > 0){
    header("Location: new_account.php");
    exit;
}
//double check the password

if($password != $confirm_password){
    header("Location: new_account.php");
    exit;
}else if($name && $email && $password){

    $sql = $pdo->prepare("INSERT INTO client (name, email, password) 
                            VALUES (:name, :email, :password)");

    $sql->bindValue(':name', $name);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':password', $password);

    $sql->execute(); 

    header("Location: index.php");
    exit;  
    
    }else{
        echo 'dados invalidos';
}

