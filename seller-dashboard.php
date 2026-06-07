<?php
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'includes/header.php';
include 'includes/seller-sidebar.php';
?>

<div class="seller-main-content">

    <h2>Welcome, <?php echo $_SESSION['fullname']; ?>!</h2>

    <p>This is your seller dashboard.</p>

    <div class="mt-4">
        <a href="upload-product.php" class="btn btn-primary me-2">Upload Product</a>
        <a href="my-products.php" class="btn btn-warning me-2">My Products</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>

</div>

<?php include 'includes/footer.php'; ?>