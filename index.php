<?php include 'includes/header.php'; ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">MzansiMarket</a>

    <div>
        <a href="cart.php" class="btn btn-success me-2">
            🛒 Cart
        </a>

        <a href="login.php" class="btn btn-outline-light me-2">
            Login
        </a>

        <a href="register.php" class="btn btn-warning">
            Register
        </a>
    </div>
</nav>

<div class="container mt-5 text-center">
    <h1>Welcome to MzansiMarket</h1>

    <p>
        A secure township-focused C2C marketplace platform.
    </p>

    <a href="#" class="btn btn-primary">
        Browse Products
    </a>
</div>

<?php include 'includes/footer.php'; ?>




<?php
include 'includes/db.php';

$sql = "SELECT * FROM products ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
?>

<div class="container mt-5">

    <h2>Latest Products</h2>

    <div class="row">

        <?php while($product = mysqli_fetch_assoc($result)) { ?>

            <div class="col-md-4 mb-4">

                <div class="card p-3">
                    <img
                        src="uploads/<?php echo $product['image']; ?>"
                        class="card-img-top"
                        alt="<?php echo $product['product_name']; ?>"
                        style="height:250px; object-fit:cover;"
                    >

                    <h4>
                        <?php echo $product['product_name']; ?>
                    </h4>

                    <p>
                        <?php echo $product['description']; ?>
                    </p>

                    <strong>
                        R<?php echo $product['price']; ?>
                    </strong>

                    <br><br>

                    <a href="add-to-cart.php?id=<?php echo $product['id']; ?>"
                        class="btn btn-success">
                            Add to Cart
                    </a>

                </div>

            </div>

        <?php } ?>

    </div>

</div>