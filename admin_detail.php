<?php include("connect.php"); ?>

<?php
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
} else {
    $user_id = NULL;
}
?>

<?php

if (isset($_POST['delete'])) {
    $name = $_POST['name'];
    $delete_admin = mysqli_query($conn, "DELETE FROM users WHERE name = '$name'");
    if ($delete_admin) {
        echo "<script>alert('Admin deleted successfully!');
        setTimeout(function() {
                        window.location.href = 'admin_detail.php';
                    }, 0);</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="home.css">
</head>


<!-- Admin Navbar Starts -->

<?php include("admin_header.php"); ?>

<!-- Admin Navbar Ends -->


<body>

    <!-- Admin Detail Section Starts  -->

    <section class="admin_orders">

        <h1 class="title">Admins Accounts</h1>

        <div class="box-container">

            <?php

            $select_admins = mysqli_query($conn, "SELECT * FROM users WHERE roll = 'admin'");
            if (mysqli_num_rows($select_admins) > 0) {
                while ($fetch_admins = mysqli_fetch_assoc($select_admins)) {

            ?>

                    <div class="box">
                        <p>User ID : <?php echo $fetch_admins['name']; ?></p>
                        <p>Email : <?php echo $fetch_admins['email']; ?></p>
                        <p>Mobile No : <?php echo $fetch_admins['number']; ?></p>
                        <form action="admin_detail.php" method="post">
                            <input type="hidden" name="name" value="<?php echo $fetch_admins['name']; ?>">
                            <a href="update_profile.php" class="btn">Update</a>
                            <button type="submit" name="delete" class="btn">Delete</button>
                        </form>
                    </div>

            <?php
                }
            } else {
                echo '<p>No Admins Present Yet!</p>';
            }
            ?>
        </div>

    </section>

    <!-- Admin Detail Section Ends  -->

</body>

</html>