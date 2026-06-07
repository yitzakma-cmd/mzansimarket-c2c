<?php
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

if($_SESSION['role'] != 'admin') {
    header("Location: ../index.php");
    exit();
}

include '../includes/header.php';
include '../includes/admin-sidebar.php';
?>

<div class="main-content">

    <div class="container mt-4">

        <div class="dashboard-banner">
            <img src="../images/dashboard.svg" width="200">

            <div>
                <h2>Welcome to MzansiMarket Admin</h2>
                <p>Manage users, products, and platform activity</p>
            </div>
        </div>

        <h2>Admin Dashboard</h2>
        <p>Welcome Administrator.</p>

        <div class="mt-4">
            <a href="users.php" class="btn btn-primary me-2">Manage Users</a>
            <a href="products.php" class="btn btn-warning me-2">Manage Products</a>
            <a href="../index.php" class="btn btn-dark me-2">Home</a>
            <a href="../logout.php" class="btn btn-danger">Logout</a>
        </div>

    </div>

</div>

<?php include '../includes/footer.php'; ?>