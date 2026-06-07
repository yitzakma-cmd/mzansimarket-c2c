<?php
session_start();
include '../includes/db.php';

if($_SESSION['role'] != 'admin') {
    header("Location: ../index.php");
    exit();
}

// handls suspend
if(isset($_GET['suspend'])) {
    $id = $_GET['suspend'];

    mysqli_query($conn,
        "UPDATE users SET status='suspended' WHERE id='$id'"
    );
}

// handles activate
if(isset($_GET['activate'])) {
    $id = $_GET['activate'];

    mysqli_query($conn,
        "UPDATE users SET status='active' WHERE id='$id'"
    );
}

include '../includes/header.php';
include '../includes/sidebar.php';

$result = mysqli_query($conn, "SELECT * FROM users");
?>

<div class="main-content">
    <div class="container mt-5">

        <h2>Manage Users</h2>

        <div class="d-flex justify-content-between align-items-center mb-3">

            <a href="dashboard.php" class="btn btn-dark">
                ← Admin Panel
            </a>

            <a href="users.php" class="btn btn-secondary">
                Refresh Users
            </a>

        </div>

        <?php if(isset($_GET['suspend']) || isset($_GET['activate'])) { ?>

        <div class="alert alert-info">
            User status updated successfully.
        </div>

        <?php } ?>

        <table class="table">

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            <?php while($user = mysqli_fetch_assoc($result)) { ?>

            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['fullname']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['role']; ?></td>
                <td><?php echo $user['status']; ?></td>

                <td>

                <?php if($user['status'] == 'active') { ?>

                    <a href="users.php?suspend=<?php echo $user['id']; ?>"
                       onclick="return confirm('Are you sure you want to suspend this user?')"
                       class="btn btn-warning btn-sm">
                       Suspend
                    </a>

                <?php } else { ?>

                    <a href="users.php?activate=<?php echo $user['id']; ?>"
                       onclick="return confirm('Activate this user?')"
                       class="btn btn-success btn-sm">
                       Activate
                    </a>

                <?php } ?>

                </td>
            </tr>

            <?php } ?>

        </table>

    </div>
</div>

<?php include '../includes/footer.php'; ?>