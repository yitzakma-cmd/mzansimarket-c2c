<?php
session_start();
include 'includes/header.php';

$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>

<div class="container mt-5">

    <h2>Your Cart</h2>

    <?php if(empty($cart)) { ?>

        <div class="alert alert-info">
            Your cart is empty.
        </div>

        <a href="index.php" class="btn btn-primary">Continue Shopping</a>

    <?php } else { ?>

        <table class="table">
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Action</th>
            </tr>

            <?php foreach($cart as $item) { 
                $total += $item['price'];
            ?>

            <tr>
                <td>
                    <img src="uploads/<?php echo $item['image']; ?>" width="80">
                </td>
                <td><?php echo $item['name']; ?></td>
                <td>R<?php echo $item['price']; ?></td>
                <td>
                    <a href="remove-from-cart.php?id=<?php echo $item['id']; ?>" class="btn btn-danger btn-sm">
                        Remove
                    </a>
                </td>
            </tr>

            <?php } ?>

        </table>

        <h4>Total: R<?php echo $total; ?></h4>

        <a href="index.php" class="btn btn-secondary">Continue Shopping</a>
        <a href="checkout.php" class="btn btn-success">Proceed to Purchase</a>

    <?php } ?>

</div>

<?php include 'includes/footer.php'; ?>