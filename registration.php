<!-- Loader Section Starts -->

<?php include("loader.php"); ?>

<!-- Loader Section Ends -->

<?php
include("connect.php");
$usernameError = "";
$passwordError = "";
$emailError = "";
$boll =  true;
if (isset($_POST["submit"])) {
    $user_id = trim($_POST["name"]);
    $pass = trim($_POST["password"]);
    $email = trim($_POST["email"]);
    $roll = $_POST["roll"];
    if ($user_id === "") {
        $usernameError = "* Username Required.";
        $boll = false;
    }
    if ($email === NULL) {
        $emailError = "* E-mail Required.";
        $boll = false;
    }
    if ($pass === NULL) {
        $passwordError = "* Password Required.";
        $boll = false;
    }
    if ((strlen($user_id) < 3 || strlen($user_id) > 20) && $user_id !== NULL) {
        $usernameError = "* Username must be between 3 and 20 characters.";
        $boll = false;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) && $email !== NULL) {
        $emailError = "* Invalid email format.";
        $boll = false;
    }
    if (strlen($pass) < 8 && $pass !== NULL) {
        $passwordError = "* Password must be at least 8 characters long.";
        $boll = false;
    }
    $sql = "SELECT name from users WHERE name='$user_id'";
    $result = mysqli_query($conn, $sql);
    if ($result === $user_id) {
        $usernameError = "* Username already exist.";
        $boll = false;
    }
    if ($boll) {
        $sql = "SELECT * FROM users WHERE name='$user_id' AND password='$pass' AND roll='$roll'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            echo "<script>alert('User Already Registered.')</script>";
        } else {
            $sql = "INSERT INTO users (name,password,email,roll) VALUES ('$user_id','$pass','$email','$roll')";
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('User Successfully Registered.')</script>";
            }
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
    <link rel="stylesheet" href="registration.css">
</head>

<body>

    <!-- Navbar Starts -->

    <?php include("header.php"); ?>

    <!-- Navbar Ends -->

    <!-- Register Section Starts -->

    <div class="container">
        <h1 class="title">Register Now</h1>
        <form action="registration.php" id="loginForm" method="post">
            <div class="form-group">
                <input type="text" id="username" name="name" placeholder="Enter Your User-ID">
                <div class="error" id="usernameError"><?php echo "$usernameError" ?></div>
            </div>
            <div class="form-group">
                <input type="text" id="email" name="email" placeholder="Enter Your E-mail">
                <div class="error" id="emailError"><?php echo "$emailError" ?></div>
            </div>
            <div class="form-group">
                <input type="text" id="password" name="password" placeholder="Enter Your Password">
                <div class="error" id="passwordError"><?php echo "$passwordError" ?></div>
            </div>
            <div class="form-group">
                <select name="roll" id="roll">
                    <option value="admin" selected disabled>Admin</option>
                    <option value="user">User</option>
                </select>
                <div class="error" id="rollError"></div>
            </div>
            <button type="submit" name="submit" class="btn">Register Now</button>
        </form>
        <p>Already have an account? <a href="login.php">Login Here</a></p>
    </div>

    <!-- Register Section Starts -->

</body>


<!-- Details Section Starts  -->

<?php include("detail.php"); ?>

<!-- Details Section Ends  -->


<!-- Footer Section Starts -->

<?php include("footer.php"); ?>

<!-- Footer Section Ends -->

</html>