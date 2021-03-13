<?php
   include 'server.php';

    $inputUsername = $_POST['userName'];
    $inputPassword = $_POST['passWord'];

    $result = $mysqli -> query("select * from fifo_account where username = '{$inputUsername}' and password = '{$inputPassword}'");
    $checkRow = $result->num_rows;

?>