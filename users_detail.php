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
    $delete_user = mysqli_query($conn, "DELETE FROM users WHERE name = '$name'");
    if ($delete_user) {
        echo "<script>alert('User deleted successfully!');
        setTimeout(function() {
                        window.location.href = 'users_detail.php';
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

    <!-- Users Detail Section Starts  -->

    <section class="admin_orders">

        <h1 class="title">Users Accounts</h1>

        <div class="box-container">

            <?php

            $select_users = mysqli_query($conn, "SELECT * FROM users WHERE roll = 'user'");
            if (mysqli_num_rows($select_users) > 0) {
                while ($fetch_users = mysqli_fetch_assoc($select_users)) {

            ?>

                    <div class="box">
                        <p>User ID : <?php echo $fetch_users['name']; ?></p>
                        <p>Email : <?php echo $fetch_users['email']; ?></p>
                        <p>Mobile No : <?php echo $fetch_users['number']; ?></p>
                        <form action="admin_detail.php" method="post">
                            <input type="hidden" name="name" value="<?php echo $fetch_users['name']; ?>">
                            <button type="submit" name="delete" class="btn">Delete</button>
                        </form>
                    </div>

            <?php
                }
            } else {
                echo '<p>No Users Present Yet!</p>';
            }
            ?>
        </div>

    </section>

    <!-- Users Detail Section Ends  -->

</body>

</html>