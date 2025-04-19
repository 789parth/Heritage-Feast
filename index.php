<!-- Loader Section Starts -->

<?php include("loader.php"); ?>

<!-- Loader Section Ends -->

<?php include("connect.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heritage Feast</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</head>


<!-- Navbar Starts -->

<?php include("header.php"); ?>

<!-- Navbar Ends -->


<!-- Home Slider Section Starts -->

<section class="home">
    <div class="swiper home-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide">
                <div class="content">
                    <span>Order Online</span>
                    <h3>Delicious Pizza</h3>
                    <a href="menu.php"><button class="btn">See Menus</button></a>
                </div>
                <div class="image">
                    <img src="images/home-img-1.png">
                </div>
            </div>
            <div class="swiper-slide slide">
                <div class="content">
                    <span>Order Online</span>
                    <h3>Chezzy Hamburger</h3>
                    <a href="menu.php"><button class="btn">See Menus</button></a>
                </div>
                <div class="image">
                    <img src="images/home-img-2.png">
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <script src="home-swiper.js"></script>
</section>

<!-- Home Slider Section Ends -->


<!-- Home Category Section Starts -->

<section class="home-category">
    <h1 class="title">Food Category</h1>
    <div class="box-container">
        <a href="category.php?category=fast food" class="box">
            <img src="images/cat-1.png">
            <h3>Fast Food</h3>
        </a>
        <a href="category.php?category=main dish" class="box">
            <img src="images/cat-2.png">
            <h3>Main Dishes</h3>
        </a>
        <a href="category.php?category=drinks" class="box">
            <img src="images/cat-3.png">
            <h3>Drinks</h3>
        </a>
        <a href="category.php?category=desserts" class="box">
            <img src="images/cat-4.png">
            <h3>Desserts</h3>
        </a>
    </div>
</section>

<!-- Home Category Section Ends -->


<!-- Home Products Section Starts -->

<section class="products">
    <h1 class="title">Latest Food</h1>
    <div class="box-container">
        <?php

        $select_products = "SELECT * FROM products LIMIT 6";
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
        ?>
    </div>

    <div class="more-btn">
        <a href="menu.php"><button class="btn">Load More</button></a>
    </div>

</section>

<!-- Home Products Section Ends -->


<!-- Details Section Starts  -->

<?php include("detail.php"); ?>

<!-- Details Section Ends  -->

</body>

<!-- Footer Section Starts -->

<?php include("footer.php"); ?>

<!-- Footer Section Ends -->


</html>