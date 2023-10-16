<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    function randomString($n)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $str = '';
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $str .= $characters[$index];
        }
        return $str;
    }

    if (!is_dir('images')) {
        mkdir('images');
    }


    $image = $_FILES['image'] ?? null;
    $imagePath = '';
    if ($image) {
        $randomString = randomString(10);
        $imagePath = 'images/' . $randomString . '/' . $image['name'];
        session_start();
        $_SESSION['image_path'] = $imagePath;
        mkdir(dirname($imagePath));
        move_uploaded_file($image['tmp_name'], $imagePath);
    }

    if ($email) {
        $sss = $pdo->prepare('SELECT * FROM user_registration WHERE email like :keyword');
        $sss->bindValue(":keyword", "%$email%");
        $sss->execute();
        $users = $sss->fetchAll(PDO::FETCH_ASSOC);
        if ($users) {
            $errors[] = 'მომხმარებელი ასეთი იმეილით უკვე არსებოობბბსსსს !!!';
        }
    }

    if ($id_number) {
        $sss = $pdo->prepare('SELECT * FROM user_registration WHERE id_number like :keyword');
        $sss->bindValue(":keyword", "%$id_number%");
        $sss->execute();
        $users = $sss->fetchAll(PDO::FETCH_ASSOC);
        if ($users) {
            $errors[] = 'მომხმარებელი ასეთი პირადი ნომრით უკვე არსებოობბბსსსს !!!';
        }
    }

    include './partials/checkInputs.php';

    if (empty($errors)) {
        #მონაცემების ჩაწერა ბაზის შესაბამის ცხრილში    
        $statement = $pdo->prepare("INSERT INTO user_registration (name, surname, id_number, email, password, create_date, image)
                VALUES (:name, :surname, :id_number, :email, :password, :create_date, :image)");
        $statement->bindValue(':name', $name);
        $statement->bindValue(':surname', $surname);
        $statement->bindValue(':id_number', $id_number);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':password', md5($password));
        $statement->bindValue(':create_date', date('Y-m-d H:i:s'));
        $statement->execute();
        $successMessage = true;
    }
}
