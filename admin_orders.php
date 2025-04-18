<?php include("connect.php"); ?>

<?php
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
} else {
    $user_id = NULL;
}
?>

<?php

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $payment_status = $_POST['payment_status'];
    $update_status = mysqli_query($conn, "UPDATE orders SET payment_status = '$payment_status' WHERE id = '$id'");
    if ($update_status) {
        echo "<script>alert('Payment_status updated successfully!');
        setTimeout(function() {
                        window.location.href = 'admin_orders.php';
                    }, 0);</script>";
    }
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $delete_order = mysqli_query($conn, "DELETE FROM orders WHERE id = '$id'");
    if ($delete_order) {
        echo "<script>alert('Order deleted Successfully!');
        setTimeout(function() {
                        window.location.href = 'admin_orders.php';
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

    <!-- Admin Orders Section Starts  -->

    <section class="admin_orders">

        <h1 class="title">Placed Orders</h1>

        <div class="box-container">

            <?php

            $select_orders = mysqli_query($conn, "SELECT * FROM orders");
            if (mysqli_num_rows($select_orders) > 0) {
                while ($fetch_orders = mysqli_fetch_assoc($select_orders)) {

            ?>

                    <div class="box">
                        <p>User ID : <?php echo $fetch_orders['user_id']; ?></p>
                        <p>Placed On : <?php echo $fetch_orders['placed_on']; ?></p>
                        <p>Name : <?php echo $fetch_orders['name']; ?></p>
                        <p>Email : <?php echo $fetch_orders['email']; ?></p>
                        <p>Number : <?php echo $fetch_orders['number']; ?></p>
                        <p>Address : <?php echo $fetch_orders['address']; ?></p>
                        <p>Total Products : <?php echo $fetch_orders['total_products']; ?></p>
                        <p>Total Price : $<?php echo $fetch_orders['total_price']; ?>/-</p>
                        <p>Payment Method : <?php echo $fetch_orders['method']; ?></p>
                        <form action="admin_orders.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $fetch_orders['id']; ?>">
                            <select name="payment_status">
                                <option value="pending" <?php if ($fetch_orders['payment_status'] == 'pending') {
                                                            echo 'selected disabled';
                                                        } ?>>Pending</option>
                                <option value="completed" <?php if ($fetch_orders['payment_status'] == 'completed') {
                                                                echo 'selected disabled';
                                                            } ?>>Completed</option>
                            </select>
                            <button type="submit" name="update" class="btn">Update</button>
                            <button type="submit" name="delete" class="btn">Delete</button>
                        </form>
                    </div>

            <?php
                }
            } else {
                echo '<p>No Orders Placed Yet!</p>';
            }
            ?>
        </div>

    </section>

    <!-- Admin Orders Section Ends  -->

</body>

</html>