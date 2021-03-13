<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="FiFO-style.css"> 
    <link rel="stylesheet" href="signin.css"> 
    <style>
    
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    
</head>
    
    <body class="text-center">
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


    <form method="post" class="form-signin" action="login-FiFO.php">
        <a href = "homepage.php"><img class="mb-4" src="assets/img/logo/FIFO.png" alt="" width="72" height="72"></a><br><br>
            <?php 
                
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                  include 'check-signin.php';  
                    if($checkRow == 1){
                        $_SESSION['username'] = $inputUsername;
                        header('location: homepage.php');
                    }
                else{
            ?>  <div class="block-al">
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong></strong>Wrong Username or password.
                    </div>
                </div>
            <?php
            }
        }
        ?>

        <label>
            <p class="label-txt">Username</p>
            <input type="text"  class="input" name="userName"  title="Username" required autofocus>
            <div class="line-box">
            <div class="line"></div>
        </div>
        </label>
        
        <label>
            <p class="label-txt">Password</p>
            <input type="password"  class="input" name="passWord"   title="Password" required autofocus>
            <div class="line-box">
            <div class="line"></div>
        </div>
        </label>
        
        <button class="btn-signin" type="submit">></button>
        <br><br><br>
        <div>
                <p style="font-size:12px">
                    <a class="mt-5 mb-3 text-muted" href="/FiFO/register.php">   Register </a>
                    <a class="mt-5 mb-3 text-muted" >|</a>
                    <a class="mt-5 mb-3 text-muted" href="/3/reg.php"> Forgot Password</a><br><br>
                    <a class="mt-5 mb-3 text-muted" style="font-size:18x" >&copy; 2017-2020</a>
                </p>
        </div>
    </form>

    <div>
        <!-- Jquery, Popper, Bootstrap -->
        <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="./assets/js/vendor/jquery-1.12.4.min.js "></script>
        <script src="./assets/js/popper.min.js "></script>
        <script src="./assets/js/bootstrap.min.js "></script>

        <!-- Slick-slider , Owl-Carousel ,slick-nav -->
        <script src="./assets/js/owl.carousel.min.js"></script>
        <script src="./assets/js/slick.min.js"></script>
        <script src="./assets/js/jquery.slicknav.min.js"></script>

        <!-- One Page, Animated-HeadLin, Date Picker -->
        <script src="./assets/js/wow.min.js"></script>
        <script src="./assets/js/animated.headline.js"></script>
        <script src="./assets/js/jquery.magnific-popup.js"></script>
        <script src="./assets/js/gijgo.min.js"></script>

        <!-- Nice-select, sticky,Progress -->
        <script src="./assets/js/jquery.nice-select.min.js"></script>
        <script src="./assets/js/jquery.sticky.js"></script>
        <script src="./assets/js/jquery.barfiller.js"></script>

        <!-- counter , waypoint,Hover Direction -->
        <script src="./assets/js/jquery.counterup.min.js"></script>
        <script src="./assets/js/waypoints.min.js"></script>
        <script src="./assets/js/jquery.countdown.min.js"></script>
        <script src="./assets/js/hover-direction-snake.min.js"></script>

        <!-- contact js -->
        <script src="./assets/js/contact.js"></script>
        <script src="./assets/js/jquery.form.js"></script>
        <script src="./assets/js/jquery.validate.min.js"></script>
        <script src="./assets/js/mail-script.js"></script>
        <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

        <!-- Jquery Plugins, main Jquery -->	
        <script src="./assets/js/plugins.js"></script>
        <script src="./assets/js/main.js"></script>
    </div>
</body>
</html>
