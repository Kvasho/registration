<?php 
require_once './partials/header.php';
require_once './database.php';

// $_POST = array([]);
// echo "<pre>";
// var_dump($_POST);
// echo "<pre>";

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
$successMessage = false;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if($email){
        $sss = $pdo->prepare('SELECT * FROM user_registration WHERE email like :keyword');
        $sss->bindValue(":keyword", "%$email%");
        $sss->execute();
        $users = $sss->fetchAll(PDO::FETCH_ASSOC);
        if($users){
            $errors[] = 'მომხმარებელი ასეთი იმეილით უკვე არსებოობბბსსსს !!!'; 
        }
    }
    
    if($id_number){
        $sss = $pdo->prepare('SELECT * FROM user_registration WHERE id_number like :keyword');
        $sss->bindValue(":keyword", "%$id_number%");
        $sss->execute();
        $users = $sss->fetchAll(PDO::FETCH_ASSOC);
        if($users){
            $errors[] = 'მომხმარებელი ასეთი პირადი ნომრით უკვე არსებოობბბსსსს !!!';       
        } 
    } 

    include './partials/checkInputs.php';   

if(empty($errors)){
        #მონაცემების ჩაწერა ბაზის შესაბამის ცხრილში    
        $statement = $pdo->prepare("INSERT INTO user_registration (name, surname, id_number, email, password, create_date)
                VALUES (:name, :surname, :id_number, :email, :password, :create_date)");
        $statement->bindValue(':name', $name);
        $statement->bindValue(':surname', $surname);
        $statement->bindValue(':id_number', $id_number);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':create_date', date('Y-m-d H:i:s'));

        $statement->execute();
        $successMessage = true;
    }      
}
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
<?php if($successMessage=== true): ?>
    <div class="alert alert-success" role="alert">
        <?php echo "თქვენ წარმატებით დარეგისტრირდით"."<br>"."გაიარეთ ავტორიზაცია"?>
    </div>
<?php endif; ?>


<h1 class="header" id="header">რეგისტრაციის ფორმა</h1>
<div class="root">    
<?php include './partials/form.php' ?>
<?php include './partials/loginForm.php' ?> 
</div>




<script type="text/javascript" src="jquery.dataTables.js"></script>
<script type="text/javascript" src="dataTables.scrollingPagination.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').dataTable( {
            "pagingType": "scrolling"
        } );
    } );
</script>
<script src="./test.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
crossorigin="anonymous"></script>
</body>
</html>