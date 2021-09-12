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

    if(isset($_REQUEST['c_update'])){
        if(($_REQUEST['c_id'] == '') || ($_REQUEST['c_name'] == '') || ($_REQUEST['c_desc'] == '') || ($_REQUEST['c_author'] == '') ||($_REQUEST['c_duration'] == '' ) || ($_REQUEST['c_price'] == '') || ($_REQUEST['c_ori_price'] == '')){
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill all fields</div>';
        }
        else{
            $c_id = $_REQUEST['c_id'];
            $c_name = $_REQUEST['c_name'];
            $c_desc = $_REQUEST['c_desc'];
            $c_author = $_REQUEST['c_author'];
            $c_duration = $_REQUEST['c_duration'];
            $c_price = $_REQUEST['c_price'];
            $c_ori_price = $_REQUEST['c_ori_price'];
            $c_img = '../image/courseimg/'.$_FILES['c_img']['name'];

            $sql = "UPDATE  course  SET c_id = '$c_id',
            c_name = '$c_name',c_desc = '$c_desc',c_author = '$c_author',c_duration = '$c_duration',c_price = '$c_price',c_ori_price = '$c_ori_price',c_id = '$c_id',c_img='$c_img'
            WHERE c_id = '$c_id' ";

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
        <h3 class="text-center">Update course</h3>

        <?php 
            if(isset($_REQUEST['view'])){
                $sql = "SELECT * FROM course WHERE c_id = {$_REQUEST['id']}";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
            }
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="c_id">Course id</label>
                <input type="text" name="c_id" id="c_id" class="form-control" value="<?php if(isset($row['c_id'])) {echo $row['c_id'];} ?>" readonly>
            </div>
            <div class="form-group">
                <label for="c_name">Course name</label>
                <input type="text" name="c_name" id="c_name" class="form-control" value="<?php if(isset($row['c_name'])) {echo $row['c_name'];} ?>">
            </div>
            <div class="form-group">
                <label for="c_desc">Course description</label>
                <textarea type="text" name="c_desc" id="c_desc" class="form-control" row=2><?php if(isset($row['c_desc'])){echo $row['c_desc'];} ?></textarea>
            </div>
            <div class="form-group">
                <label for="c_author">Author</label>
                <input type="text" name="c_author" id="c_author" class="form-control" value="<?php if(isset($row['c_author'])){echo $row['c_author'];} ?>">
            </div>
            <div class="form-group">
                <label for="c_duration">Course duration</label>
                <input type="text" name="c_duration" id="c_duration" class="form-control" value="<?php if(isset($row['c_duration'])){echo $row['c_duration'];} ?>">
            </div>
            <div class="form-group">
                <label for="c_ori_price">Course original price</label>
                <input type="text" name="c_ori_price" id="c_ori_price" class="form-control" value="<?php if(isset($row['c_ori_price'])){echo $row['c_ori_price'];} ?>">
            </div>
            <div class="form-group">
                <label for="c_price">Course selling price</label>
                <input type="text" name="c_price" id="c_price" class="form-control" value="<?php if(isset($row['c_price'])){echo $row['c_price'];} ?>">
            </div>
            <div class="form-group">
                <label for="c_img">Course Image</label>
                <img src="../image/courseimg/<?php if(isset($row['c_img'])){echo $row['c_img'];} ?>" class="img-thumbnail">
                <input type="file" name="c_img" id="c_img" class="form-control">
            </div>
            <div class="text-center mt-5">
                <button type="submit" class="btn btn-danger" id="c_update" name="c_update">Update</button>
                <a href="courses.php" class="btn btn-secondary">Close</a>
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