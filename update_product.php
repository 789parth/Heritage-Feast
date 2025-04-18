<?php include("connect.php"); ?>

<?php

if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
} else {
    $user_id = NULL;
}
?>

<?php

if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $name = $_POST['pname'];
    $price = $_POST['pprice'];
    $category = $_POST['pcategory'];
    $image = $_POST['pimage'];

    $update_product = mysqli_query($conn, "UPDATE products SET name = '$name', category = '$category' , price = '$price' , image = '$image' WHERE id = '$id';");

    if ($update_product) {
        echo "<script>alert('Product updated successfully!');
        setTimeout(function() {
                        window.location.href = 'admin_products.php';
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

    <!-- Admin Products Section Starts  -->

    <h1 class="title">Update Product</h1>

    <section class="form-container">

        <?php
        $id = $_GET['id'];
        $select_products = "SELECT * FROM products WHERE id = '$id' ";
        $result = mysqli_query($conn, $select_products);

        if (mysqli_num_rows($result) > 0) {

            while ($fetch_products = mysqli_fetch_assoc($result)) {

        ?>

                <form action="update_product.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                    <input type="text" name="pname" placeholder="Enter Product Name" class="box" value="<?php echo $fetch_products['name']; ?>" required>
                    <input type="number" name="pprice" placeholder="Enter Product Price" class="box" value="<?php echo $fetch_products['price']; ?>" min="1" required>
                    <select name="pcategory" required>
                        <option value="Select Category --" selected disabled>Select Category --</option>
                        <option value="main dish" <?php if ($fetch_products['category'] == 'main dish') {
                                                        echo 'selected';
                                                    } ?>>Main Dish</option>
                        <option value="fast food" <?php if ($fetch_products['category'] == 'fast food') {
                                                        echo 'selected';
                                                    } ?>>Fast Food</option>
                        <option value="drinks" <?php if ($fetch_products['category'] == 'drinks') {
                                                    echo 'selected';
                                                } ?>>Drinks</option>
                        <option value="desserts" <?php if ($fetch_products['category'] == 'desserts') {
                                                        echo 'selected';
                                                    } ?>>Desserts</option>
                    </select>
                    <input type="file" name="pimage" class="file" required>
                    <input type="submit" value="Update Product" name="submit" class="btn">
                </form>

        <?php
            }
        }
        ?>

    </section>

    <!-- Admin Products Section Ends  -->

</body>

</html>