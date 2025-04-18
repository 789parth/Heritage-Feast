<?php
if (isset($_POST["submit"])) {
    include("connect.php");
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $number = trim($_POST["number"]);
    $msg = trim($_POST["msg"]);
    if ($name === "") {
        echo "<script>alert('Name is Required Field.')</script>";
    } elseif ($email === "") {
        echo "<script>alert('E-mail is Required Field.')</script>";
    } elseif ($number === "") {
        echo "<script>alert('Mobile Number is Required Field.')</script>";
    } elseif ($msg === "") {
        echo "<script>alert('Message is Required Field.')</script>";
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $name) && strlen($name) > 50) {
        echo "<script>alert('Invalid Name Format.')</script>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($email) > 50) {
        echo "<script>alert('Invalid E-mail Format.')</script>";
    } elseif (!preg_match("/^[0-9]{10}$/", $number)) {
        echo "<script>alert('Invalid Mobile Number.')</script>";
    } else {
        $sql = "INSERT INTO messages VALUES('','$user_id','$name','$email','$number','$msg',NOW())";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Thanks For Submitting Your Thoughts!!')</script>";
        } else {
            echo "<script>alert('Error Submitting Response!!');</script>";
        }
    }
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contact.css">
    <title>Heritage Feast</title>
</head>

<!-- Navbar Starts -->

<?php include("header.php"); ?>

<!-- Navbar Ends -->

<body>

    <!-- Contact Section Starts -->

    <header>
        <h1>Contact</h1>
        <h5><a href="index.php"><span>Home</span></a> / <a href="contact.php">Contact</a></h5>
    </header>

    <section class="contact">

        <div class="row">

            <div class="image">
                <img src="images/contact-img.svg">
            </div>

            <form action="contact.php" method="post">
                <h3>Tell Us Something!</h3>
                <input type="text" name="name" placeholder="Enter Your Name" class="box">
                <input type="text" name="email" placeholder="Enter Your E-mail" class="box">
                <input type="text" name="number" placeholder="Enter Your Mobile Number" class="box">
                <textarea name="msg" placeholder="Enter Your Message" cols="30" rows="10" class="box"></textarea>
                <button type="submit" name="submit" class="btn">Send Message</button>
            </form>

        </div>

    </section>

    <!-- Contact Section Ends -->

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