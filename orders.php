<!-- Loader Section Starts -->

<?php include("loader.php"); ?>

<!-- Loader Section Ends -->

<?php include("connect.php"); ?>
<?php
session_start();
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
} else {
    $user_id = NULL;
    echo "<script>alert('User not logged in.');
            setTimeout(function() {
                        window.location.href = 'login.php';
                    }, 0);
            </script>";
}
session_write_close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heritage Feast</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="home.css">
</head>

<!-- Navbar Starts -->

<?php include("header.php"); ?>

<!-- Navbar Ends -->

<body>

    <header>
        <h1>Your Orders</h1>
        <h5><a href="index.php"><span>Home</span></a> / <a href="orders.php">Orders</a></h5>
    </header>

    <!-- Order Section Starts -->

    <section class="orders">

        <h1 class="title">Orders Summary</h1>

        <div class="box-container">

            <?php

            $select_orders = mysqli_query($conn, "SELECT * FROM orders WHERE user_id = '$user_id'");
            if (mysqli_num_rows($select_orders) > 0) {

                while ($fetch_orders = mysqli_fetch_assoc($select_orders)) {

            ?>

                    <div class="box">

                        <p>Placed On : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
                        <p>Name : <span><?php echo $fetch_orders['name']; ?></span> </p>
                        <p>Number : <span><?php echo $fetch_orders['number']; ?></span> </p>
                        <p>Email : <span><?php echo $fetch_orders['email']; ?></span> </p>
                        <p>Payment Method : <span><?php echo $fetch_orders['method']; ?></span> </p>
                        <p>Your Orders : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
                        <p>Total Price : <span>$<?php echo $fetch_orders['total_price']; ?></span> </p>
                        <p>Payment Status : <span style="color: <?php if ($fetch_orders['payment_status'] == 'pending') {
                                                                    echo 'red';
                                                                } else {
                                                                    echo 'green';
                                                                } ?>;"><?php echo $fetch_orders['payment_status']; ?></span> </p>

                    </div>

            <?php

                }
            } else {
                echo '<p class="empty">No Orders Placed Yet!</p>';
            }

            ?>

        </div>

    </section>

    <!-- Order Section Ends -->

</body>

<!-- Details Section Starts  -->

<?php include("detail.php"); ?>

<!-- Details Section Ends  -->


<!-- Footer Section Starts -->

<?php include("footer.php"); ?>

<!-- Footer Section Ends -->


</html>