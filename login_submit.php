<?php
require "config.php";

$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

if(isset($email, $password)){
    $sql = $pdo->prepare("SELECT * FROM client WHERE email = :email AND password = :password");
    $sql->bindValue(':email', $email);
    $sql->bindValue(':password', $password);
    $sql->execute();
    
    if($sql->rowCount() > 0){
        $idHandler = $sql->fetch();
        $_SESSION['id'] = $idHandler['id'];

        header('Location: index.php');
        exit;
        return $_SESSION['id'];
    }else{
        header('Location: login.php');
        exit;
    }
}

