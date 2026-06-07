<?php
session_start();
include 'includes/db.php';

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

// Make sure user can only delete their own products
$sql = "DELETE FROM products 
        WHERE id='$id' AND user_id='$user_id'";

if(mysqli_query($conn, $sql)) {
    header("Location: my-products.php");
    exit();
} else {
    echo "Error deleting product.";
}
?>