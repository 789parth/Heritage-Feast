<!-- Loader Section Starts -->

<?php include("loader.php"); ?>

<!-- Loader Section Ends -->

<?php

// Navbar Starts 

include("header.php");

// Navbar Ends

$usernameError = "";
$passwordError = "";
if (isset($_POST["submit"])) {
    $user_id = trim($_POST["name"]);
    $pass = trim($_POST["password"]);
    if ($user_id === "") {
        $usernameError = "* Username required";
    }
    if ($pass === "") {
        $passwordError = "* Password required";
    }
    if (!empty($user_id) && !empty($pass)) {
        include("connect.php");
        $sql = "SELECT * FROM users WHERE name = '$user_id' AND password = '$pass' ";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $_SESSION["user_id"] = $user_id;
            echo "<script>alert('User successfully logged in.');
            setTimeout(function() {
                        window.location.href = 'index.php';
                    }, 400);
            </script>";
            exit;
        } else {
            echo "<script>alert('User not registered.')</script>";
        }
        mysqli_close($conn);
    }
}
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heritage Feast</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <!-- Login Section Starts -->

    <div class="container">
        <form action="login.php" id="loginForm" method="post">
            <h1 class="title">Login Now</h1>
            <div class="form-group">
                <input type="text" id="username" name="name" placeholder="Enter Your User-ID">
                <div class="error" id="usernameError"><?php echo "$usernameError" ?></div>
            </div>
            <div class="form-group">
                <input type="text" id="password" name="password" placeholder="Enter Your Password">
                <div class="error" id="passwordError"><?php echo "$passwordError" ?></div>
            </div>
            <button type="submit" name="submit" class="btn">Login Now</button>
        </form>
        <p>Don't have an account? <a href="registration.php">Register here</a></p>
    </div>

    <!-- Login Section Starts -->

</body>


<!-- Details Section Starts  -->

<?php include("detail.php"); ?>

<!-- Details Section Ends  -->


<!-- Footer Section Starts -->

<?php include("footer.php"); ?>

<!-- Footer Section Ends -->


</html>