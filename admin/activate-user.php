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
    "UPDATE users
     SET status='active'
     WHERE id='$id'"
);

?>

<div class="container mt-5 text-center">

    <div class="alert alert-success">
        User has been activated successfully.
    </div>

    <a href="users.php" class="btn btn-primary me-2">
        Back to Users
    </a>

    <a href="dashboard.php" class="btn btn-dark">
        Admin Panel
    </a>

</div>