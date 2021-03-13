
    
<?php
    include 'server.php';

    $inputusernameReg = $_POST['userName-reg'];
    $inputpasswordReg = $_POST['passWord-reg'];
    $inputpassword2Reg = $_POST['repeatpassWord-reg'];
    $inputphoneReg = $_POST['phone-reg'];
    $inputnameReg = $_POST['Name'];
    $inputlastnameReg = $_POST['Lastname'];
    
    $user_check = "SELECT * FROM fifo_account WHERE username ='$inputusernameReg' OR phone ='$inputphoneReg' LIMIT 1";
    $result = $mysqli -> query($user_check);
    $user = $result->fetch_object();

    if($inputpasswordReg != $inputpassword2Reg){
        ?> <div class="block-al">
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong></strong> The two passwords do not match.
            </div>
        </div>
    <?php 
    }


    if ($user) { // if user exists
        if ($user->username == $inputusernameReg) {
            ?>  <div class="block-al">
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong></strong> Username already exists.
            </div>
        </div>
    <?php 
        }
    
        if ($user->phone == $inputphoneReg) {
            ?>  <div class="block-al">
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong></strong> Tel. already exists.
            </div>
        </div>
    <?php 
        }
      }
   
    if(!$user && $inputpasswordReg == $inputpassword2Reg){
        $inputpassword = $inputpasswordReg;
        $setdata = $mysqli -> query("insert into fifo_account (username,password,name,lastname,phone) values('{$inputusernameReg}','{$inputpassword}','{$inputnameReg}','{$inputlastnameReg}','{$inputphoneReg}')"); 
        ?>  <div class="block-al">
            <div class="alert alert-success" role="alert">
                Success !  <a href="login-FiFO.php" class="alert-link">Sign in</a>. Give it a click if you go back to login.
            </div>
        </div>
    <?php 
    }
    ?>