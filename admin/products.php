<?php
session_start();
include '../includes/db.php';

if($_SESSION['role'] != 'admin') {
    header("Location: ../index.php");
    exit();
}

include '../includes/header.php';
include '../includes/sidebar.php';


$result = mysqli_query($conn,"SELECT * FROM products");
?>

<div class="main-content">
    <div class="container mt-5">

        <h2>Manage Products</h2>

        <div class="d-flex justify-content-between align-items-center mb-3">

            <a href="dashboard.php" class="btn btn-dark">
            ← Admin Panel
            </a>

            <a href="products.php" class="btn btn-secondary">
                 Refresh Products
            </a>

        </div>

        <table class="table">

            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>

<?php while($product = mysqli_fetch_assoc($result)) { ?>

<tr>
    <td><?php echo $product['id']; ?></td>

    <td><?php echo $product['product_name']; ?></td>

    <td>R<?php echo $product['price']; ?></td>

    <td>
        <img src="../uploads/<?php echo $product['image']; ?>" width="100"
            onerror="this.src='../images/default.png'">
    </td>

    <td>
        <a href="delete-product.php?id=<?php echo $product['id']; ?>"
           onclick="return confirm('Delete this product?')"
           class="btn btn-danger btn-sm me-1">
            Delete
        </a>

        <a href="edit-product.php?id=<?php echo $product['id']; ?>"
           class="btn btn-warning btn-sm me-1">
            Edit
        </a>
    </td>
</tr>

<?php } ?>

</table>

</div>

<?php include '../includes/footer.php'; ?>