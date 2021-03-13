<?php 
    include 'server.php';
    $limit = 48;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1)*$limit;
    $queryProduct = '';
    $resultNumProduct='';
    if(isset($_GET['productCategory'])){
        $pageProducts = $_GET['productCategory'];  
        $queryProduct = "SELECT * from tbl_products where categoryID = '$pageProducts' limit $start,$limit";
        $resultNumProduct = $mysqli->query("SELECT count(productID) as ID FROM tbl_products where categoryID = '$pageProducts'");
    }
    else if(!isset($_GET['productCategory'])){
        $queryProduct = "SELECT * from tbl_products limit $start,$limit";
        $resultNumProduct = $mysqli->query("SELECT count(productID) as ID FROM tbl_products");
    }

    $productCount = $resultNumProduct->fetch_all(MYSQLI_ASSOC);
    $total = $productCount[0]['ID'];
    $pages = ceil($total / $limit);

    $Previous = $page - 1;
	$Next = $page + 1;

    if($page > $pages){
        header('location: shop.php?page='.$pages);
    }
    elseif ($page < 1){
        header('location: shop.php?page=1');
    }


    include 'topper.php';  
?>


<body class="full-wrapper">

    <?php 
    include 'header.php';
?>
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
    <!-- hero start-->
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light bg-hero">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <h1 class="display-4" style="font-size: 48px; font-weight: 900; color:white;">BUILD PC</h1>
            <p class="lead font-weight-normal" style="color:white;">Building your own PC and need ideas on where to get started? Explore our build guides which cover systems for a variety of use-cases and budgets.</p>
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
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start -->
        <div class="category-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-8 col-md-10">
                        <div class="section-tittle mb-50 wow fadeInUp">
                            <h2>Shop with us</h2>
                            <?php 
                                include 'server.php';
                                $allProducts = "SELECT * from tbl_products";
                                $result = $mysqli->query($allProducts);
                                $checkCount = $result->num_rows;
                                echo '<p>Browse from '.$checkCount.' items</p>'
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!--? Left content -->
                    <div class="col-xl-3 col-lg-3 col-md-4 ">
                        <!-- Job Category Listing start -->
                        <div class="category-listing mb-50">
                            <!-- single one -->
                            <div class="single-listing">
                                <div class="row">
                                    <?php
                                        include 'server.php';
                                        $iconsql = $mysqli->query("SELECT * from tbl_category");
                                        while($icon = $iconsql->fetch_object()){
                                            $iconid = $icon->categoryID;
                                            ?>
                                            <a  title="<?=$icon->categoryName?>" href= "shop.php?productCategory=<?=$iconid?>" class="col-6 menu-product" <?php if($iconid == $pageProducts){echo 'style="border-color: #ff5757; background-color: #ff575767;"';} ?>>
                                            <img src="assets/img/icon/<?=$iconid?>.png">
                                    </a>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- Job Category Listing End -->
                    </div>

                    <!--?  Right content -->
                    <div class="col-xl-9 col-lg-9 col-md-8 content form-shop" style="margin-top: -695px;">
                        <div class="new-arrival new-arrival2">
                            <div class="row">
                                <?php                                                   
                        $result_query = $mysqli->query($queryProduct);
                        while($products = $result_query->fetch_object()) {
                            $productID =  $products->productID;
                            $productName = $products->productName;
                            $productIMG = $products->productIMG;
                            $productPrice = $products->productPrice;
                            ?>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center ">
                                        <div class="popular-img">
                                            <img src="assets/img/product/<?php echo $productIMG ?>" alt="">
                                            <div class="favorit-items">
                                                <?php 
                                            if (!isset($_SESSION['username'])) {
                                                echo '<a href = "login-FiFO.php"><img src="assets/img/show/cart.png" alt=""></a>';
                                            }
                                            else if(isset($_SESSION['username'])){

                                                echo '<a href = "cart02.php?productID='.$productID.'&act=add"><img src="assets/img/show/cart.png" alt=""></a>';
                                                
                                            }
                                        ?>
                                                <!--<a href="cart.php"?product= ><img src="assets/img/show/cart.png" alt=""></a>   -->
                                            </div>
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="productdetail.php?name=<?=$productName?>"><?php echo $productName ?></a></h3>
                                            <span><?php echo $productPrice?> THB.</span>
                                        </div>
                                    </div>
                                </div>
                                <?php
                        } 
                    ?>
                            </div>
                        </div>
                    </div>
                    <form style="width: 100%; height: 100px;">
                        <div class="row">
                            <div class="col-lg-12"> 
                                <div class="pagination page-form">
                                    <a href="shop.php?page=<?=$Previous; ?>" aria-label="Previous">
                                        <span aria-label="true"><</span>
                                    </a>
                                    <?php for ($i=1; $i <= $pages; $i++):
                            if(isset($_GET['productCategory'])){
                                ?> <a
                                        <?php if($page==$i){ echo 'class="active"';}?>href="shop.php?productCategory=<?=$pageProducts?>&page=<?=$i;?>"><?=$i;?></a>
                                    <?php }else if(!isset($_GET['productCategory'])){
                            ?> <a <?php if($page==$i){ echo 'class="active"';}?>href="shop.php?page=<?=$i;?>"><?=$i;?></a><?php
                            }
                            endfor; ?>
                                    <a href="shop.php?page=<?=$Next; ?>" aria-label="Next">
                                        <span aria-label="true">></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
    </main>

    <hr style="margin-bottom: 10px;">
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
    <?php include 'footer.php';?>
    <?php include 'lower.php';?>