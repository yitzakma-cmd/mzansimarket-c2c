<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logged Out</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5 text-center">

    <div class="alert alert-info">
        You have been logged out successfully.
    </div>

    <a href="index.php" class="btn btn-dark me-2">
        Go to Home Page
    </a>

    <a href="login.php" class="btn btn-primary">
        Login Again
    </a>

</div>

</body>
</html>