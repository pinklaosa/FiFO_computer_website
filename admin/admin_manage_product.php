<!DOCTYPE html>
<?php
include "server.php";
$act = '';
$productID = '';
if (isset($_REQUEST['act'], $_REQUEST['productID'])) {
    $act = $_REQUEST['act'];
    $productID = $_REQUEST['productID'];
}
if ($act == 'delete') {
    $sqlDelete = "DELETE FROM tbl_products WHERE productID='$productID'";
    $mysqli->query($sqlDelete);
}  
?>
<html>
    <head>
        <?php
        include('headeradmin.php');
        error_reporting(error_reporting() & ~E_NOTICE);
        ?>
        <script language="javascript" src="js/jquery-3.5.1.min.js"></script>
        <script language="javascript">
            $(document).ready(function () {
                $("#cbx_type").change(function () {
                    $('#cbx_brand').find('option').remove().end().append('<option value="0">Select brand</option>');

                    $("#cbx_type option:selected").each(function () {
                        id_type = $(this).val();
                        $.post("getCategory.php", {id_type: id_type},
                                function (data) {
                                    $("#cbx_category").html(data);
                                });
                    });

                })
            });
            $(document).ready(function () {
                $("#cbx_category").change(function () {
                    $("#cbx_category option:selected").each(function () {
                        id_category = $(this).val();
                        $.post("getBrand.php", {id_category: id_category},
                                function (data) {
                                    $("#cbx_brand").html(data);
                                });
                    });

                })
            });
        </script>
    <head>
    <body>


        <div class="container">
            <?php include('navbar.php'); ?>
            <p></p>
            <div class="row">
                <div class="col-md-3">
                    <?php include('menuadmin.php'); ?>
                </div>
                <div class="col-md-9">
                    <?php
                    if (!isset($_REQUEST['edit'])) {
                        include 'showProduct.php';
                    } else {
                        include 'headeradmin.php';
                        $productID = $_REQUEST['productID'];
                        $sqlEdit = "SELECT * FROM `tbl_products` INNER JOIN "
                                . "tbl_category on tbl_products.categoryID =tbl_category.categoryID inner join tbl_brand on "
                                . "tbl_products.brandID = tbl_brand.brandID where tbl_products.productID ='$productID' ";
                        $resulfedit = $mysqli->query($sqlEdit);

                        $sqlbrand = 'SELECT * FROM `tbl_brand`';
                        $resulfbrand = $mysqli->query($sqlbrand);
                        $sqlcategory = 'SELECT * FROM `tbl_category`';
                        $resulfcategory = $mysqli->query($sqlcategory);

                        while ($data = $resulfedit->fetch_object()) {
                            $_SESSION["productID"]=$data->productID;
                            $pN = $data->productName;
                            $pP = $data->productPrice;
                            $pC = $data->categoryName;
                            $pB = $data->brandName;
                            $pD = $data->productDetail;
                            
                            ?>

                            <p ><font size="6"> Edit  product<sup><font size="2"><?php echo $pN; ?></font>  </sup></font></p>
                            <form action="manage_product_update.php" method="POST" enctype="multipart/form-data">
                                <label for="lname">Product_Name:</label><br>
                                <input type="text" id="lname" name="productName" placeholder="<?php echo $pN; ?>" ><br><br>
                                <label for="lname">Product details:</label><br>
                                <textarea name="productDetail" class="form-control"  rows="5"   placeholder="<?php echo $pD; ?>"></textarea><br>
                                <label for="fname">Product_Price:</label><br>
                                <input type="text" id="fname" name="productPrice" placeholder="<?php echo $pP; ?>" pattern="[0-9]{1,}" title="0-9" ><br><br>
                                <label for="exampleInputPassword1">image</label>
                                <input type="file"   name="filename" id="filename">
                            <?php } ?>
                            <br><br>
                            <select name="brand">
                                <option value='0'>brand</option>
                                <?php
                                while ($data = $resulfbrand->fetch_object()) {
                                    $id1 = $data->brandID;
                                    $brand = $data->brandName;
                                    echo '<option value=' . $id1 . '>' . $brand . '</option>';
                                }
                                ?>
                            </select> 
                            <select name="category" >
                              <option value='0'>category</option>
                                <?php
                                while ($data = $resulfcategory->fetch_object()) {
                                    $id2 = $data->categoryID;
                                    $category = $data->categoryName;
                                    echo '<option value=' . $id2 . '>' . $category . '</option>';
                                }
                                ?>
                            </select>
                            <br><br>
                            <button type="submit" >Submit</button>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
