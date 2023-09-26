<?php 
require './database.php';

$loginEmail = $_POST['login_email'] ?? null;
$loginPassword = $_POST['login_password'] ?? null;

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

// if($_SERVER['REQUEST_METHOD'] === 'GET'){
//     if($loginPassword){
//         $loginPasswordCr = md5($loginPassword);
//         $sss = $pdo->prepare('SELECT * FROM user_registration WHERE password like :keyword');
//         $sss->bindValue(":keyword", "%$loginPasswordCr%");
//         $sss->execute();
//         $users = $sss->fetchAll(PDO::FETCH_ASSOC);
//         if($users){
//             echo "პაროლი სწორია";
//         }
//     }
// }

// $sss = $pdo->prepare('SELECT * FROM user_registration WHERE email like :keyword');
// $sss->bindValue(":keyword", "%$loginEmail%");
// $sss->execute();
// $users = $sss->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST["check_username"])){
    if($loginEmail){       
        if($users){
            foreach($users as $user){
                if($user["email"] === "kvashilava@gmail.com"){
                    echo "aris aseti username";
                }
            } 
        }
    }
}
?>

<form class="registration-form" method="get" enctype="multipart/form-data">
    <h5>კაბინეტში შესვლა</h5>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" placeholder="ელ-ფოსტა" name="login_email">
        <label for="floatingInput">ელ-ფოსტა</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control"  name="login_password" placeholder="პაროლი">
        <label for="floatingPassword">პაროლი</label>
    </div>
  <button type="submit" class="btn btn-primary" onclick="testClick()">Sign in</button>
</form>

<script src="../test.js"></script>
