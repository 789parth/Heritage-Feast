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

    $name = $_POST['pname'];
    $price = $_POST['pprice'];
    $category = $_POST['pcategory'];
    $image = $_POST['pimage'];

    $insert_product = mysqli_query($conn, "INSERT INTO products(name,price,category,image) VALUES ('$name','$price','$category','$image')");

    if ($insert_product) {
        echo "<script>alert('Product added successfully!');
        setTimeout(function() {
                        window.location.href = 'admin_products.php';
                    }, 0);</script>";
    }
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $delete_product = mysqli_query($conn, "DELETE FROM products WHERE id = '$id'");
    if ($delete_product) {
        echo "<script>alert('Product deleted successfully!');
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

    <section class="form-container">

        <form action="admin_products.php" method="post">
            <h3>Add Product</h3>
            <input type="text" name="pname" placeholder="Enter Product Name" class="box" required>
            <input type="number" name="pprice" placeholder="Enter Product Price" class="box" min="1" required>
            <select name="pcategory" required>
                <option value="Select Category --" selected disabled>Select Category --</option>
                <option value="main dish">Main Dish</option>
                <option value="fast food">Fast Food</option>
                <option value="drinks">Drinks</option>
                <option value="desserts">Desserts</option>
            </select>
            <input type="file" name="pimage" class="file" required>
            <input type="submit" value="Add Product" name="submit" class="btn">
        </form>

    </section>



    <section class="products">

        <h1 class="title">Products</h1>

        <div class="box-container">
            <?php

            $select_products = "SELECT * FROM products";
            $result = mysqli_query($conn, $select_products);

            if (mysqli_num_rows($result) > 0) {

                while ($fetch_products = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="box">
                        <form action="admin_products.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $fetch_products['id']; ?>">
                            <input type="hidden" name="name" value="<?php echo $fetch_products['name']; ?>">
                            <input type="hidden" name="price" value="<?php echo $fetch_products['price']; ?>">
                            <input type="hidden" name="image" value="<?php echo $fetch_products['image']; ?>">
                            <img src="project images/<?php echo $fetch_products['image']; ?>" alt="" class="image">
                            <a href="category.php?category=<?php echo $fetch_products['category']; ?>" class="cat"><?php echo $fetch_products['category']; ?></a>
                            <div class="name"><br><?php echo $fetch_products['name']; ?></div>
                            <div class="flex">

                                <div class="price"><span>$</span><?php echo $fetch_products['price']; ?></div>
                                <input type="number" name="qty" class="qty" value="1" min="1" max="99" maxlength="2">

                            </div>
                            <br><br>
                            <a href="update_product.php?id=<?php echo $fetch_products['id']; ?>" class="btn">Update</a>
                            <button type="submit" name="delete" class="btn" onclick="confirm('Are you sure to delete this product ?')">Delete</button>
                        </form>
                    </div>
            <?php
                }
            } else {
                echo '<div class="empty">No Products Added Yet!</div>';
            }
            ?>
        </div>

    </section>

    <!-- Admin Products Section Ends  -->

</body>

</html>