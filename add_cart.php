<?php
session_start();
include("connect.php");
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
} else {
    $user_id = NULL;
}
if (isset($_POST['add_to_cart'])) {
    if ($user_id == NULL) {
        echo "<script>alert('User not logged in.');
                setTimeout(function() {
                            window.location.href = 'login.php';
                        },0);
              </script>";
    } else {

        $pid = $_POST['pid'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $qty = $_POST['qty'];

        $check_cart_numbers = "SELECT * FROM cart WHERE user_id = '$user_id' AND name = '$name' ";
        $result = mysqli_query($conn, $check_cart_numbers);

        if (mysqli_num_rows($result) > 0) {

            echo "<script>alert('Already added to cart!');
            setTimeout(function() {
                         window.location.href = 'index.php';
                     },0);
            </script>";
        } else {

            $insert_cart = "INSERT INTO cart(user_id,pid,name,price,quantity,image) VALUES ('$user_id','$pid','$name','$price','$qty','$image')";

            if (mysqli_query($conn, $insert_cart)) {

                echo "<script>alert('Added to cart!');
            setTimeout(function() {
                         window.location.href = 'index.php';
                     },0);
            </script>";
            }
        }
    }
}
session_abort();