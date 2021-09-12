<?php 
if(!isset($_SESSION)){
    session_start();
}
    include('./header.php');
    if(isset($_SESSION['is_login'])){
        $s_email = $_SESSION['semail'];
    }else{
        echo"<script> location.herf='../index.php';</script>";
    }
    if(isset($_REQUEST['stupasswordupbtn'])){
        if(($_REQUEST['s_password']=="")){
            $passmsg = '<div class="alert alert-warning col-sm-6 ml-5mt-2" role="alert">Fill all fileds</div>';
        }
        else{
            $sql="SELECT * FROM student where s_email='$s_email' ";
            $result = $conn->query($sql);
            if($result->num_rows==1){
                $s_password = $_REQUEST['s_password'];
                $sql = "
                UPDATE `student` SET `s_password`='$s_password' WHERE `s_email` ='$s_email';";

                if($conn->query($sql)==TRUE){
                    $passmsg = '<div class="alert alert-success col-sm-6 ml-5mt-2" role="alert">Updated successfully</div>';
                }
                else{
                    $passmsg = '<div class="alert alert-warning col-sm-6 ml-5mt-2" role="alert">Unable to update</div>';
                }
            }
        }
    }
?>

<div class="col-sm-9 mt-5">
    <div class="row">
        <div class="col-sm-6">
            <form action="" class="mt-5 mx-5">
                <div class="form-group">
                    <label for="inputemail">Email</label></br>
                        <input type="email" name="s_email" readonly id="s_email" class="from-control" value="<?php echo $s_email ?> ">
                </div>
                <div class="form-group">
                    <label for="inputemail">Password</label><br>
                        <input type="password" name="s_password" id="s_password" class="from-control" placeholder="enter password">
                </div>
                <button type="submit" id="stupasswordupbtn" name="stupasswordupbtn" class="btn btn-danger mt-5">Submit</button>
                <?php 
                if(isset($passmsg)){
                    echo $passmsg;
                }
                ?>
            </form>
        </div>
    </div>
</div>

<?php
    include('./footer.php');
?>