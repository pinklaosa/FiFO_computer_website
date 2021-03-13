<?php 
include 'server.php';
//---------------------------------------------------------------
    echo '<table class="table ">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">no.</th>';
    echo '<th scope="col">username</th>';
    echo '<th scope="col">password</th>';
    echo '<th scope="col">name</th>';
    echo '<th scope="col">lastname</th>';
    echo '<th scope="col">phon</th>';
    echo '<th scope="col">Edit</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    $no = 0;
$sql="SELECT * FROM fifo_account WHERE tier = 'member'";
$resulf = $mysqli->query($sql);
while ($data = $resulf->fetch_object()){
     $no ++;
  $username = $data->username;
  $password = $data->password;
  $name = $data->name;
  $lastname = $data->lastname;
  $phone = $data->phone;
  $tier = $data->tier;
   echo'<tr>';
        echo '<th scope="row">' . $no . '</th>';
        echo "<td>$username</td>";
        echo "<td >$password </td>";
        echo '<td>' .$name. '</td>';
        echo '<td>' . $lastname . '</td>';
        echo "<td> $phone </td>";
        echo "<td align='center'><a href='admin_manage_account.php?act=3&username=$username'><button type='submit' class='btn btn-danger'>Edit</button></a></td> ";
        echo '</tr>';
}
 echo '</tbody>';
    echo'</table>';
?>

