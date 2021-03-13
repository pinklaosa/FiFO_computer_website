<?php
include 'headeradmin.php';
include 'server.php';
$sqlbrand = 'SELECT * FROM `tbl_brand`';
$resulfbrand = $mysqli->query($sqlbrand);
$sqlcategory = 'SELECT * FROM `tbl_category`';
$resulfcategory = $mysqli->query($sqlcategory);


?>

<p align="center"><font size="6"> Add  product<sup>FiFO  </sup></font></p>
<form action="add_product_database.php" method="POST" enctype="multipart/form-data">
    <label for="lname">Product_Name:</label><br>
    <input type="text" id="lname" name="productName" placeholder="กรอกชื่อสินค้า...." required><br><br>
    <label for="lname">Product details:</label><br>
    <textarea name="productDetail" class="form-control"  rows="5"  required placeholder="รายละเอียดสินค้า"></textarea><br>
    <label for="fname">Product_Price:</label><br>
    <input type="text" id="fname" name="productPrice" placeholder="กรอกราคาสินค้า...." pattern="[0-9]{1,}" title="0-9" required><br><br>
    <label for="exampleInputPassword1">image</label>
    <input type="file"   name="filename" id="filename" required><br><br>
    <select name="brand">
        <?php
        while ($data = $resulfbrand->fetch_object()) {
            $id1 = $data->brandID;
            $brand = $data->brandName;
            echo '<option value=' . $id1 . '>' . $brand . '</option>';
        }
        ?>
    </select> 
    <select name="category">
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

