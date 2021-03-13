<?php
include("server.php");
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Confirm</title>
    </head>
    <body>
        <!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
        <?php
        $login = $_SESSION['username'];
        $dttm = Date("Y-m-d G:i:s");
        //บันทึกการสั่งซื้อลงใน order_detail
        mysqli_query($mysqli, "BEGIN");
        $sql1 = "insert into tbl_order values(null, '$dttm', '$login')";
        $query1 = $mysqli->query($sql1);

        //ฟังก์ชั่น MAX() จะคืนค่าที่มากที่สุดในคอลัมน์ที่ระบุ ออกมา หรือจะพูดง่ายๆก็ว่า ใช้สำหรับหาค่าที่มากที่สุด นั่นเอง.
        $sql2 = "select max(orderID) as orderID from tbl_order where username='$login'  and date='$dttm' ";
        $query2 = $mysqli->query($sql2);
        $orderID = 0;
        while ($data = $query2->fetch_object()) {
            $orderID = $data->orderID;
        }

//PHP foreach() เป็นคำสั่งเพื่อนำข้อมูลออกมาจากตัวแปลที่เป็นประเภท array โดยสามารถเรียกค่าได้ทั้ง $key และ $value ของ array
        foreach ($_SESSION['cart'] as $ProductID => $qty) {
            $sql3 = "select * from tbl_products where productID='$ProductID'";
           $query3 = $mysqli->query($sql3);
           $ProductPrice = 0 ;
           while($row = mysqli_fetch_array($query3)) {
            $ProductPrice = $row['productPrice'];
        } 
            $total = $ProductPrice * $qty;
            $sql4 = "insert into tbl_orderdetail values(null, '$orderID', '$ProductID', '$qty', '$total')";
            $query4 = $mysqli->query($sql4);
        }

        if ($query1 && $query4) {
            $mysqli->query("COMMIT");
            $msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
            foreach ($_SESSION['cart'] as $ProductID) {
                //unset($_SESSION['cart'][$p_id]);
                unset($_SESSION['cart']);
            }
        } else {
            $mysqli->query( "ROLLBACK");
            $msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";
        }
        ?>
        <script type="text/javascript">
            alert("<?php echo $msg; ?>");
            window.location = 'homepage.php';
        </script>
    </body>
</html>
