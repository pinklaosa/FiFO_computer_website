<?php

include('headeradmin.php');
include('server.php');
$o1 = $_REQUEST['ID'];
echo '<table class="table table-hover">';
            echo '<thead>';
              echo '<tr>';
                echo '<th scope="col">No.</th>';
                echo '<th scope="col">Username</th>';
                echo '<th scope="col">Date</th>';
                echo '<th scope="col">Product</th>';
                echo '<th scope="col">Unit</th>';
               echo '<th scope="col">Totalprice</th>';
              echo '</tr>';
            echo '</thead>';
              echo '<tbody>';
      $sql ='SELECT tbl_order.username as username,tbl_order.date as 
      date,tbl_products.productName as productname,tbl_orderdetail.qty
       as qty,tbl_orderdetail.price as price FROM tbl_order
       INNER join tbl_orderdetail on tbl_order.orderID=tbl_orderdetail.orderID 
       INNER JOIN tbl_products on tbl_orderdetail.productID=tbl_products.productID WHERE 
       tbl_order.orderID='.$o1.'';
      $resulf = $mysqli->query($sql);
      $no = 0;
      while($data=$resulf->fetch_object()){
          $no += 1;
          $productname = $data->productname;
          $username = $data->username;
          $date = $data->date;
            $qty=$data->qty;
            $price=$data->price;
    echo'<tr>';
     echo '<th scope="row">'.$no.'</th>';
      echo '<td>'.$username.'</td>';
      echo '<td>'.$date.'</td>';
      echo '<td>'.$productname.'</td>';
      echo '<td>'.$qty.'</td>';
      echo '<td>'.$price.'</td>';
    echo '</tr>';

      } 
       echo '</tbody>';
echo'</table>';
mysqli_close($mysqli);


