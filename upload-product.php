<?php
session_start();
include 'includes/db.php';

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if(isset($_POST['upload'])) {

    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $image_name = $_FILES['image']['name'];
    $temp_name = $_FILES['image']['tmp_name'];

    move_uploaded_file(
        $temp_name,
        "uploads/" . $image_name
    );

    $sql = "INSERT INTO products(
            user_id,
            product_name,
            description,
            price,
            image
        )
        VALUES(
            '{$_SESSION['user_id']}',
            '$product_name',
            '$description',
            '$price',
            '$image_name'
        )";
        
    if(mysqli_query($conn, $sql)) {

    echo "
    <div class='alert alert-success'>
        Product uploaded successfully!
        <br><br>

        <a href='seller-dashboard.php' class='btn btn-success me-2'>
            Done
        </a>

        <a href='upload-product.php' class='btn btn-primary'>
            Upload Another Product
        </a>
    </div>
    ";

} else {
    echo "Error: " . mysqli_error($conn);
}
}
?>

<?php include 'includes/header.php'; ?>

<div class="container mt-5">

    <h2>Upload Product</h2>

    <form method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label>Product Name</label>
            <input type="text" name="product_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Price</label>
            <input type="number" step="0.01" name="price" class="form-control">
        </div>

        <div class="mb-3">
            <label>Product Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <button type="submit" name="upload" class="btn btn-primary">
            Upload Product
        </button>

    </form>

</div>

<?php include 'includes/footer.php'; ?>