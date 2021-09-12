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
    
    if(isset($_REQUEST['l_submit'])){
        if(($_REQUEST['l_name'] == '') || ($_REQUEST['l_desc'] == '') || ($_REQUEST['c_id'] == '') ||($_REQUEST['c_name'] == '' )){
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill all fields</div>';
        }
        else{
            $l_name = $_REQUEST['l_name'];
            $l_desc = $_REQUEST['l_desc'];
            $c_id = $_REQUEST['c_id'];
            $c_name = $_REQUEST['c_name'];
            $l_link = $_FILES['l_link']['name'];
            $l_link_temp = $_FILES['l_link']['tmp_name'];
            $link_folder = '../lessonvideo/'.$l_link;
            move_uploaded_file($l_link_temp, $link_folder);

            $sql = "INSERT INTO lesson (l_name,l_desc,l_link,c_id,c_name) VALUES ('$l_name','$l_desc','$l_link','$c_id','$c_name') ";

            if($conn -> query($sql) == TRUE){
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Lesson added succesfuliy</div>';
            }
            else{
                $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Unable to added</div>';
            }
         }
    }
?>

    <div class="col-sm-6 mt-5 mx-3 jumbotron">
        <h3 class="text-center">Add new Lesson</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="c_id">Course id</label>
                <input type="text" name="c_id" id="c_id" class="form-control" value="<?php if(isset($_SESSION['c_id'])){ echo $_SESSION['c_id'];} ?> " readonly>
            </div>
            <div class="form-group">
                <label for="c_name">Course name</label>
                <input type="text" name="c_name" id="c_name" class="form-control" value="<?php if(isset($_SESSION['c_name'])){ echo $_SESSION['c_name'];} ?> " readonly>
            </div>
            <div class="form-group">
                <label for="l_name">Lesson name</label>
                <input type="text" name="l_name" id="l_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="l_desc">Lesson description</label>
                <textarea type="text" name="l_desc" id="l_desc" class="form-control" row=2></textarea>
            </div>
            <div class="form-group">
                <label for="l_link">Lesson Video link</label>
                <input type="file" name="l_link" id="l_link" class="form-control-file">
            </div>
            <div class="text-center mt-5">
                <button type="submit" class="btn btn-danger" id="l_submit" name="l_submit">Submit</button>
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