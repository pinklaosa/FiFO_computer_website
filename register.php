<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Register</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="FiFO-style.css">
    <link rel="stylesheet" href="signin.css">
</head>
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

<body>

    <!--Register Start-->
    <form method="post" class="form-register" action="">
        <h2 class="text-center">Register</h2><br><br>
        <?php 
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
            include 'check-reg.php';
            }
        ?>
        <div class="row">
            <div class="col-xl">
                <input type="text" class="input" name="Name" placeholder="Name" required autofocus>
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </div>
            <div class="col-xl">
                <input type="text" class="input" name="Lastname" placeholder="Lastname" required autofocus>
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </div>
        </div>
        <br><br>

        <div>
            <input type="text" class="input" name="userName-reg" pattern="[a-z0-9].{7,15}" title="least 8-16 characters"
                placeholder="Username" required autofocus>
            <div class="line-box">
                <div class="line"></div>
            </div>
        </div><br><br>
        <div>
            <input type="password" class="input" name="passWord-reg" pattern="[A-Za-z0-9].{7,15}"
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8-16 characters"
                placeholder="Password" required autofocus>
            <div class="line-box">
                <div class="line"></div>
            </div>
        </div><br><br>
        <div>
            <input type="password" class="input" name="repeatpassWord-reg" pattern="[A-Za-z0-9].{7,15}"
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8-16 characters"
                placeholder="Repeat your password" required autofocus>
            <div class="line-box">
                <div class="line"></div>
            </div>
        </div><br><br>
        <div>
            <input type="tel" class="input" name="phone-reg" pattern="[0-9]{10}" placeholder="Phone" required autofocus>
            <div class="line-box">
                <div class="line"></div>
            </div>
        </div><br><br>

        <button class="btn-signin" data-toggle="modal" data-target="#myModal" formaction="register.php"
            name="btn_reg">></button>

        <br><br>
        <div>
            <p style="font-size:12px">
                <a class="mt-5 mb-3 text-muted" href="/FiFO/login-FiFO.php"> Sign in </a>
                <a class="mt-5 mb-3 text-muted">|</a>
                <a class="mt-5 mb-3 text-muted" href="/3/reg.php"> Forgot Password</a><br><br>
            </p>
        </div>
    </form>
    <!--Register End-->

    </div>
    <div>
        <!-- Jquery, Popper, Bootstrap -->
        <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="./assets/js/vendor/jquery-1.12.4.min.js "></script>
        <script src="./assets/js/popper.min.js "></script>
        <script src="./assets/js/bootstrap.min.js "></script>
    </div>
</body>

</html>