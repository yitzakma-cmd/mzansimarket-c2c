<?php
session_start();
include 'includes/db.php';

if(!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$product_id = $_GET['id'];

$sql = "SELECT * FROM products WHERE id='$product_id'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
    $product = mysqli_fetch_assoc($result);

    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $_SESSION['cart'][$product_id] = [
        'id' => $product['id'],
        'name' => $product['product_name'],
        'price' => $product['price'],
        'image' => $product['image'],
        'quantity' => 1
    ];
}

header("Location: cart.php");
exit();
?>