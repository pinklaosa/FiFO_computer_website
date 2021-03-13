<!DOCTYPE html>
<html>
    <head>
        <?php
        include('headeradmin.php');
        error_reporting(error_reporting() & ~E_NOTICE);
        ?>
    <head>
    <body>
        <div class="container">
<?php include('navbar.php'); ?>
            <p></p>
            <div class="row">
                <div class="col-md-3">
<?php include('menuadmin.php'); ?>
                </div>
                <div class="col-md-9" >
                    <?php
                    $act = $_REQUEST['act'];
                    if ($act == 'detail') {
                        include('detail.php');
                    } else {
                        include('summary.php');
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
