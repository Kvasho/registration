<?php
require_once './database.php';
include './partials/method.php';
session_start();
$deletedFolder = $_SESSION['image_path'];
unlink($deletedFolder);

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM user_registration WHERE id= :id');
$statement->bindValue('id', $id);
$statement->execute();

header('Location: datatable.php');
