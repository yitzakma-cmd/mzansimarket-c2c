<?php
session_start();
include 'includes/db.php';

if(isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {

        $user = mysqli_fetch_assoc($result);

        if($user['status'] == 'suspended') {

            echo "
            <div class='alert alert-danger'>
            Your account has been suspended.
             Please contact support.
        </div>
        ";

        exit();
    }

        if(password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['role'] = $user['role'];

            if($user['role'] == 'admin') {

                header("Location: admin/dashboard.php");

            } else {

                header("Location: seller-dashboard.php");

            }

            
            exit();

        } else {
            echo "Incorrect password!";
        }

    } else {
        echo "User not found!";
    }
}
?>

<?php include 'includes/header.php'; ?>

<div class="container mt-5">

    <h2>Login</h2>

    <form method="POST">

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" name="login" class="btn btn-success">
            Login
        </button>

    </form>

</div>

<?php include 'includes/footer.php'; ?>