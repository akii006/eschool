<?php 
    if(!isset($_SESSION)){
        session_start();
    }
    include('header.php');
    include('../dbconnection.php');

    if(isset($_SESSION['is_alog'] )){
        $aemail = $_SESSION['adminemail'];
    }
    else{
        echo "<script> location.herf='../index.php'</script>";
    }
    
    if(isset($_REQUEST['s_submit'])){
        if(($_REQUEST['s_name'] == '') || ($_REQUEST['s_email'] == '') || ($_REQUEST['s_password'] == '') ||($_REQUEST['s_occ'] == '' )){
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill all fields</div>';
        }
        else{
            $s_name = $_REQUEST['s_name'];
            $s_email = $_REQUEST['s_email'];
            $s_password = $_REQUEST['s_password'];
            $s_occ = $_REQUEST['s_occ'];

            $sql = "INSERT INTO `student` (`s_name`,`s_email`,`s_password`,`s_occ`) VALUES ('$s_name','$s_email','$s_password','$s_occ')";

            if($conn -> query($sql) == TRUE){
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">student added succesfuliy</div>';
            }
            else{
                $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Unable to added</div>';
            }
         }
    }
?>

    <div class="col-sm-6 mt-5 mx-3 jumbotron">
        <h3 class="text-center">Add new student</h3>
        <form action="" method="post">
            <div class="form-group">
                <label for="s_name">Name</label>
                <input type="text" name="s_name" id="s_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="s_email">Email</label>
                <input type="text" name="s_email" id="s_email" class="form-control">
            </div>
            <div class="form-group">
                <label for="s_password">Password</label>
                <input type="password" name="s_password" id="s_password" class="form-control">
            </div>
            <div class="form-group">
                <label for="s_occ">Occuoation</label>
                <input type="text" name="s_occ" id="s_occ" class="form-control">
            </div>
            <div class="text-center mt-5">
                <button type="submit" class="btn btn-danger" id="s_submit" name="s_submit">Submit</button>
                <a href="student.php" class="btn btn-secondary">Close</a>
            </div>
            <?php
                if(isset($msg))
                {
                echo $msg;
                }
            ?>
        </form>
    </div>
</div>


<?php 
    include('afooter.php');
?>