<?php 
    include "server.php";
    $id_type = $_POST['id_type'];
    $sqlcategory = "SELECT * FROM `tbl_category` WHERE typeID = '$id_type'";
    $resulfcategory = $mysqli->query($sqlcategory);

    $html=" <option value='0'>Select category</option>";
   echo $html ;

    while($data=$resulfcategory->fetch_object()){
        $categoryID=$data->categoryID;
        $categoryname=$data->categoryName;
        $html="<option value='".$categoryID."'>".$categoryname."</option>";
        echo $html;
    }
    

?>