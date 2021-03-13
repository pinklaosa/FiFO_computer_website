
<form id="combo" name="combo" action="admin_manage_product.php" method="POST">
    <select id="cbx_type" name="cbx_type">
        <option value="0">Select Type</option>
        <?php
        $sqltype = "SELECT * FROM `tbl_type`";
        $resultype = $mysqli->query($sqltype);
        while ($data = $resultype->fetch_object()) {
            $typeID = $data->typeID;
            $typename = $data->typeName;
            ?>
            <option value="<?php echo $typeID; ?>"><?php echo $typename; ?></option>
        <?php } ?>
    </select>    
    <select id="cbx_category" name="cbx_category">
        <option value='0'>Select category</option>
    </select>
    <select id="cbx_brand" name="cbx_brand">
        <option value='0'>Select brand</option>
    </select>
    <input type="submit" id="even" name="even" value="Select"/>
</form></br>
<div>
    <?php
    
    $t1 = '0';
    $c1 = '0';
    $b1 = '0';
    if (isset($_REQUEST['cbx_type'])) {
        $t1 = $_REQUEST['cbx_type'];
    }
    if (isset($_REQUEST['cbx_category'])) {
        $c1 = $_REQUEST['cbx_category'];
    }
    if (isset($_REQUEST['cbx_brand'])) {
        $b1 = $_REQUEST['cbx_brand'];
    }
    $sqlproduct = '';
    $sqlproduct1 = '';
    if ($t1 == '0') {
        $sqlproduct = "SELECT * FROM `tbl_products` INNER JOIN "
                . "tbl_category on tbl_products.categoryID =tbl_category.categoryID inner join tbl_brand on "
                . "tbl_products.brandID = tbl_brand.brandID ";
        $sqlproduct1 = "SELECT * FROM `tbl_products` INNER JOIN "
                . "tbl_category on tbl_products.categoryID =tbl_category.categoryID inner join tbl_brand on "
                . "tbl_products.brandID = tbl_brand.brandID ";
    } else if ($t1 != '0' && $c1 == '0' && $b1 == '0') {
        $sqlproduct = "SELECT * FROM `tbl_products` INNER JOIN tbl_category on "
                . "tbl_products.categoryID =tbl_category.categoryID inner join "
                . "tbl_brand on tbl_products.brandID = tbl_brand.brandID "
                . "WHERE tbl_category.typeID = '$t1'";
    } else if ($t1 != '0' && $c1 != '0' && $b1 == '0') {
        $sqlproduct = "SELECT * FROM `tbl_products` INNER JOIN tbl_category on "
                . "tbl_products.categoryID =tbl_category.categoryID inner join "
                . "tbl_brand on tbl_products.brandID = tbl_brand.brandID "
                . "WHERE tbl_category.typeID = '$t1' and tbl_category='$c1'";
    } else {
        $sqlproduct = "SELECT * FROM `tbl_products` INNER JOIN tbl_category on "
                . "tbl_products.categoryID =tbl_category.categoryID inner join "
                . "tbl_brand on tbl_products.brandID = tbl_brand.brandID "
                . "WHERE tbl_category.typeID = '$t1' and tbl_category.categoryID='$c1' and tbl_brand.brandID='$b1' ";
    }
    $resulfproduct = $mysqli->query($sqlproduct);
    echo '<table class="table table-hover">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">no.</th>';
    echo '<th scope="col">image</th>';
    echo '<th scope="col">Product</th>';
    echo '<th scope="col">Price</th>';
    echo '<th scope="col">Category</th>';
    echo '<th scope="col">Brand</th>';
    echo '<th scope="col">Delete</th>';
    echo '<th scope="col">Edit</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    $no = 0;
    while ($data = $resulfproduct->fetch_object()) {
        $no++;
        $pID = $data->productID;
        $pN = $data->productName;
        $pP = $data->productPrice;
        $pC = $data->categoryName;
        $pB = $data->brandName;
        $pIm = $data->productIMG;
        echo'<tr>';
        echo '<th scope="row">' . $no . '</th>';
        echo "<td><img src='img/product/$pIm' width='80'></td>";
        echo "<td >$pN</td>";
        echo '<td>' . $pP . '</td>';
        echo '<td>' . $pC . '</td>';
        echo '<td>' . $pB . '</td>';
        echo "<td align='center'><a href='admin_manage_product.php?act=delete&productID=$pID'><button type='submit' class='btn btn-primary'>Delete</button></a></td> ";
        echo "<td align='center'><a href='admin_manage_product.php?edit=edit&productID=$pID'><button type='submit' class='btn btn-danger'>Edit</button></a></td> ";
        echo '</tr>';
    }
    echo '</tbody>';
    echo'</table>';

    ?>