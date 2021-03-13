<?php
session_start();
include 'server.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Confirm</title>
    </head>
    <body><?php
    if(isset($_REQUEST['pc'])){
        $AAA06 = $_SESSION['AAA06'];
        $product06 = $_SESSION['productIDAAA06'];

        $AAA07 = $_SESSION['AAA07'];
        $product07 = $_SESSION['productIDAAA07'];

        $AAA08 = $_SESSION['AAA08'];
        $product08 = $_SESSION['productIDAAA08'];

        $AAA09 = $_SESSION['AAA09'];
        $product09 = $_SESSION['productIDAAA09'];

        $AAA10 = $_SESSION['AAA10'];
        $product10 = $_SESSION['productIDAAA10'];

        $AAA12 = $_SESSION['AAA12'];
        $product12 = $_SESSION['productIDAAA12'];

        $AAA13 = $_SESSION['AAA13'];
        $product13 = $_SESSION['productIDAAA13'];

        $pcCategory = array($AAA06,$AAA07,$AAA08,$AAA09,$AAA10,$AAA12,$AAA13);
        $pcProduct = array($product06,$product07,$product08,$product09,$product10,$product12,$product13);

        $username = $_SESSION['username'];
        $insertBuild = "INSERT into tbl_buildpc values(null,'$username')";
        $queryBuild = $mysqli->query($insertBuild);

        $sql2 = "select max(buildID) as buildID from tbl_buildpc where username='$username' ";
        $query2 = $mysqli->query($sql2);
        $buildID = 0;
        while ($data = $query2->fetch_object()) {
            $buildID = $data->buildID;
        }

        for ($i=0; $i < 7; $i++) { 
            $priceQuery = "SELECT * from tbl_products where productID = '$pcProduct[$i]'";
            $priceQuery2 = $mysqli->query($priceQuery);
            $price = $priceQuery2->fetch_object();
            $priceP = $price->productPrice;

            $insertsql = "INSERT into tbl_buildpcdetail values(null, '$buildID' , '$pcCategory[$i]' , '$pcProduct[$i]',$priceP)";
            $insertquery = $mysqli->query($insertsql);
        }
        if($queryBuild && $insertquery){
            $mysqli->query("COMMIT");
            $msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
            unset($_SESSION['AAA06']);
            unset($_SESSION['AAA07']);
            unset($_SESSION['AAA08']);
            unset($_SESSION['AAA09']);
            unset($_SESSION['AAA10']);
            unset($_SESSION['AAA12']);
            unset($_SESSION['AAA13']);

            unset($_SESSION['productIDAAA06']);
            unset($_SESSION['productIDAAA07']);
            unset($_SESSION['productIDAAA08']);
            unset($_SESSION['productIDAAA09']);
            unset($_SESSION['productIDAAA10']);
            unset($_SESSION['productIDAAA12']);
            unset($_SESSION['productIDAAA13']);
        }else {
            $mysqli->query( "ROLLBACK");
            $msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";
        }
    }
        ?>

        <script type="text/javascript">
            alert("<?php echo $msg; ?>");
            window.location = 'homepage.php';
        </script>
        </body>
</html>