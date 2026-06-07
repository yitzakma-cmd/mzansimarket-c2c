<?php
session_start();
include 'includes/header.php';

$cart = $_SESSION['cart'] ?? [];
$total = 0;

foreach($cart as $item) {
    $total += $item['price'];
}
?>

<div class="container mt-5">

    <h2>Purchase Confirmation</h2>

    <?php if(empty($cart)) { ?>

        <div class="alert alert-warning">
            Your cart is empty.
        </div>

        <a href="index.php" class="btn btn-primary">Back to Home</a>

    <?php } else { ?>

        <div class="card p-4">

            <h4>Order Summary</h4>

            <p>Total amount: <strong>R<?php echo $total; ?></strong></p>

            <p>
                This is a prototype purchase window. In a real system, this would connect to a secure payment gateway.
            </p>

            <form method="POST">
                <button type="submit" name="confirm_purchase" class="btn btn-success">
                    Confirm Purchase
                </button>
            </form>

        </div>

    <?php } ?>

    <?php
    if(isset($_POST['confirm_purchase'])) {
        unset($_SESSION['cart']);

        echo "
        <div class='alert alert-success mt-3'>
            Purchase completed successfully!
        </div>

        <a href='index.php' class='btn btn-primary'>
            Return to Home
        </a>
        ";
    }
    ?>

</div>

<?php include 'includes/footer.php'; ?>