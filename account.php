<?php   
session_start();
    $pageAccount = isset($_GET['a']) ? $_GET['a'] : 1;
    if(!isset($_SESSION['username'])){
        header('location: login-FiFO.php');
    }
?>


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

<body class="full-wrapper">
    <form class="form-account">
        <h2 style="margin-top: -40px; margin-left: 100px; color:white;"> Account </h2>
        <hr style="width: 113%; height: 1px; border-width:0; background-color: #771212d2;">
        <div class="row">
            <div class="col-sm-4">
                <div class="sidenav">
                    <a href="homepage.php">
                        <div class="font-sidenav">Home</div>
                    </a><br>
                    <a href="account.php?a=1">
                        <div class="font-sidenav" <?php if($pageAccount == 1){ echo 'style="padding-left: 30px; color: #771212;"';}?>>Account</div>
                    </a><br>
                </div>
            </div>
            <?php
                include 'server.php';
                $accountSQL = 'SELECT * from fifo_account where username = "'.$_SESSION['username'].'"';
                $accountQuery = $mysqli->query($accountSQL);
                $accountData = $accountQuery->fetch_object();
                $accountName = $accountData->name;
                $accountLastname = $accountData->lastname;
                $accountPassword = $accountData->password;
                $accountPhone = $accountData->phone;
            ?>
            <div class="col-sm-8">
                <div class="main-account">
                    <h5 style="color: white; text-align: center; font-weight: 600;">Your Data</h5><br>
                    <h5 style="color: white; font-weight: 600;">Name</h5>
                    <div class="row">
                        <div class="col">
                            <h5 style="color: white;"><?php echo $accountName;?></h5>
                        </div>
                        <div class="col">
                            <h5 style="color: white;"><?php echo $accountLastname;?></h5>
                        </div>
                    </div><br>
                    <h5 style="color: white; font-weight: 600;">Password</h5>
                    <div class="row">
                        <div class="col">
                            <h6 style="color: white;"><?php for($i=0;$i<strlen($accountPassword);$i++){ echo '*';}?></h6>
                        </div>
                        <div class="col">
                            <h5></h5>
                        </div>
                    </div><br>
                    <h5 style="color: white; font-weight: 600;">Phone</h5>
                    <div class="row">
                        <div class="col">
                            <h6 style="color: white;"><?php echo substr($accountPhone,0,3)."*******";?></h6>
                        </div>
                        <div class="col">
                            <h5></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php
    include 'lower.php';
?>