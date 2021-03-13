<header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper d-flex align-items-center justify-content-between">
                        <div class="header-left d-flex align-items-center">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="homepage.php"><img src="assets/img/logo/FiFO.png" width = "48" height ="48" fill="none"alt="" ></a>
                            </div>
                            <!-- Main-menu -->
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="homepage.php" >Home</a></li> 
                                        <li><a href="buildpc.php">Build PC</a></li>
                                        <li><a href="shop.php?productCategory=AAA01">Product</a>
                                            <ul class="submenu">
                                                <?php
                                                    include 'server.php';
                                                    $categoryQuery = "SELECT * from tbl_category";
                                                    $resultQuery = $mysqli->query($categoryQuery);
                                                    $i =1;
                                                    while($data1 = $resultQuery->fetch_object()){
                                                        echo '<li><a href="shop.php?productCategory='.$data1->categoryID.'">'.$data1->categoryName.'</a></li>';
                                                    }
                                                ?>

                                            </ul>
                                        </li>
                                        <li><a href="contact.php">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>   
                        </div>
                        <div class="header-right1 d-flex align-items-center">

                            <!-- sign in -->
                            <?php if(!isset($_SESSION['username'])){ ?>
                                <div class="header-social d-none d-md-block">
                                    <a href="login-FiFO.php" ><i class="far fa-user-circle" title ="Sign in"></i></a>
                                </div>

                            <?php
                            }
                            else if(isset($_SESSION['username'])){ 
                                ?>
                                <div class="main-menu  d-none d-lg-block">
                                <ul id="navigation">
                                    <li><a><?php echo $_SESSION['username']?></a>
                                        <ul class="submenu-ac">
                                            <li><a href="account.php">Account</a></li>
                                            <?php 
                                                include 'server.php';
                                                $userAdmin = $_SESSION['username'];
                                                $sqlUsername = "SELECT * from fifo_account where username = '".$userAdmin."'";
                                                $usernameQuery = $mysqli->query($sqlUsername);
                                                $fetchUser = $usernameQuery->fetch_object();
                                                $tier = $fetchUser->tier;
                                                if($tier == 'admin'){
                                                    echo '<li><a href="admin/admin.php">Admin Editor</a></li>';
                                                }
                                            ?>
                                            <li><a href="homepage.php?logout='1'">Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                </div>

                                <div class="search d-none d-md-block">
                                    <div class="d-flex align-items-center">
                                        <div class="mr-15" >
                                        <a href="cart02.php" ><div class="card-stor">
                                           <img src="assets/img/gallery/card.svg" alt="">
                                                <span><?php 
                                                $qty1=0;if(isset($_SESSION['cart'])){
                                                    foreach ($_SESSION['cart'] as $ProductID => $qty){
                                                  $qty1+=$qty; 
                                                }} echo $qty1;?></span>
                                            </div></a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        
    </header>