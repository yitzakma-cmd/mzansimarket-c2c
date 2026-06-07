<?php
include 'includes/db.php';

if(isset($_POST['register'])) {

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(fullname, email, password)
            VALUES('$fullname', '$email', '$password')";

    if(mysqli_query($conn, $sql)) {
        echo "
        <div class='container mt-5 text-center'>
            <div class='alert alert-success'>
                Registration successful!
            </div>

            <p>You can now proceed to login or go back home.</p>

            <a href='login.php' class='btn btn-primary me-2'>
            Login
            </a>

            <a href='index.php' class='btn btn-dark'>
            Home Page
            </a>

        </div>
        ";

        include 'includes/footer.php';
        exit();
    
    
    } else {
        echo "Error: " . mysqli_error($conn);
    }

}
?>

<?php include 'includes/header.php'; ?>

<div class="container mt-5">

    <h2>Register</h2>

    <form method="POST">

        <div class="mb-3">
            <label>Full Name</label>
            <input type="text" name="fullname" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" name="register" class="btn btn-primary">
            Register
        </button>

    </form>

</div>

<?php include 'includes/footer.php'; ?>