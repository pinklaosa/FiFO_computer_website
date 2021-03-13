<?php 
    include 'topper.php';
?>

<body class="full-wrapper">

    <!--?  Right content -->
    <div class="col-xl-9 col-lg-9 col-md-8 content mb-50" style="margin-top: 50px;">
        <div class="new-arrival new-arrival2">
            <div class="row">
                <?php    
                include 'server.php';
                        $queryProduct = "SELECT * from tbl_products";                                               
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

                                                echo '<a href="test.php?count=1"><img src="assets/img/show/cart.png" alt=""></a>';
                                                
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


    <?php
  include 'lower.php';
?>