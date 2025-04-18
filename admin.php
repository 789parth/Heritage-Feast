<?php include("connect.php"); ?>

<?php
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
} else {
    $user_id = NULL;
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

    <!-- Admin Index Section Starts  -->

    <section class="dashboard">

        <h1 class="title">Dashboard</h1>

        <div class="box-container">

            <div class="box">
                <h3>Welcome!</h3>
                <p><?php echo $user_id; ?></p>
                <a href="update_profile.php" class="btn">Update Profile</a>
            </div>

            <div class="box">
                <?php
                $total_pendings = 0;

                $select_pendings = mysqli_query($conn,"SELECT * FROM orders WHERE payment_status = 'pending'");
                if(mysqli_num_rows($select_pendings) > 0) {
                    while($fetch_pendings = mysqli_fetch_assoc($select_pendings)) {
                        $total_pendings += $fetch_pendings['total_price']; 
                    }
                }

                ?>
                <h3>$<?php echo $total_pendings;?>/-</h3>
                <p>Total Pendings</p>
                <a href="admin_orders.php" class="btn">See Orders</a>
            </div>

            <div class="box">
                <?php
                $total_completes = 0;

                $select_completes = mysqli_query($conn,"SELECT * FROM orders WHERE payment_status = 'completed'");
                if(mysqli_num_rows($select_completes) > 0) {
                    while($fetch_completes = mysqli_fetch_assoc($select_completes)) {
                        $total_completes += $fetch_completes['total_price']; 
                    }
                }

                ?>
                <h3>$<?php echo $total_completes;?>/-</h3>
                <p>Total Completes</p>
                <a href="admin_orders.php" class="btn">See Orders</a>
            </div>

            <div class="box">
                <?php
                $total_orders = mysqli_query($conn,"SELECT COUNT(*) AS total FROM orders");
                $fetch_orders = mysqli_fetch_assoc($total_orders);
                ?>
                <h3><?php echo $fetch_orders['total'];?></h3>
                <p>Total Orders</p>
                <a href="admin_orders.php" class="btn">See Orders</a>
            </div>

            <div class="box">
                <?php
                $total_products = mysqli_query($conn,"SELECT COUNT(*) AS total FROM products");
                $fetch_products = mysqli_fetch_assoc($total_products);
                ?>
                <h3><?php echo $fetch_products['total'];?></h3>
                <p>Total Products</p>
                <a href="admin_products.php" class="btn">See Products</a>
            </div>

            <div class="box">
                <?php
                $total_users = mysqli_query($conn,"SELECT COUNT(*) AS total FROM users WHERE roll = 'user'");
                $fetch_users = mysqli_fetch_assoc($total_users);
                ?>
                <h3><?php echo $fetch_users['total'];?></h3>
                <p>Total Users</p>
                <a href="users_detail.php" class="btn">See Users</a>
            </div>

            <div class="box">
                <?php
                $total_admins = mysqli_query($conn,"SELECT COUNT(*) AS total FROM users WHERE roll = 'admin'");
                $fetch_admins = mysqli_fetch_assoc($total_admins);
                ?>
                <h3><?php echo $fetch_admins['total'];?></h3>
                <p>Total Admins</p>
                <a href="admin_detail.php" class="btn">See Admins</a>
            </div>

            <div class="box">
                <?php
                $total_messages = mysqli_query($conn,"SELECT COUNT(*) AS total FROM messages");
                $fetch_messages = mysqli_fetch_assoc($total_messages);
                ?>
                <h3><?php echo $fetch_messages['total'];?></h3>
                <p>Total Messages</p>
                <a href="admin_messages.php" class="btn">See Messages</a>
            </div>

        </div>

    </section>

    <!-- Admin Index Section Ends  -->

</body>

</html>