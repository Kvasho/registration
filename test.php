<?php 
// $pdo = new PDO('mysql:host=localhost;port=3306;dbname=users', 'root', '');
// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// $statemant = $pdo->prepare('SELECT * FROM user_registration');
// $statemant->execute();
// $users = $statemant->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
    <?php  
    if(isset($_POST["check_username"])){
        echo 123;
    }
    ?>
    </h1>
    <button onclick="testClick()">Click</button>
    <script src="./test.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>
</html>
