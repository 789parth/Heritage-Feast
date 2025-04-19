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

    $id = $_POST['id'];
    $address = $_POST['flat'] . ', ' . $_POST['building'] . ', ' . $_POST['area'] . ', ' . $_POST['town'] . ', ' . $_POST['city'] . ', ' . $_POST['state'] . ', ' . $_POST['country'] . ' - ' . $_POST['pin_code'];
    $update_address = mysqli_query($conn, "UPDATE users SET address = '$address' WHERE id = '$id'");
    if ($update_address) {
        echo "<script>alert('Address Updated!')</script>";
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

<?php include("header.php"); ?>

<!-- Navbar Ends -->


<body>

    <!-- Update Address Section Starts -->

    <section class="form-container">

        <form action="update_address.php" method="post">
            <h3>Your Address</h3>
            <input type="hidden" name="id" value="<?php echo $fetch_profile['id']; ?>">
            <input type="text" name="flat" placeholder="Flat No." maxlength="50" class="box" required>
            <input type="text" name="building" placeholder="Building No." maxlength="50" class="box" required>
            <input type="text" name="area" placeholder="Area Name" maxlength="50" class="box" required>
            <input type="text" name="town" placeholder="Town Name" maxlength="50" class="box" required>
            <input type="text" name="city" placeholder="City Name" maxlength="50" class="box" required>
            <input type="text" name="state" placeholder="State Name" maxlength="50" class="box" required>
            <input type="text" name="country" placeholder="Country Name" maxlength="50" class="box" required>
            <input type="number" name="pin_code" placeholder="Enter Your Pincode" maxlength="6" min="0" max="999999" class="box" required>
            <button type="submit" name="submit" class="btn">Save Address</button>
        </form>

    </section>

    <!-- Update Address Section Ends -->

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