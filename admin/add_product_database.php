<?php

include 'server.php';
//------------------------NEWID--------------------------------------
function extract_int($str) {
    preg_match('/[^0-9]*([0-9]+)[^0-9]*/', $str, $regs);
    return (intval($regs[1]));
}

$sql = 'SELECT max(productID) as productID FROM `tbl_products`';
$resulf = $mysqli->query($sql);
$latestID = '';
while ($data = $resulf->fetch_object()) {
    $latestID = $data->productID;
}
$newID = intval(extract_int($latestID)) + 1;
$strNewID = "$newID";
$sql2 = "select max(concat('A',LPAD('$newID',4,'0'))) as new from tbl_products";
$resulfNewID = $mysqli->query($sql2);
$pNewID = ''; //ตัวแปลไอดีใหม่
while ($data = $resulfNewID->fetch_object()) {
    $pNewID = $data->new;
}

///--------------adddatabase----------------------------------------------
$filename = basename($_FILES["filename"]["name"]);
$pName = $_POST['productName'];
$pPrice = $_POST['productPrice'];
$pDetail = $_POST['productDetail'];
$pBrand = $_POST['brand'];
$pCategory = $_POST['category'];
$sql3 = "insert into tbl_products values('$pNewID','$pName','$pPrice','$pBrand ','$pCategory','$filename','$pDetail')";
//---------------------------------------------------------------
$text = '';
if (!empty($_FILES["filename"])) {
    $targetdir = 'image/';
    $targetpath = "$targetdir" . "$filename";
    $filetype = pathinfo($targetpath, PATHINFO_EXTENSION);
    $alltype = array('jpg', 'jpeg', 'png');
    if (in_array($filetype, $alltype)) {
        if (move_uploaded_file($_FILES["filename"]["tmp_name"], $targetpath)) {
            $insert =  $mysqli->query($sql3);
           
            if($insert){
                $text='บันทึก';
            }
        }
    } else {
    $text='ไม่ได้บันทึก';    
    }
}
?>
     <script type="text/javascript">
            alert("<?php echo $text; ?>");
            window.location = 'admin_add_product.php';
        </script>