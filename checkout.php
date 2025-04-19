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

if (isset($_POST['submit'])) {

    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $address = $_POST["address"];
    $total_products = $_POST["total_products"];
    $total_price = $_POST["total_price"];
    $method = $_POST["method"];

    $check_cart = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$name'");
    if (mysqli_num_rows($check_cart) > 0) {

        if ($address == '') {
            echo "<script>alert('Please Enter Your Address!')</script>";
        } else {
            $insert_order = mysqli_query($conn, "INSERT INTO orders(user_id,name,number,email,method,address,total_products,total_price) VALUES ('$name','$name','$number','$email','$method','$address','$total_products','$total_price')");
            $delete_cart = mysqli_query($conn, "DELETE FROM cart WHERE user_id = '$name'");
            echo "<script>alert('Order Placed Successfully!')</script>";
        }
    } else {
        echo "<script>alert('Your Cart is Empty!')</script>";
    }
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

<?php

include("header.php");

?>

<!-- Navbar Ends -->

<body>

    <!-- Checkout Section Starts -->

    <header>
        <h1>Checkout</h1>
        <h5><a href="index.php"><span>Home</span></a> / <a href="checkout.php">Checkout</a></h5>
    </header>

    <section class="checkout">

        <h1 class="title">Order Summary</h1>

        <form action="" method="post">

            <div class="cart-items">

                <h3>Cart Items</h3>

                <?php
                $grand_total = 0;
                $cart_items[] = '';
                $select_cart = "SELECT * FROM cart WHERE user_id='$user_id'";
                $result = mysqli_query($conn, $select_cart);

                if (mysqli_num_rows($result) > 0) {

                    while ($fetch_cart = mysqli_fetch_assoc($result)) {
                        $cart_items[] = $fetch_cart['name'] . ' (' . $fetch_cart['price'] . ' x ' . $fetch_cart['quantity'] . ') - ';
                        $total_products = implode($cart_items);
                        $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);
                ?>

                        <p><span class="name"><?php echo $fetch_cart['name']; ?></span><span class="price">$<?php echo $fetch_cart['price']; ?> x <?php echo $fetch_cart['quantity']; ?></span></p>

                <?php
                    }
                } else {
                    echo '<p class="empty">Your cart is empty!</p>';
                }
                ?>

                <p class="grand-total">
                    <span class="name">Grand total : </span>
                    <span class="price">$<?php echo $grand_total; ?></span>
                </p>
                <a href="cart.php" class="btn">View Cart</a>

            </div>

            <input type="hidden" name="total_products" value="<?php echo $total_products; ?>">
            <input type="hidden" name="total_price" value="<?php echo $grand_total; ?>">
            <input type="hidden" name="id" value="<?php echo $fetch_profile['id']; ?>">
            <input type="hidden" name="name" value="<?php echo $fetch_profile['name']; ?>">
            <input type="hidden" name="email" value="<?php echo $fetch_profile['email']; ?>">
            <input type="hidden" name="number" value="<?php echo $fetch_profile['number']; ?>">
            <input type="hidden" name="address" value="<?php echo $fetch_profile['address']; ?>">


            <div class="user-info">

                <h3>User Info</h3>
                <p><i class="fas fa-user"></i> <span><?php echo $fetch_profile['name']; ?></span></p>
                <p><i class="fas fa-envelope"></i> <span><?php echo $fetch_profile['email']; ?></span></p>
                <p><i class="fas fa-phone"></i> <span><?php echo $fetch_profile['number']; ?></span></p>
                <a href="update_profile.php" class="btn">Update Info</a>
                <p><i class="fas fa-map-marker-alt"></i> <span><?php if ($fetch_profile['address'] == '') {
                                                                    echo 'Please Enter Your Address.';
                                                                } else {
                                                                    echo $fetch_profile['address'];
                                                                }  ?></span></p>
                <a href="update_address.php" class="btn">Update Address</a>
                <select name="method" class="select-box" required>
                    <option value="" disabled selected>Select Payment Method -- </option>
                    <option value="Cash on Delivery">Cash on Delivery</option>
                    <option value="Credit Card">Credit Card</option>
                    <option value="Paytm">Paytm</option>
                    <option value="Paypal">Paypal</option>
                </select>
                <button type="submit" name="submit" value="Place Order" class="info_btn <?php if ($fetch_profile['address'] == '') 'disabled'; ?> ">Place Order</button>
            </div>

        </form>

    </section>

    <!-- Checkout Section Ends -->

</body>

<!-- Details Section Starts  -->

<?php include("detail.php"); ?>

<!-- Details Section Ends  -->


<!-- Footer Section Starts -->

<?php include("footer.php"); ?>

<!-- Footer Section Ends -->


<!-- Loader Section Starts -->

<?php include("loader.php"); ?>

<!-- Loader Section Ends -->

</html>