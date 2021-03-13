<?php 
    include "server.php";
    $id_category = $_POST['id_category'];
    $sqlbrand = "SELECT tbl_products.categoryID,tbl_brand.brandID as brandID,tbl_brand.brandName as 
    brandName FROM tbl_products INNER JOIN tbl_brand ON tbl_products.brandID = tbl_brand.brandID 
    where categoryID = '$id_category' GROUP BY tbl_brand.brandID";
    $resulfbrand = $mysqli->query($sqlbrand);

    $html=" <option value='0'>Select brand</option>";
    echo $html;

    while($data=$resulfbrand->fetch_object()){
        $brandID=$data->brandID;
        $brandname=$data->brandName;
        $html="<option value='".$brandID."'>".$brandname."</option>";
        echo $html;
    }


?>