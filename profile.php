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

    <!-- Profile Section Starts -->

    <section class="user-profile">

        <div class="profile-box">

            <img src="images/user-icon.png">
            <p><i class="fas fa-user"></i> <span><?php echo $fetch_profile['name']; ?></span></p>
            <p><i class="fas fa-envelope"></i> <span><?php echo $fetch_profile['email']; ?></span></p>
            <p><i class="fas fa-phone"></i> <span><?php echo $fetch_profile['number']; ?></span></p>
            <a href="update_profile.php"><button class="btn">Update Info</button></a>
            <p><i class="fas fa-map-marker-alt"></i> <span><?php if ($fetch_profile['address'] == '') {
                                                                echo 'Please Enter Your Address.';
                                                            } else {
                                                                echo $fetch_profile['address'];
                                                            }  ?></span></p>
            <a href="update_address.php"><button class="btn">Update Address</button></a>


        </div>

    </section>

    <!-- Profile Section Ends -->

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