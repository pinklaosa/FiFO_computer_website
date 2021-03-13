<?php
    include 'server.php';
    $productNameget = $_GET['name'];
    $dataProduct = "SELECT * from tbl_products where productName ='".$productNameget."'";
    $dataquery = $mysqli->query($dataProduct);
    $data = $dataquery->fetch_object();
    $productName = $data->productName;
    $productPrice = $data->productPrice;
    $productData = $data->productData;
    $productIMG = $data->productIMG;
    $productID = $data->productID;
?>



<?php include 'topper.php';?>

<body class="full-wrapper">
    <?php include 'header.php';?>
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

    <div class="text-center">
        <br><br><br><br><br><br><br><br>
        <form style="background-color: #ff5757; padding: 20px; margin-top: -200px;">
            <h1 style="color: #fff; font-size: 150%; font-weight: 900;"> Product </h1>
        </form>
        <hr style="height: 2px; border-width:0; color:gray; background-color:gray">
        <br>
        <div class="form-detail">
            <div class="row img-product">
                <div class="col-lg-5 mb-50">
                    <img src="assets/img/product/<?=$productIMG?>" style="margin-top: 30px;">
                </div>
                <div class="col-lg-7">
                    <div class="row" style="border-bottom: groove;">
                        <div class="col-lg-9" style="text-align: left;"><br>
                            <h2 style="font-weight: 600;"><?=$productName?></h2>
                        </div>
                        <div class="col-lg-3" style="text-align: right;"><br>
                            <h2><?=number_format($productPrice,2) ?> THB</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12t" style="text-align: left;"><br>
                            <div class="font-thai"><?=$productData?></div><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12" style="border-bottom: groove;"><br>
                            <br>
                        </div>
                    </div>
                    <div style="text-align: right;">
                        <?php 
                            if(isset($_SESSION['username'])){
                                echo '<a class="btn" href="cart02.php?productID='.$productID.'&act=add"
                        style="margin-top: 150px; width: 100%;"><label class="fas fa-cart-arrow-down"
                            style="margin: -10px; margin-right: 10px;"></label>Add to cart</a>';
                        }else if(!isset($_SESSION['username'])){
                        echo '<a class="btn" href="login-FiFO.php" style="margin-top: 150px; width: 100%;"><label
                                class="fas fa-cart-arrow-down" style="margin: -10px; margin-right: 10px;"></label>Add to
                            cart</a>';
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <hr style="margin-bottom: 10px; margin-top: 100px;">
    <!--? Popular Items Start -->
    <div class="popular-items pt-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-popular-items mb-50 text-center wow fadeInUp" data-wow-duration="1s"
                        data-wow-delay=".1s">
                        <div class="popular-img">
                            <img src="assets/img/show/popular01.png" alt="">
                            <div class="img-cap">
                                <span>VGA</span>
                            </div>
                            <div class="favorit-items">
                                <a href="shop.php" class="btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-popular-items mb-50 text-center wow fadeInUp" data-wow-duration="1s"
                        data-wow-delay=".2s">
                        <div class="popular-img">
                            <img src="assets/img/show/popular02.png" alt="">
                            <div class="img-cap">
                                <span>CPU</span>
                            </div>
                            <div class="favorit-items">
                                <a href="shop.php" class="btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-popular-items mb-50 text-center wow fadeInUp" data-wow-duration="1s"
                        data-wow-delay=".4s">
                        <div class="popular-img">
                            <img src="assets/img/show/popular04.png" alt="">
                            <div class="img-cap">
                                <span>RAM</span>
                            </div>
                            <div class="favorit-items">
                                <a href="shop.php" class="btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-popular-items mb-50 text-center wow fadeInUp" data-wow-duration="1s"
                        data-wow-delay=".6s">
                        <div class="popular-img">
                            <img src="assets/img/show/popular05.png" alt="">
                            <div class="img-cap">
                                <span>Storage</span>
                            </div>
                            <div class="favorit-items">
                                <a href="shop.php" class="btn ">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Popular Items End -->

    <?php include 'footer.php';?>
    <?php include 'lower.php'; ?>