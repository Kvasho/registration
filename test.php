<?php 
require './database.php';

// if($_SERVER['REQUEST_METHOD'] === 'GET'){
// if($loginEmail){
//     $sss = $pdo->prepare('SELECT * FROM user_registration WHERE email like :keyword');
//     $sss->bindValue(":keyword", "%$loginEmail%");
//     $sss->execute();
//     $users = $sss->fetchAll(PDO::FETCH_ASSOC);
//     if($users){
//         echo "პაროლი სწორია"; 
//     }
// }
// }

if (isset($_POST["login"])) {
    $loginEmail = $_POST['login_email'] ?? null;
    $loginPassword = $_POST['login_password'] ?? null;
    if ($loginPassword) {
        $loginPasswordCr = md5($loginPassword);
        $sss = $pdo->prepare('SELECT * FROM user_registration WHERE email like :login_email');
        $sss->bindValue(":login_email", "%$loginEmail%");
        $sss->execute();
        $user = $sss->fetch(PDO::FETCH_ASSOC);
        if ($user || $user["password"] !== $loginPasswordCr) {
            echo "პაროლი სწორია";
        }
    }
}
