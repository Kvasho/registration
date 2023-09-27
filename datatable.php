<?php
require './database.php';
$statemant = $pdo->prepare('SELECT * FROM user_registration');
$statemant->execute();
$users = $statemant->fetchAll(PDO::FETCH_ASSOC);
session_start();
echo $_SESSION['logged_in'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script defer src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script defer src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script defer src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script defer src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script defer src="./datatable.js"></script>
    <script defer src="./test.js"></script>
    <title>კაბინეტი</title>
</head>
<?php if($_SESSION['logged_in']):?>
<body>
    <h1>პირადი კაბინეტი</h1>
    <button type="button" class="btn btn-primary" style="margin: 10px 0;" onclick="returnHandler()">მთავარ გვერდზე დაბრუნება</button>
    <div class="container">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>სახელი</th>
                    <th>გვარი</th>
                    <th>პირადი ნომერი</th>
                    <th>ელ ფოსტა</th>
                    <th>თარიღი</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $i => $user) : ?>
                    <tr>
                        <td><?php echo $i + 1; ?></td>
                        <td><?php echo $user["name"]; ?></td>
                        <td><?php echo $user["surname"]; ?></td>
                        <td><?php echo $user["id_number"]; ?></td>
                        <td><?php echo $user["email"]; ?></td>
                        <td><?php echo $user["create_date"]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>id</th>
                    <th>სახელი</th>
                    <th>გვარი</th>
                    <th>პირადი ნომერი</th>
                    <th>ელ ფოსტა</th>
                    <th>თარიღი</th>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
<?php elseif(!$_SESSION['logged_in']): ?>
    <script>
        window.location = "index.php"
    </script>
<?php endif;?>
</html>