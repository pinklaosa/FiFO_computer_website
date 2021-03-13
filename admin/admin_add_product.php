<!DOCTYPE html>
<html>
    <head>
        <?php
        include 'headeradmin.php';
        error_reporting(error_reporting()& ~ E_NOTICE);
        ?>
    </head>
    <body>
        <div class="container">
            <?php
            include 'navbar.php';
            ?>
            <p></p>
            <div class='row'>
                <div class="col-md-3">
                    <?php
                    include 'menuadmin.php';
                    ?>
                </div>
                <div class='col-md-6'>
                    <?php
                        include 'add_product.php';    
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
