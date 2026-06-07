<div class="row">

<?php while($product = mysqli_fetch_assoc($result)) { ?>

    <div class="col-md-4 mb-4">
        <div class="card">

            <img
                src="uploads/<?php echo $product['image']; ?>"
                class="card-img-top"
                style="height:250px; object-fit:cover;"
            >

            <div class="card-body">

                <h5><?php echo $product['product_name']; ?></h5>

                <p><?php echo $product['description']; ?></p>

                <strong>R<?php echo $product['price']; ?></strong>

                <br>

                <a href="edit-product.php?id=<?php echo $product['id']; ?>"
                   class="btn btn-warning btn-sm mt-2 me-2">
                    Edit
                </a>

                <a href="delete-product.php?id=<?php echo $product['id']; ?>"
                   onclick="return confirm('Delete this product?')"
                   class="btn btn-danger btn-sm mt-2">
                    Delete
                </a>

            </div>

        </div>
    </div>

<?php } ?>

</div>