<?php
include 'server.php';
session_start();
  if(isset($_SESSION['username'])){
    $usernamelogin = $_SESSION['username'];
    $accountsql= $mysqli->query("SELECT * from fifo_account where username = '".$usernamelogin."'");
    $account = $accountsql->fetch_object();
    $tieraccount = $account->tier;
    if($tieraccount != 'admin'){
      header('location: ../homepage.php');
    }
  }else{
      header('location: ../homepage.php');
  }
?>



<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FiFO</title>
 <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
