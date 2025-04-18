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

    if (!empty($name)) {
        $update_name = "UPDATE users SET name = '$name' WHERE id = '$id'";
        if (mysqli_query($conn, $update_name)) {
            echo "<script>alert('Username Updated!')</script>";
        } else echo "Username not updated";
        $_SESSION["user_id"] = $name;
        $user_id = $name;
        $select_profile = mysqli_query($conn, "SELECT * FROM users WHERE name='$user_id'");
        if ($select_profile && mysqli_num_rows($select_profile) > 0) {
            $fetch_profile = mysqli_fetch_assoc($select_profile);
        }
    }

    if (!empty($email)) {
        $select_email = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $select_email);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Email is Already Taken!')</script>";
        } else {
            $update_email = "UPDATE users SET email = '$email' WHERE id = '$id'";
            if (mysqli_query($conn, $update_email)) {
                echo "<script>alert('Email Updated!')</script>";
            }
        }
    }

    if (!empty($number)) {
        $select_number = "SELECT * FROM users WHERE number = '$number'";
        $result = mysqli_query($conn, $select_number);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Number is Already Taken!')</script>";
        } else {
            $update_number = "UPDATE users SET number = '$number' WHERE id = '$id'";
            if (mysqli_query($conn, $update_number)) {
                echo "<script>alert('Number Updated!')</script>";
            }
        }
    }

    $select_prev_pass = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
    if ($select_prev_pass && mysqli_num_rows($select_prev_pass) > 0) {
        $fetch_prev_pass = mysqli_fetch_assoc($select_prev_pass);
    }
    $prev_pass = $fetch_prev_pass['password'];
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $confirm_pass = $_POST['confirm_pass'];


    if (!empty($old_pass) && !empty($new_pass) && !empty($confirm_pass) && $old_pass !== $prev_pass) {
        echo "<script>alert('Old Password Not Matched!')</script>";
    } elseif (!empty($old_pass) && !empty($new_pass) && !empty($confirm_pass) && $old_pass === $new_pass) {
        echo "<script>alert('Please Enter New Password!')</script>";
    } elseif (!empty($old_pass) && !empty($new_pass) && !empty($confirm_pass) && $new_pass !== $confirm_pass) {
        echo "<script>alert('New Password and Confirm Password is Different!')</script>";
    } else {
        $update_pass = "UPDATE users SET password = '$new_pass' WHERE id = '$id'";
        if (mysqli_query($conn, $update_pass)) {
            echo "<script>alert('Password Updated!')</script>";
        }
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

    <!-- Update Profile Section Starts -->

    <section class="form-container">

        <form action="update_profile.php" method="post">
            <h3>Update Profile</h3>
            <input type="hidden" name="id" value="<?php echo $fetch_profile['id']; ?>">
            <input type="text" name="name" placeholder="<?php echo $fetch_profile['name']; ?>" maxlength="50" class="box">
            <input type="email" name="email" placeholder="<?php echo $fetch_profile['email']; ?>" maxlength="50" class="box">
            <input type="number" name="number" placeholder="<?php echo $fetch_profile['number']; ?>" maxlength="10" min="0" max="9999999999" class="box">

            <input type="password" name="old_pass" oninput="this.value = this.value.replace(/\s/g,'')" placeholder="Enter your old password" maxlength="50" class="box">
            <input type="password" name="new_pass" oninput="this.value = this.value.replace(/\s/g,'')" placeholder="Enter your new password" maxlength="50" class="box">
            <input type="password" name="confirm_pass" oninput="this.value = this.value.replace(/\s/g,'')" placeholder="Confirm your new password" maxlength="50" class="box">
            <input type="submit" value="Update Now" name="submit" class="btn">
        </form>

    </section>

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