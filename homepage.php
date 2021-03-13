<?php 
    include 'topper.php';
?>
<body class="full-wrapper">
<!-- ? Preloader Start -->
<div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/FiFO.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader End-->

<?php
    include 'header.php';
?>

    <main>
        <div class="slider-area">
                <div class="slider-active dot-style">
                    <!-- Single -->
                    <div class="single-slider slider-bg1 hero-overly slider-height d-flex align-items-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-xl-8 col-lg-9">
                                    <!-- Hero Caption -->
                                    <div class="hero__caption">
                                        <h1>the best<br>your choice<br>for you</h1>
                                        <a href="shop.php?productCategory=AAA01" class="btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single -->
                    <div class="single-slider slider-bg2 hero-overly slider-height d-flex align-items-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-xl-8 col-lg-9">
                                    <!-- Hero Caption -->
                                    <div class="hero__caption">
                                        <h1>the best<br>your choice<br>for you</h1>
                                        <a href="shop.php?productCategory=AAA01" class="btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single -->
                    <div class="single-slider slider-bg3 hero-overly slider-height d-flex align-items-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-xl-8 col-lg-9">
                                    <!-- Hero Caption -->
                                    <div class="hero__caption">
                                        <h1>the best<br>your choice<br>for you</h1>
                                        <a href="shop.php?productCategory=AAA01" class="btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Hero -->

        <!--? Popular Items Start -->
        <div class="popular-items pt-50">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-popular-items mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                                <div class="popular-img">
                                    <img src="assets/img/show/popular01.png" alt="">
                                    <div class="img-cap">
                                        <span>VGA</span>
                                    </div>
                                    <div class="favorit-items">
                                        <a href="shop.php?productCategory=AAA08" class="btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-popular-items mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                                <div class="popular-img">
                                    <img src="assets/img/show/popular02.png" alt="">
                                    <div class="img-cap">
                                        <span>CPU</span>
                                    </div>
                                    <div class="favorit-items">
                                        <a href="shop.php?productCategory=AAA06" class="btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-popular-items mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                                <div class="popular-img">
                                    <img src="assets/img/show/popular04.png" alt="">
                                    <div class="img-cap">
                                        <span>RAM</span>
                                    </div>
                                    <div class="favorit-items">
                                        <a href="shop.php?productCategory=AAA09" class="btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-popular-items mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
                                <div class="popular-img">
                                    <img src="assets/img/show/popular05.png" alt="">
                                    <div class="img-cap">
                                        <span>Storage</span>
                                    </div>
                                    <div class="favorit-items">
                                        <a href="shop.php?productCategory=AAA10" class="btn ">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- Popular Items End -->
        
        <!--? Gaming Gear -->
            <div class="new-arrival">
                <div class="container">
                    <!-- Section tittle -->
                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-8 col-md-10">
                            <div class="section-tittle mb-60 text-center wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                                <h2>Gaming<br>Gear</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="single-new-arrival mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                                <div class="popular-img">
                                    <img src="assets/img/show/mouse.png" alt="">
                                    <div class="favorit-items">
                                        <!-- <span class="flaticon-heart"></span> -->
                                        <?php 
                                            if (!isset($_SESSION['username'])) {
                                                echo '<a href = "login-FiFO.php"><img src="assets/img/show/cart.png" alt=""></a>';
                                            }
                                            else if(isset($_SESSION['username'])){
                                                echo '<a href = "#"><img src="assets/img/show/cart.png" alt=""></a>';
                                            }
                                        ?>
                                        
                                    </div>
                                </div>
                                <div class="popular-caption">
                                    <h3><a href="shop.php?productCategory=AAA01">Logitech g 502 hero</a></h3>
                                    <span>2590 THB.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="single-new-arrival mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                                <div class="popular-img">
                                    <img src="assets/img/show/keyborad2.png" alt="">
                                    <div class="favorit-items">
                                        <!-- <span class="flaticon-heart"></span> -->
                                        <img src="assets/img/show/cart.png" alt="">
                                    </div>
                                </div>
                                <div class="popular-caption">
                                    <h3><a href="shop.php?productCategory=AAA01">K68 Cherry MX RED</a></h3>
                                    <span>2890 THB.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="single-new-arrival mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                                <div class="popular-img">
                                    <img src="assets/img/show/headset.png" alt="">
                                    <div class="favorit-items">
                                        <!-- <span class="flaticon-heart"></span> -->
                                        <img src="assets/img/show/cart.png" alt="">
                                    </div>
                                </div>
                                <div class="popular-caption">
                                    <h3><a href="shop.php?productCategory=AAA01">HyperX Cloud Flight S Wireless </a></h3>
                                    <span>5590 THB.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="single-new-arrival mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                                <div class="popular-img">
                                    <img src="assets/img/show/microphone.png" alt="">
                                    <div class="favorit-items">
                                        <!-- <span class="flaticon-heart"></span> -->
                                        <img src="assets/img/show/cart.png" alt="">
                                    </div>
                                </div>
                                <div class="popular-caption">
                                    <h3><a href="shop.php?productCategory=AAA01">Beyerdynamic Fox Professional</a></h3>
                                    <span>6990 THB.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--? building -->
                <section class="collection section-bg2 section-padding30 section-over1 ml-15 mr-15" data-background="assets/img/show/building.png">
                    <div class="container-fluid"></div>
                        <div class="row justify-content-center">
                            <div class="col-xl-7 col-lg-9">
                                <div class="single-question text-center">
                                    <h2 class="wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">You can building<br>a computer with yourself</h2>
                                    <a href="buildpc.php" class="btn class=" wow fadeInUp data-wow-duration="2s " data-wow-delay=".4s ">Build its</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
        <!--? Services Area Start -->
            <div class="categories-area section-padding40 gray-bg ">
                <div class="container-fluid ">
                    <div class="row ">
                        <div class="col-lg-3 col-md-6 col-sm-6 ">
                            <div class="single-cat mb-50 wow fadeInUp " data-wow-duration="1s " data-wow-delay=".2s ">
                                <div class="cat-icon ">
                                    <img src="assets/img/icon/services1.svg " alt=" ">
                                </div>
                                <div class="cat-cap ">
                                    <h5>Fast & Free Delivery</h5>
                                    <p>Free delivery on all orders</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 ">
                            <div class="single-cat mb-50 wow fadeInUp " data-wow-duration="1s " data-wow-delay=".2s ">
                                <div class="cat-icon ">
                                    <img src="assets/img/icon/services2.svg " alt=" ">
                                </div>
                                <div class="cat-cap ">
                                    <h5>Fast & Free Delivery</h5>
                                    <p>Free delivery on all orders</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 ">
                            <div class="single-cat mb-30 wow fadeInUp " data-wow-duration="1s " data-wow-delay=".4s ">
                                <div class="cat-icon ">
                                    <img src="assets/img/icon/services3.svg " alt=" ">
                                </div>
                                <div class="cat-cap ">
                                    <h5>Fast & Free Delivery</h5>
                                    <p>Free delivery on all orders</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 ">
                            <div class="single-cat wow fadeInUp " data-wow-duration="1s " data-wow-delay=".5s ">
                                <div class="cat-icon ">
                                    <img src="assets/img/icon/services4.svg " alt=" ">
                                </div>
                                <div class="cat-cap ">
                                    <h5>Fast & Free Delivery</h5>
                                    <p>Free delivery on all orders</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--? Services Area End -->
    

    </main>

<?php
    include 'footer.php';
    include 'lower.php';
?>