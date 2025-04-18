<?php include("connect.php"); ?>

<?php
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
} else {
    $user_id = NULL;
}
?>

<?php

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $delete_message = mysqli_query($conn, "DELETE FROM messages WHERE id = '$id'");
    if ($delete_message) {
        echo "<script>alert('Message deleted successfully!');
        setTimeout(function() {
                        window.location.href = 'admin_messages.php';
                    }, 0);</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="home.css">
</head>


<!-- Admin Navbar Starts -->

<?php include("admin_header.php"); ?>

<!-- Admin Navbar Ends -->


<body>

    <!-- Admin Messages Section Starts  -->

    <section class="admin_orders">

        <h1 class="title">Messages</h1>

        <div class="box-container">

            <?php

            $select_messages = mysqli_query($conn, "SELECT * FROM messages");
            if (mysqli_num_rows($select_messages) > 0) {
                while ($fetch_messages = mysqli_fetch_assoc($select_messages)) {

            ?>

                    <div class="box">
                        <p>User ID : <?php echo $fetch_messages['name']; ?></p>
                        <p>Email : <?php echo $fetch_messages['email']; ?></p>
                        <p>Mobile No : <?php echo $fetch_messages['number']; ?></p>
                        <p>Message : <?php echo $fetch_messages['message']; ?></p>
                        <form action="admin_messages.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $fetch_messages['id']; ?>">
                            <button type="submit" name="delete" class="btn">Delete</button>
                        </form>
                    </div>

            <?php
                }
            } else {
                echo '<p>No Messages Archived Yet!</p>';
            }
            ?>
        </div>

    </section>

    <!-- Admin Messages Section Ends  -->

</body>

</html>