<?php
session_start();
include("connect.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heritage Feast</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="navbar.css">
</head>

<body>
    <div class="navbar">
        <div class="navlogo">
            <i class="material-icons">restaurant</i>
            <h2>Heritage Feast</h2>
        </div>

        <div class="navlinks">
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="menu.php">Menu</a>
            <a href="orders.php">Orders</a>
            <a href="contact.php">Contact</a>
        </div>

        <div class="navicons">
            <?php
            if (isset($_SESSION["user_id"])) {
                $user_id = $_SESSION["user_id"];
            } else {
                $user_id = NULL;
            }
            $value = 0;
            if (!empty($user_id)) {
                $sql = "SELECT COUNT(user_id) AS total FROM cart WHERE user_id='$user_id';";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $value = $row['total'];
                }
            }
            ?>
            <a href="search.php"><i class="material-icons">search</i></a>
            <a href="cart.php"><i class="material-icons">shopping_cart</i><span>(<?php echo $value; ?>)</span></a>
            <a href="#" id="user-btn"><i class="material-icons">person</i></a>
            <!-- <a href="search.php"><i class="material-icons">menu</i></a> -->
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
                <br><br>
                <?php
                if ($fetch_profile["roll"] === "admin") {
                    echo "<a href='admin.php' class='abtn'>Admin Panel</a>";
                } else {
                    echo "<a href='login.php' class='link'>login</a> or <a href='register.php' class='link'>register</a>";
                }
                ?>
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
</body>

</html>