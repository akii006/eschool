<?php if(!isset($_SESSION)){
    session_start();
}
    include('./header.php');
    if(isset($_SESSION['is_login'])){
        $s_email = $_SESSION['semail'];
    }else{
        echo"<script> location.herf='../index.php';</script>";
    }
    $sql = "SELECT * FROM student WHERE s_email = '$s_email'";
    $result = $conn->query($sql);
    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        $s_id = $row["s_id"];
        $s_name = $row["s_name"];
        $s_occ = $row["s_occ"];
        $s_img = $row["s_img"];
    }
    if(isset($_REQUEST['s_update'])){
        if($_REQUEST['s_name']==""){
            $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';

        }
        else{
            $s_name=$_REQUEST['s_name'];
            $s_occ=$_REQUEST['s_occ'];
            $s_img = $_FILES['s_img']['name'];
            $s_img_temp = $_FILES['s_img']['tmp_name'];
            $img_fold = './img/'.$s_img;
            move_uploaded_file($s_img_temp, $img_fold);

            $sql = "UPDATE student SET s_name= '$s_name', s_occ = '$s_occ',s_img = '$img_fold' WHERE s_email='$s_email'";
            if($conn->query($sql)==TRUE){
                $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> update successfully</div>';
            }else{
                $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">unable to upadte</div>';
            }
        }
    }
?>

<div class="col-sm-6 mt-5">
<form class="mx-5" action="" method="post" enctype="multipart/form-data">
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
                <input type="text" name="s_email" id="s_email" class="form-control" readonly value="<?php if(isset($row['s_email'])) {echo $row['s_email'];} ?>">
            </div>
            <div class="form-group">
                <label for="s_occ">Occuoation</label>
                <input type="text" name="s_occ" id="s_occ" class="form-control" value="<?php if(isset($row['s_occ'])) {echo $row['s_occ'];} ?>">
            </div>
            <div class="form-group">
                <label for="s_img">Upload img</label>
                <input type="file" name="s_img" id="s_img" class="form-control">
            </div>
            <div class="text-center mt-5">
                <button type="submit" class="btn btn-danger" id="s_update" name="s_update">Update</button>
            </div>
            <?php
                if(isset($passmsg))
                {
                echo $passmsg;
                }
            ?>
        </form>
    </div>
<?php
    
    include('./footer.php');
?>