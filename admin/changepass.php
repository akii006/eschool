<?php 
    if(!isset($_SESSION)){
        session_start();
    }
    include('header.php');
    include('../dbconnection.php');

    if(isset($_SESSION['is_alog'] )){
        $adminemail = $_SESSION['adminemail'];
    }
    else{
        echo "<script> location.herf='../index.php'</script>";
    }
    
    $adminemail = $_SESSION['adminemail'];
    if(isset($_REQUEST['adminpasswordupbtn'])){
        if(($_REQUEST['a_password']=="")){
            $passmsg = '<div class="alert alert-warning col-sm-6 ml-5mt-2" role="alert">Fill all fileds</div>';
        }
        else{
            $sql="SELECT * FROM admin where a_email='$adminemail' ";
            $result = $conn->query($sql);
            if($result->num_rows==1){
                $a_password = $_REQUEST['a_password'];
                $sql = "
                UPDATE `admin` SET `a_password`='$a_password' WHERE `a_email` ='$adminemail';";

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
                        <input type="email" name="adminemail" id="adminemail" class="from-control" value="<?php echo $adminemail ?> " readonnly>
                </div>
                <div class="form-group">
                    <label for="inputemail">Password</label><br>
                        <input type="password" name="a_password" id="a_password" class="from-control" placeholder="enter password">
                </div>
                <button type="submit" id="adminpasswordupbtn" name="adminpasswordupbtn" class="btn btn-danger mt-5">Submit</button>
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
    include('afooter.php');
?>