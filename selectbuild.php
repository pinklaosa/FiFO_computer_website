<?php 
    include 'topper.php';
    include 'server.php';
    $queryProduct = "SELECT * from tbl_products where categoryID = 'AAA06'";
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $_SESSION['id'] = $id;
        $queryProduct = "SELECT * from tbl_products where categoryID = '".$id."'";
    }elseif(!isset($_REQUEST['id'])){
        $queryProduct = "SELECT * from tbl_products where categoryID = 'AAA06'";
    }
    
?>

<body class="full-wrapper">
    <?php include 'header.php'; ?>
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
    <!--Preloader End-->

    <!-- Main Start-->
    <main>
        <hr>
        <!-- listing Area Start -->
        <div class="category-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="section-tittle mb-50">
                            <h2>Build PC</h2>
                            <?php 
                                include 'server.php';
                                $allProducts = "SELECT * FROM tbl_category INNER JOIN tbl_products ON tbl_products.categoryID = tbl_category.categoryID WHERE typeID='F01'";
                                $result = $mysqli->query($allProducts);
                                $checkCount = $result->num_rows;
                                echo '<p>Browse from '.$checkCount.' items</p>'
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!--? Left content -->
                    <div class="col-3">
                        <?php
                            include 'server.php';
                            $resultMenu = $mysqli->query("SELECT * from tbl_category where typeID='F01'");
                            while($menu = $resultMenu->fetch_object()){
                                if($id == $menu->categoryID){
                                    echo '<a href="selectbuild.php?id='.$menu->categoryID.'"><button class="select-btn-active"><img src="assets/img/icon/'.$menu->categoryID.'.png"><label>'.$menu->categoryName.'</label></button></a>';

                                }elseif($id != $menu->categoryID){
                                    echo '<a href="selectbuild.php?id='.$menu->categoryID.'"><button class="select-btn"><img src="assets/img/icon/'.$menu->categoryID.'.png"><label>'.$menu->categoryName.'</label></button></a>';
                                }
                            }
                        ?>
                        
                    </div>
                    <!-- Job Category Listing End -->
                    <!--?  Right content -->

                    <div class="col-xl-9 col-lg-9 col-md-8 content" style="margin-left: 400px; margin-top: -550px; box-shadow: 5px 5px 6px rgba(0, 0, 0, 0.1); border-top: 1px solid rgba(0, 0, 0, 0.1); border-left: 1px solid rgba(0, 0, 0, 0.1);">
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
                                                echo '<a href = "login-FiFO.php"><img src="assets/img/icon/add.png" alt=""></a>';
                                            }
                                            else if(isset($_SESSION['username'])){
                                                echo '<a href = buildpc.php?'.$products->categoryID.'='.$products->categoryID.'&productID'.$products->categoryID.'='.$productID.'><img src="assets/img/icon/add.png" alt=""></a>';    
                                            }
                                        ?>
                                                <!--<a href="cart.php"?product= ><img src="assets/img/show/cart.png" alt=""></a>   -->
                                            </div>
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a
                                                    href="productdetail.php?name=<?=$productName?>"><?php echo $productName ?></a>
                                            </h3>
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
                </div>
            </div>
        </div>

    </main>

    <?php
        include 'footer.php';
        include 'lower.php';
    ?>