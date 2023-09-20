<?php 
require_once './partials/header.php';
require_once './database.php';


#სერვერიდან ცხრილის წამოღების კოდი
// $statemant = $pdo->prepare('SELECT * FROM user_registration');
// $statemant->execute();
// $users = $statemant->fetchAll(PDO::FETCH_ASSOC);
$name = $_POST['name'] ?? null;
$surname = $_POST['surname'] ?? null;
$id_number = $_POST['id_number'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$password2 = $_POST['password2'] ?? null;
#ფორმების ვალიდაცია
$errors = [];
if(!$name) {
    $errors[] = 'შეიყვანეთ სახელი !!!';
}
if(!$surname) {
    $errors[] = 'შეიყვანეთ გვარი !!!';
}
if(!$id_number) {
    $errors[] = 'შეიყვანეთ პირადი ნომერი !!!';
}
if(!$email) {
    $errors[] = 'შეიყვანეთ იმეილი !!!';
}
if(!$password) {
    $errors[] = 'შეიყვანეთ პაროლი !!!';
}
if($password !== $password2){
    $errors[] = 'პაროლები არ ემთხვევა ერთმანეთს !!!';
}

if(empty($errors)){    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
              
        #მონაცემების ჩაწერა ბაზის შესაბამის ცხრილში
        $statement = $pdo->prepare("INSERT INTO user_registration (name,surname,id_number,email, password)
                                    VALUES (:name, :surname, :id_number, :email, :password)");
        $statement->bindValue(':name', $name);
        $statement->bindValue(':surname', $surname);
        $statement->bindValue(':id_number', $id_number);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', md5($password));               
        $statement->execute();
    }
}

var_dump($errors);

?>


<!-- CHECK IF CHECKBOX IS CLICKED OR NOT -->
<script>
    function exefunction() {
    var clicked = document.getElementById("checkbox").checked;
    if(clicked){
        document.querySelector('.registerBtn').disabled = false;
    } else {
        document.querySelector('.registerBtn').disabled = true;
    }
    }
</script>

<h1 class="header">რეგისტრაციის ფორმა</h1>
<div class="root">    
<form class="registration-form center" method="post" enctype="multipart/form-data">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" placeholder="სახელი" name="name">
        <label for="floatingInput">სახელი</label>
    </div>
    <div class="form-floating">
        <input type="text" class="form-control"  name="surname" placeholder="გვარი">
        <label for="floatingPassword">გვარი</label>
    </div>
    <div class="form-floating">
        <input type="number" class="form-control"  name="id_number" placeholder="პირადი ნომერი">
        <label for="floatingPassword">პირადი ნომერი</label>
    </div>
    <div class="form-floating">
        <input type="email" class="form-control"  name="email" placeholder="ელ ფოსტა">
        <label for="floatingPassword">ელ ფოსტა</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control"  name="password" placeholder="პაროლი">
        <label for="floatingPassword">პაროლი</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control"  name="password2" placeholder="გაიმეორეთ პაროლი">
        <label for="floatingPassword">გაიმეორეთ პაროლი</label>
    </div>
    <li class="list-group-item">
        <input class="form-check-input me-1" type="checkbox" onclick=exefunction() id="checkbox" name="checkbox" value="accept" id="firstCheckbox" onclick=validate() >
        <label class="form-check-label" for="firstCheckbox">ვეთანხმები წესებს</label>
  </li>
  <button type="submit" id="registerBtn" class="registerBtn btn btn-primary" disabled>რეგისტრაცია</button>
</form>
<!-- ERRORS -->
<?php if(!empty($errors)): ?>
    <div class="errors">
            <?php foreach ($errors as $error): ?>
                <div class="alert alert-danger" role="alert">
                     <?php echo $error ?>
                </div>
            <?php endforeach; ?> 
        </div>
    </div>
<?php endif; ?>
</div>


<!-- <?php if(empty($errors)): ?>
    <div class="errors">
        Tqven warmatebit gaiaret registracia sagol
    </div>
<?php endif; ?> -->





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
crossorigin="anonymous"></script>
</body>
</html>