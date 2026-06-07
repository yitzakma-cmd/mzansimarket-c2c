<?php
session_start();
include 'includes/db.php';

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM products
        WHERE id='$id' AND user_id='$user_id'";

$result = mysqli_query($conn, $sql);

$product = mysqli_fetch_assoc($result);

if(isset($_POST['update'])) {

    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    
    $image_name = $product['image'];


    if(!empty($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];

        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            "uploads/" . $image_name
        );
    }

    $update_sql = "UPDATE products
                   SET
                       product_name='$product_name',
                       description='$description',
                       price='$price',
                       image='$image_name'
                   WHERE
                       id='$id'
                       AND user_id='$user_id'";





    if(mysqli_query($conn, $update_sql)) {

        echo "
        <div class='alert alert-success mt-3'>
            Product updated successfully!
            <br><br>

            <a href='my-products.php' class='btn btn-success me-2'>
                My Products
             </a>

             <a href='seller-dashboard.php' class='btn btn-primary me-2'>
                Dashboard
            </a>

            <a href='index.php' class='btn btn-dark'>
                Home Page
            </a>
        </div>
        ";

        exit();

        
    } else {

        echo "Error updating product.";

    }
}
    

include 'includes/header.php';
?>
<?php include 'includes/seller-sidebar.php'; ?>

<div class="main-content">
    <div class="container mt-5">
        <h2>Edit Product</h2>
        
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label>Product Name</label>
                <input
                type="text"
                name="product_name"
                class="form-control"
                value="<?php echo $product['product_name']; ?>"
                required>
            </div>
            
            <div class="mb-3">
                <label>Description</label>
                <textarea
                name="description"
                class="form-control"><?php echo $product['description']; ?></textarea>
            </div>
            
            <div class="mb-3">

            <label>Price</label>
            <input
                type="number"
                step="0.01"
                name="price"
                class="form-control"
                value="<?php echo $product['price']; ?>">
            </div>
            
            
            <div class="mb-3">
                <label>Current Image</label><br>
                <img
                src="uploads/<?php echo $product['image']; ?>"
                width="200"
                class="mb-2">
            </div>
            
            <div class="mb-3">
                <label>Replace Image (Optional)</label>
                <input
                type="file"
                name="image"
                class="form-control"
                accept="image/*">
            </div>
            <button type="submit" name="update" class="btn btn-success">
                Save Changes
            </button>
            <a href="my-products.php" class="btn btn-secondary">
                Cancel
            </a>
        </form>
    
    </div>

</div>
<?php include 'includes/footer.php'; ?>