<?php
include 'server.php';
session_start();

///--------------updatedatabase---------------------------------------

if (!empty($_POST['firstname'])) {
    echo 'มา';
    $sql = "UPDATE fifo_account set name='".$_POST['firstname']."' WHERE username='".$_SESSION['useredit']."'";
    $mysqli->query($sql);
}

if (!empty($_POST['lastname'])) {
    $sql = "UPDATE fifo_account set lastname='".$_POST['lastname']."' WHERE username='".$_SESSION['useredit']."'";
    $mysqli->query($sql);
}
if (!empty($_POST['phone'])) {
    $sql = "UPDATE fifo_account set phone='".$_POST['phone']."' WHERE username='".$_SESSION['useredit']."'";
    $mysqli->query($sql);
}

if (!empty($_POST['password'])) {
     echo 'มา3';
    $sql = "UPDATE fifo_account set password='".$_POST['password']."' WHERE username='".$_SESSION['useredit']."'";
    $mysqli->query($sql);
}

?>
<script type="text/javascript">
    alert("<?php echo 'แก้ไขเรียบร้อย'; ?>");
    window.location = 'admin_manage_account.php';
</script>

