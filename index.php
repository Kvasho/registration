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
$successMessage = false;
require_once './partials/method.php';
?>


<!-- CHECK IF CHECKBOX IS CLICKED OR NOT -->
<script>
    function exefunction() {
        var clicked = document.getElementById("checkbox").checked;
        if (clicked) {
            document.querySelector('.registerBtn').disabled = false;
        } else {
            document.querySelector('.registerBtn').disabled = true;
        }
    }
</script>

<!-- ERRORS -->

<?php if (!empty($errors)) : ?>
    <div class="errors">
        <?php foreach ($errors as $error) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error ?>
            </div>
        <?php endforeach; ?>
    </div>
    </div>
<?php endif; ?>
<?php if ($successMessage === true) : ?>
    <div class="alert alert-success registered" role="alert" id="success">
        <?php echo "წარმატებით დარეგისტრირდით!" ?>
        <?php echo "გაიარეთ ავტორიზაცია!" ?>
    </div>
<?php endif; ?>


<h1 class="header" id="header">რეგისტრაციის ფორმა</h1>
<div class="root">
    <?php include './partials/form.php' ?>
    <?php include './partials/loginForm.php' ?>
</div>

<!-- FOOTER -->
<script>
    setTimeout(() => {
        const box = document.getElementById('success');

        box.style.display = 'none';

    }, 3000);
</script>
<script src="./test.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>