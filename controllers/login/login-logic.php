<?php

$email = $_POST['email'];
$password = $_POST['password'];

if($email && $password){
    $statement = $conn['db']->query("select * from users where email ='$email' and password = md5('$password')");
    $exists = $statement->fetchAll();

    if($exists){
        $_SESSION['login'] = [
            'email' => $email
        ];
        header('Location:/');
    }
    else{
        $_SESSION['Incorrect Details'] = "Incorrect Details";
        header('Location:/login');
    }
}