<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heritage Feast</title>
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</head>

<!-- Navbar Starts -->

<?php include("header.php"); ?>

<!-- Navbar Ends -->

<body>

    <!-- About Section Starts -->

    <header>
        <h1>About Us</h1>
        <h5><a href="index.php"><span>Home</span></a> / <a href="about.php">About</a></h5>
    </header>

    <section class="about">
        <div class="row">
            <div class="image">
                <img src="images/about-img.svg">
            </div>
            <div class="content">
                <h3>Why Choose Us ?</h3>
                <p>Heritage Feast Restaurant offers a timeless dining experience with authentic flavors, rich traditions, and a warm ambiance. Enjoy handcrafted dishes inspired by heritage recipes, blending culture and taste for a memorable feast. A perfect place for true food lovers!</p>
                <a href="menu.php"><button class="btn">Our Menu</button></a>
            </div>
        </div>
    </section>

    <!-- About Section Ends -->

    <!-- Steps Section Starts -->

    <section class="steps">

        <h1 class="title">3 Simple Steps</h1>

        <div class="box-container">
            <div class="box">
                <img src="images/step-1.png">
                <h3>Select Foods</h3>
            </div>
            <div class="box">
                <img src="images/step-2.png">
                <h3>Fast Delivery</h3>
            </div>
            <div class="box">
                <img src="images/step-3.png">
                <h3>Enjoy Meal</h3>
            </div>
        </div>
    </section>

    <!-- Steps Section Ends -->

    <!-- Reviews Section Starts -->

    <section class="reviews">
        <h1 class="title">Customer's Reviews</h1>
        <div class="swiper reviews-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide">
                    <img src="images/pic-1.png">
                    <p>Heritage Feast Restaurant delivers an exceptional dining experience with authentic flavors, rich traditions, and a cozy ambiance. Every dish is crafted with perfection, blending culture and taste beautifully. A must-visit for food lovers seeking quality and heritage in every bite!</p>
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-alt"></i>
                    </div>
                    <h3>John Doe</h3>
                </div>

                <div class="swiper-slide slide">
                    <img src="images/pic-2.png">
                    <p>Heritage Feast Restaurant delivers an exceptional dining experience with authentic flavors, rich traditions, and a cozy ambiance. Every dish is crafted with perfection, blending culture and taste beautifully. A must-visit for food lovers seeking quality and heritage in every bite!</p>
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-alt"></i>
                    </div>
                    <h3>John Doe</h3>
                </div>

                <div class="swiper-slide slide">
                    <img src="images/pic-3.png">
                    <p>Heritage Feast Restaurant delivers an exceptional dining experience with authentic flavors, rich traditions, and a cozy ambiance. Every dish is crafted with perfection, blending culture and taste beautifully. A must-visit for food lovers seeking quality and heritage in every bite!</p>
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-alt"></i>
                    </div>
                    <h3>John Doe</h3>
                </div>

                <div class="swiper-slide slide">
                    <img src="images/pic-4.png">
                    <p>Heritage Feast Restaurant delivers an exceptional dining experience with authentic flavors, rich traditions, and a cozy ambiance. Every dish is crafted with perfection, blending culture and taste beautifully. A must-visit for food lovers seeking quality and heritage in every bite!</p>
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-alt"></i>
                    </div>
                    <h3>John Doe</h3>
                </div>

                <div class="swiper-slide slide">
                    <img src="images/pic-5.png">
                    <p>Heritage Feast Restaurant delivers an exceptional dining experience with authentic flavors, rich traditions, and a cozy ambiance. Every dish is crafted with perfection, blending culture and taste beautifully. A must-visit for food lovers seeking quality and heritage in every bite!</p>
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-alt"></i>
                    </div>
                    <h3>John Doe</h3>
                </div>

                <div class="swiper-slide slide">
                    <img src="images/pic-6.png">
                    <p>Heritage Feast Restaurant delivers an exceptional dining experience with authentic flavors, rich traditions, and a cozy ambiance. Every dish is crafted with perfection, blending culture and taste beautifully. A must-visit for food lovers seeking quality and heritage in every bite!</p>
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-alt"></i>
                    </div>
                    <h3>John Doe</h3>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <script src="about-swiper.js"></script>
    </section>

    <!-- Reviews Section Ends -->

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