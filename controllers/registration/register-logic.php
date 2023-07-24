<?php


$conn['db'] = (new DB())->db;

// unset($_SESSION['Already Exists']);

$email = $_POST['email'];
$password = $_POST['password'];
if($email&&$password){

    $statement = $conn['db']->query("select * from users where email ='$email'");
    $exists = $statement->fetchAll();

    if($exists){
        $_SESSION['Already Exists'] = "Already Exists";
        header('Location:/registration');
    }
    else{
          $statement = $conn['db']->query("INSERT into users (email, password) values ('$email', md5('$password'))");
           $_SESSION['login'] = [
           'email' => $email
         ];
           header('Location:/');
    }
}