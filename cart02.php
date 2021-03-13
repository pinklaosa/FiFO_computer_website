<?php
    include 'topper.php';
    $act = '';
    $ProductID = '';
    if (isset($_REQUEST['act'])) {
        $act = $_REQUEST['act'];
    }
    if (isset($_REQUEST['productID'])) {
        $ProductID = $_REQUEST['productID'];
    }

    if ($act == 'add' && !empty($ProductID) && !empty($_SESSION['username'])) {
        if (isset($_SESSION['cart'][$ProductID])) {
            $_SESSION['cart'][$ProductID]++;
        } else {
            $_SESSION['cart'][$ProductID] = 1;
        }
    }

    if ($act == 'remove' && !empty($ProductID)) {  //ยกเลิกการสั่งซื้อ
        unset($_SESSION['cart'][$ProductID]);
    }

    if ($act == 'update') {
        $amount_array = $_POST['amount'];
        foreach ($amount_array as $ProductID => $amount) {
            $_SESSION['cart'][$ProductID] = $amount;
        }
    }
    $cost = 0;
    if(isset($_GET['pc']) && isset($_GET['cost']) && $_GET['pc'] == 'add'){
        $cost = $_GET['cost'];
    }
?>

<body class="full-wrapper">
    <?php include 'header.php';?>
    <div class="text-center">
        <!-- hero start-->
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light bg-hero">
            <div class="col-md-5 p-lg-5 mx-auto my-5">
                <h1 class="display-4" style="font-size: 48px; font-weight: 900; color:white;">BUILD PC</h1>
                <p class="lead font-weight-normal" style="color:white;">Building your own PC and need ideas on where to
                    get started? Explore our build guides which cover systems for a variety of use-cases and budgets.
                </p>
                <a class="btn" href="#">Coming soon</a>
            </div>
            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
        </div>

        <main style="margin-top: 20px;">
            <!-- breadcrumb Start-->
            <div class="page-notification">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-11">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center" style="margin-left: 100px;">
                                    <li class="breadcrumb-item"><a href="homepage.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="shop.php?productCategory=AAA01">Shop</a></li>
                                    <li class="breadcrumb-item"><a href="cart02.php">Cart</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- listing Area Start -->
            <?php
            if($ProductID=='' && $act ==''){
                echo '<a href="shop.php"><i class="fas fa-cart-arrow-down" style="font-size:300px;color:#ff5757; margin-top: 100px; margin-bottom:50px;"></i></a>';
                echo ' <div style="margin-left:30px;"><h2 style=" font-weight: 800;">Your cart empty. <a href="shop.php"> get products </a> Click</h2></div>';
            }else{?>
            <form class="form-cart" id="frmcart" name="frmcart" method="post" action="?act=update"
                action="saveorder.php">
                <?php
            $total = 0;
            if (!empty($_SESSION['cart'])) {
                include("server.php");?>
                <div class="row text-center title-cart">
                    <div class="col-4">
                        <h2 style="font-weight: 900;">Product</h2>
                    </div>
                    <div class="col-6">
                        <h2 style="font-weight: 900;">Data</h2>
                    </div>
                </div>
                <?php
                foreach ($_SESSION['cart'] as $ProductID => $qty) {
                    $sql = "select * from tbl_products where productID='$ProductID'";
                    $query = $mysqli->query($sql);
                    $priceProduct = 0;
                    while ($data = $query->fetch_object()) {
                        $nameProduct = $data->productName;
                        $priceProduct = $data->productPrice;
                        $imgProduct = $data->productIMG;
                    }
                    $sum = $priceProduct * $qty;
                    $total += $sum;
        ?>
                <div class="row form-product">
                    <div class="col-4">
                        <img src="assets/img/product/<?=$imgProduct?>"
                            style="width: 200px; height: 200px; margin-left: 50px;">
                    </div>
                    <div class="col-6 "><br>
                        <h2><?=$nameProduct?></h2><br>
                        <div class="row">
                            <div class="col-12">
                                <h3><?=number_format($priceProduct,2)?> THB.</h3>
                                <div class="row">
                                    <div class="col-3 ">
                                        <input type='number' name='amount[<?=$ProductID?>]' value='<?=$qty?>'
                                            style='width: 50px; margin-top: 20px;' />
                                    </div>
                                    <div class="col-9">
                                        <h3 style="margin-top: 20px;"><?=number_format($sum,2);?> THB.</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <a href='cart02.php?productID=<?=$ProductID?>&act=remove'>
                            <i class="fas fa-trash-alt"
                                style="color: black; font-size:24px; margin-left:50px; margin-top:20px; color:#606060;"></i>
                        </a>
                    </div>
                </div>
                <?php
                }?>
                <div class="row">
                    <div class="col">
                        <button class="btn" style="margin-left: 80%; margin-top:30px;" type="submit" name="button"
                            id="button" value="Refresh" onclick="window.location = 'cart02.php';">Refresh</button>
                    </div>
                </div>
                <br><br>
            <!-- Total-->
                <div class="row">
                    <div class="col-4">
                        <h1 style="margin-left: 30px; margin-top: 30px; font-weight: 800;">Total</h1>
                    </div>

                </div>
                <hr style="height: 2px; border-width:0; color:gray; background-color:gray; margin-top: 20px;">
                <div class="row">
                    <div class="col-4">
                        <h3 style="margin-left: 40px; margin-top: 30px;">Amount</h3>
                    </div>
                    <div class="col-4">
                        <h3 style="margin-top: 30px;"><?=number_format($total, 2)?> THB.</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <h3 style="margin-left: 40px; margin-top: 30px;">VAT 7%</h3>
                    </div>
                    <div class="col-4">
                        <h3 style="margin-top: 30px;"><?=number_format($total*0.07, 2)?> THB.</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <h3 style="margin-left: 40px; margin-top: 30px;">Total</h3>
                    </div>
                    <div class="col-4">
                        <h3 style="margin-top: 30px;"><?=number_format($total*1.07, 2)?> THB.</h3>
                    </div>
                </div>
                <hr style="height: 2px; border-width:0; color:gray; background-color:gray; margin-top: 50px;">
                <div class="row">
                    <div class="col">
                        <button class="btn" style="margin-top:20px;" type="button" name="Submit2" value="Buy"
                            onclick="window.location = 'saveorder.php';">Confirm</button>
                    </div>
                </div>
    </div>

    <?php
            }
            }?>


    </form>
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
    <?php
    include 'footer.php';
    include 'lower.php';
    ?>