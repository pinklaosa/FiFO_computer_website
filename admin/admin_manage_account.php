<!DOCTYPE html>
<html>
    <head>
        <?php
        include 'server.php';
        include('headeradmin.php');
        error_reporting(error_reporting() & ~E_NOTICE);
        ?>

    <head>
    <body >
        <div class="container">
            <?php include('navbar.php'); ?>
            <p></p>
            <div class="row">
                <div class="col-md-3">
                    <?php include('menuadmin.php'); ?>
                </div>
                <div class="col-md-9">
                    <a href="admin_manage_account.php?act=1"><button type="button" class="btn btn-success" style="width:100px;height:50px">User</button></a>
                    <a href="admin_manage_account.php?act=2"><button type="button" class="btn btn-info" style="width:100px;height:50px">admin</button></a>
                    <br><br><br><br>
                    <?php
                    if ($_REQUEST['act'] == '1' || $_REQUEST['act'] == '2') {
                        if ($_REQUEST['act'] == '1') {
                            include 'manage_user.php';
                        } else {
                            include 'manage_admin.php';
                        }
                    } if ($_REQUEST['act'] == '3') {
                        $_SESSION['useredit'] = $_REQUEST['username'];
                        $sql = "SELECT * FROM fifo_account where username ='" . $_REQUEST['username'] . "' ";
                        $resulf = $mysqli->query($sql);
                        $firstname = '';
                        $lastname = '';
                        $phone = '';
                        while ($data = $resulf->fetch_object()) {
                            $firstname = $data->name;
                            $lastname = $data->lastname;
                            $phone = $data->phone;
                        }
                        ?>
                        <p><font size="6">Edit ID : <?php echo $_REQUEST['username']; ?></font></p>
                        <form action="update_user.php" method="POST">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault01">First name</label>
                                    <input type="text" class="form-control" name='firstname' placeholder=" <?php echo $firstname; ?>" >
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault02">Last name</label>
                                    <input type="text" class="form-control" name='lastname' placeholder="<?php echo $lastname; ?>" >
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault03">Phone</label>
                                    <input type="text" class="form-control" name="phone"  placeholder="<?php echo $phone; ?>" pattern="[0-9]{1,}" title="0-9" >
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault03">Password</label>
                                    <input type="password" class="form-control" name="password" >
                                </div>

                            </div>
                            <button class="btn btn-primary" type="submit" >Submit form</button>
                        </form>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
