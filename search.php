<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heritage Feast</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="search.css">
</head>

<!-- Navbar Starts -->

<?php include("header.php"); ?>

<!-- Navbar Ends -->

<body>

    <!-- Search Section Starts -->

    <section class="search-form">

        <form action="" method="post">

            <input type="text" name="search_box" placeholder="Search Here..." required maxlength="100" class="box">
            <button type="submit" class="fas fa-search" name="search_btn"></button>

        </form>

    </section>

    <!-- Search Section Ends -->

    <section class="products">
        <div class="box-container">
            <?php
            if (isset($_POST['search_box']) or isset($_POST['search_btn'])) {
                $search_box = $_POST['search_box'];
                $select_products = "SELECT * FROM products WHERE name LIKE '%{$search_box}%'";
                $result = mysqli_query($conn, $select_products);

                if (mysqli_num_rows($result) > 0) {

                    while ($fetch_products = mysqli_fetch_assoc($result)) {
            ?>
                        <div class="box">
                            <form action="add_cart.php" method="post">
                                <input type="hidden" name="pid" value="<?php echo $fetch_products['id']; ?>">
                                <input type="hidden" name="name" value="<?php echo $fetch_products['name']; ?>">
                                <input type="hidden" name="price" value="<?php echo $fetch_products['price']; ?>">
                                <input type="hidden" name="image" value="<?php echo $fetch_products['image']; ?>">
                                <a href="quick_view.php?pid=<?php echo $fetch_products['id']; ?>" class="fas fa-eye"></a>
                                <button type="submit" name="add_to_cart" class="fas fa-shopping-cart"></button>
                                <img src="project images/<?php echo $fetch_products['image']; ?>" alt="" class="image">
                                <a href="category.php?category=<?php echo $fetch_products['category']; ?>" class="cat"><?php echo $fetch_products['category']; ?></a>
                                <div class="name"><br><?php echo $fetch_products['name']; ?></div>
                                <div class="flex">

                                    <div class="price"><span>$</span><?php echo $fetch_products['price']; ?></div>
                                    <input type="number" name="qty" class="qty" value="1" min="1" max="99" maxlength="2">

                                </div>
                            </form>
                        </div>
            <?php
                    }
                } else {
                    echo '<div class="empty">No Products Added Yet!</div>';
                }
            }
            ?>
        </div>
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