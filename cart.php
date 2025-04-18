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

if (isset($_POST['update_qty'])) {
    $cart_id = $_POST['cart_id'];
    $qty = $_POST['qty'];
    $update_qty = "UPDATE cart SET quantity = '$qty' WHERE id = '$cart_id'";
    if (mysqli_query($conn, $update_qty)) {
        echo "<script>alert('Cart quantity updated!');
            setTimeout(function() {
                        window.location.href = 'cart.php';
                    }, 0);
            </script>";
    }
}

if (isset($_POST['delete_cart'])) {

    $cart_id = $_POST['cart_id'];
    $delete_cart = "DELETE FROM cart WHERE id = '$cart_id'";
    if (mysqli_query($conn, $delete_cart)) {
        echo "<script>alert('Cart item deleted!');
            setTimeout(function() {
                        window.location.href = 'cart.php';
                    }, 0);
            </script>";
    }
}

if (isset($_POST['delete_all'])) {

    $delete_all = "DELETE FROM cart WHERE user_id = '$user_id'";
    if (mysqli_query($conn, $delete_all)) {
        echo "<script>alert('Cart is empty!');
            setTimeout(function() {
                        window.location.href = 'cart.php';
                    }, 0);
            </script>";
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
    <link rel="stylesheet" href="cart.css">
</head>

<body>

    <!-- Navbar Starts -->

    <?php include("header.php"); ?>

    <!-- Navbar Ends -->


    <!-- Cart Section Starts -->

    <header>
        <h1>Shopping Cart</h1>
        <h5><a href="index.php"><span>Home</span></a> / <a href="cart.php">Cart</a></h5>
    </header>

    <h1 class="title">Your Cart</h1>

    <section class="products">

        <div class="box-container">

            <?php
            $grand_total = 0;
            $select_cart = "SELECT * FROM cart WHERE user_id='$user_id'";
            $result = mysqli_query($conn, $select_cart);

            if (mysqli_num_rows($result) > 0) {

                while ($fetch_cart = mysqli_fetch_assoc($result)) {
            ?>
                    <form action="" method="post" class="box">
                        <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                        <a href="quick_view.php?pid=<?php echo $fetch_cart['pid']; ?>" class="fas fa-eye"></a>
                        <button type="submit" name="delete_cart" class="fas fa-times" onclick="confirm('Delete this item from cart ?')"></button>
                        <img src="project images/<?php echo $fetch_cart['image']; ?>" class="image" alt="">
                        <div class="name"><?php echo $fetch_cart['name']; ?></div>
                        <div class="flex">
                            <div class="price"><span>$</span><?php echo $fetch_cart['price']; ?></div>
                            <input type="number" name="qty" class="qty" value="<?php echo $fetch_cart['quantity']; ?>" min="1" max="99" maxlength="2">
                            <button type="submit" name="update_qty" class="fas fa-edit"></button>
                        </div>
                        <div class="sub-total">Sub total : <span>$<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?></span></div>
                    </form>
            <?php
                    $grand_total += $sub_total;
                }
            } else {
                echo '<p class="empty">Your cart is empty!</p>';
            }

            ?>
        </div>

        <div class="cart-total">
            <p class="grand-total">Grand total : <span>$<?php echo $grand_total; ?></span></p>
            <a href="checkout.php" class="<?php echo ($grand_total > 1) ? '' : 'disabled'; ?>"><button class="btn">Proceed To Checkout</button></a>
        </div>

        <div class="more-btn">
            <form action="" method="post">
                <button type="submit" name="delete_all" class="delete-btn" onclick="confirm('Are you sure to delete all items from cart ?')">Delete All</button>
            </form>
        </div>

    </section>

    <!-- Cart Section Ends -->

</body>

<!-- Details Section Starts  -->

<?php include("detail.php"); ?>

<!-- Details Section Ends  -->


<!-- Footer Section Starts -->

<?php include("footer.php"); ?>

<!-- Footer Section Ends -->


<!-- Loader Section Starts -->

<!-- <?php include("loader.php"); ?> -->

<!-- Loader Section Ends -->

</html>