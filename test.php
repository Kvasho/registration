<?php 
require './database.php';
session_start();

if (isset($_POST["login"])) {
    $loginEmail = $_POST['login_email'] ?? null;
    $loginPassword = $_POST['login_password'] ?? null;
    if ($loginPassword) {
        $loginPasswordCr = md5($loginPassword);
        $con = $pdo->prepare('SELECT * FROM user_registration WHERE email like :login_email');
        $con->bindValue(":login_email", "%$loginEmail%");
        $con->execute();
        $user = $con->fetch(PDO::FETCH_ASSOC);
        $_SESSION['logged_in'] = $user['email'];
        if ($user["password"] === $loginPasswordCr && $user["email"] === $loginEmail) {
            $_SESSION['logged_in'] = $loginEmail;
            if($_SESSION['logged_in']){
                echo "success";
            }
        } else {
            echo "error";
        }
    }
}

if(isset($_POST['logout'])){    
    // unset($_SESSION['logged_in']);
    echo 'logout';
    unset($_SESSION['logged_in']);

}