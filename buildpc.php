<?php 
    include 'topper.php';
    if(!isset($_SESSION['username'])){
        header('location: login-FiFO.php');
    }              
?>

<body class="full-wrapper">
    <?php include 'header.php'; ?>
    <!-- ? Preloader Start 
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
    Preloader End-->

    <!-- hero start-->
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light bg-hero">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <h1 class="display-4" style="font-size: 48px; font-weight: 900; color:white;">BUILD PC</h1>
        </div>
        <div class="product-device shadow-sm d-none d-md-block"></div>
        <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
    </div>
    <!-- hero end-->

    <!--Main start -->
    <main>
        <?php
            if(isset($_GET['AAA07']) && isset($_GET['productIDAAA07'])){
               $_SESSION['AAA07'] = $_GET['AAA07'];
               $_SESSION['productIDAAA07'] = $_GET['productIDAAA07'];
            
            }
            if(isset($_GET['AAA08']) && isset($_GET['productIDAAA08'])){
                $_SESSION['AAA08'] = $_GET['AAA08'];
                $_SESSION['productIDAAA08'] = $_GET['productIDAAA08'];
             
             }
             if(isset($_GET['AAA06']) && isset($_GET['productIDAAA06'])){
                $_SESSION['AAA06'] = $_GET['AAA06'];
                $_SESSION['productIDAAA06'] = $_GET['productIDAAA06'];
            
             }
             if(isset($_GET['AAA09']) && isset($_GET['productIDAAA09'])){
                $_SESSION['AAA09'] = $_GET['AAA09'];
                $_SESSION['productIDAAA09'] = $_GET['productIDAAA09'];
             
             }
             if(isset($_GET['AAA12']) && isset($_GET['productIDAAA12'])){
                $_SESSION['AAA12'] = $_GET['AAA12'];
                $_SESSION['productIDAAA12'] = $_GET['productIDAAA12'];
            
             }
             if(isset($_GET['AAA10']) && isset($_GET['productIDAAA10'])){
                $_SESSION['AAA10'] = $_GET['AAA10'];
                $_SESSION['productIDAAA10'] = $_GET['productIDAAA10'];
             
             }
             if(isset($_GET['AAA13']) && isset($_GET['productIDAAA13'])){
                $_SESSION['AAA13'] = $_GET['AAA13'];
                $_SESSION['productIDAAA13'] = $_GET['productIDAAA13'];
             
             }


            if(isset($_GET['remove'])){
                if($_GET['remove'] == 'AAA07'){
                    unset($_SESSION['AAA07']);
                    unset($_SESSION['productIDAAA07']);
                }
                if($_GET['remove']=='AAA08'){
                    unset($_SESSION['AAA08']);
                    unset($_SESSION['productIDAAA08']);
                }
                if($_GET['remove']=='AAA13'){
                    unset($_SESSION['AAA13']);
                    unset($_SESSION['productIDAAA13']);
                }
                if($_GET['remove']=='AAA06'){
                    unset($_SESSION['AAA06']);
                    unset($_SESSION['productIDAAA06']);
                }
                if($_GET['remove']=='AAA09'){
                    unset($_SESSION['AAA09']);
                    unset($_SESSION['productIDAAA09']);
                }
                if($_GET['remove']=='AAA12'){
                    unset($_SESSION['AAA12']);
                    unset($_SESSION['productIDAAA12']);
                }
                if($_GET['remove']=='AAA10'){
                    unset($_SESSION['AAA10']);
                    unset($_SESSION['productIDAAA10']);
                }
            }
            include 'server.php';
            $total = 0;
            if(isset($_SESSION['AAA07'])){
                $AAA07 = $_SESSION['AAA07'];
                $product07 = $_SESSION['productIDAAA07'];
                $show07 = $mysqli->query("SELECT * from tbl_products where categoryID = '".$AAA07."' and productID = '".$product07."'");
                $data07 = $show07->fetch_object();
                $total = $total + $data07->productPrice;
            }
            if(isset($_SESSION['AAA06'])){
                $AAA06 = $_SESSION['AAA06'];
                $product06 = $_SESSION['productIDAAA06'];
                $show06 = $mysqli->query("SELECT * from tbl_products where categoryID = '".$AAA06."' and productID = '".$product06."'");
                $data06 = $show06->fetch_object();
                $total = $total + $data06->productPrice;
            }
            if(isset($_SESSION['AAA08'])){
                $AAA08 = $_SESSION['AAA08'];
                $product08 = $_SESSION['productIDAAA08'];
                $show08 = $mysqli->query("SELECT * from tbl_products where categoryID = '".$AAA08."' and productID = '".$product08."'");
                $data08 = $show08->fetch_object();
                $total = $total + $data08->productPrice;
            }
        
            if(isset($_SESSION['AAA09'])){
                $AAA09 = $_SESSION['AAA09'];
                $product09 = $_SESSION['productIDAAA09'];
                $show09 = $mysqli->query("SELECT * from tbl_products where categoryID = '".$AAA09."' and productID = '".$product09."'");
                $data09 = $show09->fetch_object();
                $total = $total + $data09->productPrice;
            }
        
            if(isset($_SESSION['AAA10'])){
                $AAA10 = $_SESSION['AAA10'];
                $product10 = $_SESSION['productIDAAA10'];
                $show10 = $mysqli->query("SELECT * from tbl_products where categoryID = '".$AAA10."' and productID = '".$product10."'");
                $data10 = $show10->fetch_object();
                $total = $total + $data10->productPrice;
            }
        
            if(isset($_SESSION['AAA12'])){
                $AAA12 = $_SESSION['AAA12'];
                $product12 = $_SESSION['productIDAAA12'];
                $show12 = $mysqli->query("SELECT * from tbl_products where categoryID = '".$AAA12."' and productID = '".$product12."'");
                $data12 = $show12->fetch_object();
                $total = $total + $data12->productPrice;
            }
        
            if(isset($_SESSION['AAA13'])){
                $AAA13 = $_SESSION['AAA13'];
                $product13 = $_SESSION['productIDAAA13'];
                $show13 = $mysqli->query("SELECT * from tbl_products where categoryID = '".$AAA13."' and productID = '".$product13."'");
                $data13 = $show13->fetch_object();
                $total = $total + $data13->productPrice;
            }
            ?>
        
        <div class="tab-total">
            <?php
                include 'server.php';
                $userID = $_SESSION['username'];
                $namequery = $mysqli->query("SELECT * from fifo_account where username = '".$userID."'");
                $namefet = $namequery->fetch_object();
                $name = $namefet->name;
            ?>
            <div class="row">
                <div class="col-8 " style="text-align: right;">
                    <label class="font-thai">Name : </label>
                </div>
                <div class="col-1 ">
                    <label class="font-thai"><?=$name?></label>
                </div>
                <div class="col-1" style="text-align: right;">
                    <label class="font-thai">Total : </label>
                </div>
                <div class="col-1 ">
                    <label class="font-thai"><?=number_format($total,2)?></label>
                </div>
                <div class="col-1" style="text-align: left;">
                    <label class="font-thai" >Baht</label>
                </div>
            </div>
        </div>
        <hr>


        <!-- Build PC start -->
        <div class="form-build">
            <div class="form-pc">
                <!-- แถวแรก -->
                <div class="row" style="text-align: center;">
                    <div class="col-lg-6">
                        <div class="showbite">
                            <a href="selectbuild.php?id=AAA07"><img class="icon-pc" src="assets/img/icon/main.png"></a>
                            <div class="font-thai" style="font-size: 24px; font-weight: 600;">Mainboard</div>
                        </div>
                        <?php
                            if(isset($_SESSION['AAA07'])){
                                ?>
                                <div id="myModal" class="showbuild">
                                    <div class="flex-p" style="margin-top: 5px;">
                                        <div class="flex-item-left">
                                            <img src="assets/img/product/<?=$data07->productIMG?>" style="width: 150px; height: 150px;">
                                        </div>
                                        <div class="flex-item-right">
                                            <a class="close" href="buildpc.php?remove=AAA07" style="text-align: right; margin-top: -5px;" ><i class="fas fa-trash-alt" style="color: black;"></i></a><br>
                                            <div class="font-thai" style="font-weight: 900;">
                                                <?=$data07->productName?>
                                            </div><br>
                                            <div class="font-thai">
                                                <?=$data07->productPrice?> THB
                                            </div>
                                        </div>
                                    </div>
                                    <!--<a class="close" href="buildpc.php?id=AAA07"><i class="fas fa-trash-alt" style="color: black;"></i></a>-->
                                </div>
                        <?php
                        }
                        ?>
      
                    </div>
                    <div class="col-lg-6">
                        <div class="showbite">
                            <a href="selectbuild.php?id=AAA08"><img class="icon-pc" src="assets/img/icon/gpu.png"></a>
                            <div class="font-thai" style="font-size: 24px; font-weight: 600;">Graphics Card</div>
                        </div>
                        <?php
                            if(isset($_SESSION['AAA08'])){?>
                                <div id="myModal2" class="showbuild">
                                    <div class="flex-p" style="margin-top: 5px;">
                                        <div class="flex-item-left">
                                            <img src="assets/img/product/<?=$data08->productIMG?>" style="width: 150px; height: 150px;">
                                        </div>
                                        <div class="flex-item-right">
                                            <a class="close" href="buildpc.php?remove=AAA08" style="text-align: right; margin-top: -5px;" ><i class="fas fa-trash-alt" style="color: black;"></i></a><br>
                                            <div class="font-thai">
                                                <?=$data08->productName?>
                                            </div><br>
                                            <div class="font-thai">
                                                <?=$data08->productPrice?> THB
                                            </div>
                                        </div>
                                    </div>
                                    <!--<a class="close" href="buildpc.php?id=AAA07"><i class="fas fa-trash-alt" style="color: black;"></i></a>-->
                                </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <!-- แถว กลาง -->
                <div class="row" style="text-align: center; margin-top: 30px;">
                    <div class="col-lg-4">
                        <div class="showbite" style="margin-top: 60px;">
                            <a href="selectbuild.php?id=AAA06"><img class="icon-pc"
                                    src="assets/img/icon/processor.png"></a>
                            <div class="font-thai" style="font-size: 24px; font-weight: 600;">Processor</div>
                            <?php
                            if(isset($_SESSION['AAA06'])){?>
                                <div id="myModal2" class="showbuild-mid">
                                    <div class="flex-p" style="margin-top: 5px;">
                                        <div class="flex-item-left">
                                            <img src="assets/img/product/<?=$data06->productIMG?>" style="width: 150px; height: 150px;">
                                        </div>
                                        <div class="flex-item-right">
                                            <a class="close" href="buildpc.php?remove=AAA06" style="text-align: right; margin-top: -5px;" ><i class="fas fa-trash-alt" style="color: black;"></i></a><br>
                                            <div class="font-thai">
                                                <?=$data06->productName?>
                                            </div><br>
                                            <div class="font-thai">
                                                <?=$data06->productPrice?> THB
                                            </div>
                                        </div>
                                    </div>
                                    <!--<a class="close" href="buildpc.php?id=AAA07"><i class="fas fa-trash-alt" style="color: black;"></i></a>-->
                                </div>
                        <?php
                        }
                        ?>
                        </div>
                    </div>
                    <div class="col-lg-4 ">
                        <div class="showcase">
                            <a href="selectbuild.php?id=AAA13"><img
                                    style="width: 200px; height: 200px; margin-top: 30px;"
                                    src="assets/img/icon/tower.png"></a>
                            <div class="font-thai" style="font-size: 36px; font-weight: 600; margin-top: 20px;">Case</div>
                        </div>
                        <?php
                            if(isset($_SESSION['AAA13'])){?>
                                <div id="myModal2" class="showbuild-mid3">
                                    <div class="flex-p" style="margin-top: 5px;">
                                        <div class="flex-item-leftcase">
                                            <img src="assets/img/product/<?=$data13->productIMG?>" style="width: 150px; height: 170px; margin-bottom: 10px;">
                                        </div>
                                        <div class="flex-item-right" style="text-align: center;">
                                            <div class="font-thai">
                                                <?=$data13->productName?>
                                            </div><br>
                                            <div class="font-thai">
                                                <?=$data13->productPrice?> THB
                                            </div>
                                            <a class="close" href="buildpc.php?remove=AAA13" style="text-align: right;" ><i class="fas fa-trash-alt" style="color: black;"></i></a><br>
                                        </div>
                                    </div>
                                    <!--<a class="close" href="buildpc.php?id=AAA07"><i class="fas fa-trash-alt" style="color: black;"></i></a>-->
                                </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-lg-4">
                        <div class="showbite" style="margin-top:60px;">
                            <a href="selectbuild.php?id=AAA09"><img class="icon-pc" src="assets/img/icon/ram.png"></a>
                            <div class="font-thai" style="font-size: 24px; font-weight: 600;">Memory</div>
                        </div>
                        <?php
                            if(isset($_SESSION['AAA09'])){?>
                                <div id="myModal2" class="showbuild-mid2">
                                    <div class="flex-p" style="margin-top: 5px;">
                                        <div class="flex-item-left">
                                            <img src="assets/img/product/<?=$data09->productIMG?>" style="width: 150px; height: 120px; margin-top: 10px;">
                                        </div>
                                        <div class="flex-item-right">
                                            <a class="close" href="buildpc.php?remove=AAA09" style="text-align: right; margin-top: -5px;" ><i class="fas fa-trash-alt" style="color: black;"></i></a><br>
                                            <div class="font-thai">
                                                <?=$data09->productName?>
                                            </div><br>
                                            <div class="font-thai">
                                                <?=$data09->productPrice?> THB
                                            </div>
                                        </div>
                                    </div>
                                    <!--<a class="close" href="buildpc.php?id=AAA07"><i class="fas fa-trash-alt" style="color: black;"></i></a>-->
                                </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <!-- แถว 3 -->
                <div class="row" style="text-align: center; margin-top: 30px;">
                    <div class="col-lg-6">
                        <div class="showbite">
                            <a href="selectbuild.php?id=AAA12"><img class="icon-pc"
                                    src="assets/img/icon/power-supply.png"></a>
                            <div class="font-thai" style="font-size: 24px; font-weight: 600;">Power Supply</div>
                        </div>
                        <?php
                            if(isset($_SESSION['AAA12'])){?>
                                <div id="myModal5" class="showbuild">
                                    <div class="flex-p" style="margin-top: 5px;">
                                        <div class="flex-item-left">
                                            <img src="assets/img/product/<?=$data12->productIMG?>" style="width: 150px; height: 150px;">
                                        </div>
                                        <div class="flex-item-right">
                                            <a class="close" href="buildpc.php?remove=AAA12" style="text-align: right; margin-top: -5px;" ><i class="fas fa-trash-alt" style="color: black;"></i></a><br>
                                            <div class="font-thai">
                                                <?=$data12->productName?>
                                            </div><br>
                                            <div class="font-thai">
                                                <?=$data12->productPrice?> THB
                                            </div>
                                        </div>
                                    </div>
                                    <!--<a class="close" href="buildpc.php?id=AAA07"><i class="fas fa-trash-alt" style="color: black;"></i></a>-->
                                </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-lg-6">
                        <div class="showbite">
                            <a href="selectbuild.php?id=AAA10"><img class="icon-pc" src="assets/img/icon/hdd.png"></a>
                            <div class="font-thai" style="font-size: 24px; font-weight: 600;">Storage</div>
                        </div>
                        <?php
                            if(isset($_SESSION['AAA10'])){?>
                                <div id="myModal6" class="showbuild">
                                    <div class="flex-p" style="margin-top: 5px;">
                                        <div class="flex-item-left">
                                            <img src="assets/img/product/<?=$data10->productIMG?>" style="width: 150px; height: 180px; margin-top: -10px;">
                                        </div>
                                        <div class="flex-item-right">
                                            <a class="close" href="buildpc.php?remove=AAA10" style="margin-top: -5px;" ><i class="fas fa-trash-alt" style="color: black;"></i></a><br>
                                            <div class="font-thai">
                                                <?=$data10->productName?>
                                            </div><br>
                                            <div class="font-thai">
                                                <?=$data10->productPrice?> THB
                                            </div>
                                        </div>
                                    </div>
                                    <!--<a class="close" href="buildpc.php?id=AAA10"><i class="fas fa-trash-alt" style="color: black;"></i></a>-->
                                </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Build PC end -->
        <hr>
        <div class="form-bottom">
            <div class="row">
                <div class="col-6" style="padding: 30px;">
                    <div class="form-summary">
                        <div class="row">
                            <div class="col-3" style="text-align: right;">
                                <div class="font-thai">CPU :</div>
                                <div class="font-thai">Mainboard :</div>
                                <div class="font-thai">Graphics Card :</div>
                                <div class="font-thai">Ram :</div>
                                <div class="font-thai">HDD :</div>
                                <div class="font-thai">Power Supply :</div>
                                <div class="font-thai">Case :</div>
                            </div>
                            <div class="col-9">
                                <?php 
                                    if(isset($_SESSION['AAA07'])){
                                        echo '<div class="font-thai">'.$data07->productName.'</div>';
                                    }
                                    if(isset($_SESSION['AAA08'])){
                                        echo '<div class="font-thai">'.$data08->productName.'</div>';
                                    }
                                    if(isset($_SESSION['AAA06'])){
                                        echo '<div class="font-thai">'.$data06->productName.'</div>';
                                    }
                                    if(isset($_SESSION['AAA13'])){
                                        echo '<div class="font-thai">'.$data13->productName.'</div>';
                                    }
                                    if(isset($_SESSION['AAA09'])){
                                        echo '<div class="font-thai">'.$data09->productName.'</div>';
                                    }
                                    if(isset($_SESSION['AAA12'])){
                                        echo '<div class="font-thai">'.$data12->productName.'</div>';
                                    }
                                    if(isset($_SESSION['AAA10'])){
                                        echo '<div class="font-thai">'.$data10->productName.'</div>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-total"><br>
                        <div class="font-thai" style="font-size: 24px; border-bottom: solid; border-bottom-color: #fff;">Cost</div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-3" style="text-align: right;">
                                <div class="font-thai">Total :</div>
                                <div class="font-thai">Discount :</div>
                                <div class="font-thai">Cost :</div>
                            </div>
                            <div class="col-3" style="text-align: center;">
                                <div class="font-thai"><?=number_format($total,2)?></div>
                                <?php
                                $discount = 0;
                                $cost = 0;
                                    if($total > 20000){
                                        $discount = $total*0.05;
                                        echo '<div class="font-thai">-'.number_format($discount,2).'</div>';
                                    }
                                    $cost = $total - $discount;
                                    echo '<div class="font-thai">'.number_format($cost,2).'</div>';
                                ?>
                            </div>
                            <div class="col-3">
                                <div class="font-thai">Baht</div>
                                <div class="font-thai">Baht</div>
                                <div class="font-thai">Baht</div>
                            </div>
                        </div>
                        <div style="font-size: 24px; border-bottom: solid; border-bottom-color: #fff;" ><br></div>
                        <a href="pc-db.php?pc=add"><div style="text-align: right;"><button class="build-btn font-thai" style="color: #00004d;"><i class="fas fa-cart-arrow-down"> </i> Confrim</button></div></a>
                    </div>
                </div>
            </div>
        </div>
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