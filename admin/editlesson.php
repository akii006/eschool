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

    if(isset($_REQUEST['l_update'])){
        if(($_REQUEST['l_id'] == '') || ($_REQUEST['l_name'] == '') || ($_REQUEST['l_desc'] == '') || ($_REQUEST['c_id'] == '') ||($_REQUEST['c_name'] == '' )){
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill all fields</div>';
        }
        else{
            $l_id = $_REQUEST['l_id'];
            $l_name = $_REQUEST['l_name'];
            $l_desc = $_REQUEST['l_desc'];
            $c_id = $_REQUEST['c_id'];
            $c_name = $_REQUEST['c_name'];
            $l_link = '../lessonvideo/'.$_FILES['l_link']['name'];

            $sql = "UPDATE  lesson  SET l_id = '$l_id',
            l_name = '$l_name',l_desc = '$l_desc',c_id = '$c_id',c_name = '$c_name',l_link='$l_link'
            WHERE l_id = '$l_id' ";

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
        <h3 class="text-center">Update lesson</h3>

        <?php 
            if(isset($_REQUEST['view'])){
                $sql = "SELECT * FROM lesson WHERE l_id = {$_REQUEST['id']}";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
            }
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="l_id">Lesson id</label>
                <input type="text" name="l_id" id="l_id" class="form-control" value="<?php if(isset($row['l_id'])) {echo $row['l_id'];} ?>" readonly>
            </div>
            <div class="form-group">
                <label for="l_name">Lesson name</label>
                <input type="text" name="l_name" id="l_name" class="form-control" value="<?php if(isset($row['l_name'])) {echo $row['l_name'];} ?>">
            </div>
            <div class="form-group">
                <label for="l_desc">Lesson description</label>
                <textarea type="text" name="l_desc" id="l_desc" class="form-control" row=2><?php if(isset($row['l_desc'])){echo $row['l_desc'];} ?></textarea>
            </div>
            <div class="form-group">
                <label for="c_id">Course id</label>
                <input type="text" name="c_id" id="c_id" class="form-control" value="<?php if(isset($row['c_id'])){echo $row['c_id'];} ?>" readonly>
            </div>
            <div class="form-group">
                <label for="c_name">Course name</label>
                <input type="text" name="c_name" id="c_name" class="form-control" value="<?php if(isset($row['c_name'])){echo $row['c_name'];} ?>" readonly>
            </div>
            <div class="form-group">
                <label for="l_link">Lesson link</label>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="../lessonvideo/<?php if(isset($row['l_link'])){echo $row['l_link'];} ?>" allowfullscreen></iframe>
                </div>
                <input type="file" name="l_link" id="l_link" class="form-control-file">
            </div>
            <div class="text-center mt-5">
                <button type="submit" class="btn btn-danger" id="l_update" name="l_update">Update</button>
                <a href="lesson.php" class="btn btn-secondary">Close</a>
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