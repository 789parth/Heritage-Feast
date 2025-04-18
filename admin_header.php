<?php
session_start();
include("connect.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heritage Feast</title>
    <link rel="stylesheet" href="navbar.css">
</head>

<body>


    <!-- Admin Header Section Starts -->

    <div class="navbar">
        <div class="navlogo">
            <h2>Admin Panel</h2>
        </div>

        <div class="navlinks">
            <a href="admin.php">Home</a>
            <a href="admin_products.php">Products</a>
            <a href="admin_orders.php">Orders</a>
            <a href="admin_detail.php">Admins</a>
            <a href="users_detail.php">Users</a>
            <a href="admin_messages.php">Messages</a>
        </div>

        <div class="navicons">
            <?php
            if (isset($_SESSION["user_id"])) {
                $user_id = $_SESSION["user_id"];
            } else {
                $user_id = NULL;
            }
            ?>
            <a href="#" id="user-btn"><img src="icons/person.png"></a>
            <script src="profile_toggle.js"></script>
        </div>
    </div>
    <div class="profile">
        <?php
        if (!empty($user_id)) {
            $select_profile = mysqli_query($conn, "SELECT * FROM users WHERE name='$user_id'");
        } else {
            $select_profile = false;
        }
        if ($select_profile && mysqli_num_rows($select_profile) > 0) {
            $fetch_profile = mysqli_fetch_assoc($select_profile);

        ?>
            <p class="name"><?php echo "Hello " . $fetch_profile['name'] . "!"; ?></p>
            <div class="flex">
                <a href="profile.php" class="nbtn">Profile</a>
                <a href="logout.php" onclick="return confirm('Logout from this website?');" class="delete-btn">Logout</a>
            </div>
        <?php
        } else {
        ?>
            <p>Please Login First</p>
            <a href="login.php" class="nbtn">Login</a>
        <?php
        }
        ?>
    </div>

    <!-- Admin Header Section Starts -->


</body>

</html>