<?php

include('headeradmin.php');
include('server.php');
$sql = 'SELECT tbl_order.orderID as orderid,tbl_order.username as username,tbl_order.date as date,sum(tbl_orderdetail.qty)
       as unitorder,SUM(tbl_orderdetail.price) as tatalprice FROM `tbl_order`inner join tbl_orderdetail 
       on tbl_order.orderID = tbl_orderdetail.orderID GROUP by tbl_order.orderID';
$resulf = $mysqli->query($sql);
echo '<table class="table table-hover">';
echo '<thead>';
echo '<tr>';
echo '<th scope="col">no.</th>';
echo '<th scope="col">OrderID</th>';
echo '<th scope="col">username</th>';
echo '<th scope="col">date</th>';
echo '<th scope="col">tatalorder</th>';
echo '<th scope="col">tatalprice</th>';
echo '<th scope="col"></th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
$sql = 'SELECT tbl_order.orderID as orderid,tbl_order.username as username,tbl_order.date as date,sum(tbl_orderdetail.qty)
       as unitorder,SUM(tbl_orderdetail.price) as tatalprice FROM `tbl_order`inner join tbl_orderdetail 
       on tbl_order.orderID = tbl_orderdetail.orderID GROUP by tbl_order.orderID';
$resulf = $mysqli->query($sql);
$no = 0;
while ($data = $resulf->fetch_object()) {
    $no += 1;
    $orderid = $data->orderid;
    $username = $data->username;
    $date = $data->date;
    $tatalorder = $data->unitorder;
    $tatalprice = $data->tatalprice;


    echo'<tr>';
    echo '<th scope="row">' . $no . '</th>';
    echo '<td>' . $orderid . '</td>';
    echo '<td>' . $username . '</td>';
    echo '<td>' . $date . '</td>';
    echo '<td>' . $tatalorder . '</td>';
    echo '<td>' . $tatalprice . '</td>';
    echo "<td><a href='admin.php?act=detail&ID=$orderid' class='btn btn-warning btn-xs'>Detail</a></td> ";
    echo '</tr>';
}
echo '</tbody>';
echo'</table>';

//5. close connection
mysqli_close($mysqli);
