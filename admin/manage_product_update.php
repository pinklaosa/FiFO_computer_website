<?php
include 'server.php';
session_start();
//------------------------NEWID--------------------------------------
///--------------updatedatabase----------------------------------------------
if (!empty($_POST['productName'])) {
    echo 'มา';
    $sql = "UPDATE tbl_products SET productName = '" . $_POST['productName'] . "' WHERE productID='" . $_SESSION['productID'] . "'";
    $mysqli->query($sql);
}

if (!empty($_POST['productPrice'])) {
    $sql = "UPDATE tbl_products SET productPrice = " . $_POST['productPrice'] . " WHERE productID='" . $_SESSION['productID'] . "'";
    $mysqli->query($sql);
}
if($_POST['category']!='0'){
 $sql = "UPDATE tbl_products SET categoryID = '" . $_POST['category'] . "' WHERE productID='" . $_SESSION['productID'] . "'";
    $mysqli->query($sql);   
}
if ($_POST['brand']!='0') {
    $sql = "UPDATE tbl_products SET brandID = '" . $_POST['brand'] . "' WHERE productID='" . $_SESSION['productID'] . "'";
    $mysqli->query($sql);
}
if (!empty($_POST['productDetail'])) {
    $sql = "UPDATE tbl_products SET productDetail = '" . $_POST['productDetail'] . "' WHERE productID='" . $_SESSION['productID'] . "'";
    $mysqli->query($sql);
}
if (!empty($_FILES['filename'])) {
    echo 'มา2';
    $filename = basename($_FILES["filename"]["name"]);
    echo $filename;
    $targetdir = 'image/';
    $targetpath = "$targetdir" . "$filename";
    move_uploaded_file($_FILES["filename"]["tmp_name"], $targetpath);
    $sql = "UPDATE tbl_products SET productIMG = '" . $filename . "' WHERE productID='" . $_SESSION['productID'] . "'";
    $mysqli->query($sql);
}
?>
<script type="text/javascript">
    alert("<?php echo 'แก้ไขเรียบร้อย'; ?>");
    window.location = 'admin_manage_product.php';
</script>