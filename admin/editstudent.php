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

    if(isset($_REQUEST['s_update'])){
        if(($_REQUEST['s_name'] == '') || ($_REQUEST['s_email'] == '') || ($_REQUEST['s_password'] == '') ||($_REQUEST['s_occ'] == '' )){
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill all fields</div>';
        }
        else{
            $s_id = $_REQUEST['s_id'];
            $s_name = $_REQUEST['s_name'];
            $s_email = $_REQUEST['s_email'];
            $s_password = $_REQUEST['s_password'];
            $s_occ = $_REQUEST['s_occ'];

            $sql = "UPDATE  student  SET s_id = '$s_id',
            s_name = '$s_name',s_email = '$s_email',s_password = '$s_password',s_occ = '$s_occ'
            WHERE s_id = '$s_id' ";

            if($conn -> query($sql) == TRUE){
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated succesfuliy</div>';
            }
            else{
                $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Unable to update</div>';
            }
         }
    }
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
        <h3 class="text-center">Update student</h3>

        <?php 
            if(isset($_REQUEST['view'])){
                $sql = "SELECT * FROM student WHERE s_id = {$_REQUEST['id']}";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
            }
        ?>

<form action="" method="post">
            <div class="form-group">
                <label for="s_id">Id</label>
                <input type="text" name="s_id" id="s_id" class="form-control" readonly value="<?php if(isset($row['s_id'])) {echo $row['s_id'];} ?>">
            </div>
            <div class="form-group">
                <label for="s_name">Name</label>
                <input type="text" name="s_name" id="s_name" class="form-control" value="<?php if(isset($row['s_name'])) {echo $row['s_name'];} ?>">
            </div>
            <div class="form-group">
                <label for="s_email">Email</label>
                <input type="text" name="s_email" id="s_email" class="form-control" value="<?php if(isset($row['s_email'])) {echo $row['s_email'];} ?>">
            </div>
            <div class="form-group">
                <label for="s_password">Password</label>
                <input type="password" name="s_password" id="s_password" class="form-control" value="<?php if(isset($row['s_password'])) {echo $row['s_password'];} ?>">
            </div>
            <div class="form-group">
                <label for="s_occ">Occuoation</label>
                <input type="text" name="s_occ" id="s_occ" class="form-control" value="<?php if(isset($row['s_occ'])) {echo $row['s_occ'];} ?>">
            </div>
            <div class="text-center mt-5">
                <button type="submit" class="btn btn-danger" id="s_update" name="s_update">Update</button>
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
</div>

<?php 
    include('afooter.php');
?>