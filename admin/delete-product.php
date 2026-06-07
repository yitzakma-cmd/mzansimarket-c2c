<?php
session_start();
include '../includes/db.php';

if($_SESSION['role'] != 'admin') {
    header("Location: ../index.php");
    exit();
}

$id = $_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM products
     WHERE id='$id'"
);

header("Location: products.php");
exit();
?>