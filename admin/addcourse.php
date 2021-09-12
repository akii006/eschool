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
    
    if(isset($_REQUEST['c_submit'])){
        if(($_REQUEST['c_name'] == '') || ($_REQUEST['c_desc'] == '') || ($_REQUEST['c_author'] == '') ||($_REQUEST['c_duration'] == '' ) || ($_REQUEST['c_price'] == '') || ($_REQUEST['c_ori_price'] == '')){
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill all fields</div>';
        }
        else{
            $c_name = $_REQUEST['c_name'];
            $c_desc = $_REQUEST['c_desc'];
            $c_author = $_REQUEST['c_author'];
            $c_duration = $_REQUEST['c_duration'];
            $c_price = $_REQUEST['c_price'];
            $c_ori_price = $_REQUEST['c_ori_price'];
            $c_img = $_FILES['c_img']['name'];
            $c_img_temp = $_FILES['c_img']['tmp_name'];
            $img_fold = '../image/courseimg/'.$c_img;
            move_uploaded_file($c_img_temp, $img_fold);

            $sql = "INSERT INTO course (c_name,c_desc,c_author,c_img,c_duration,c_price,c_ori_price) VALUES ('$c_name','$c_desc','$c_author','$c_img','$c_duration','$c_price','$c_ori_price') ";

            if($conn -> query($sql) == TRUE){
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Course added succesfuliy</div>';
            }
            else{
                $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Unable to added</div>';
            }
         }
    }
?>

    <div class="col-sm-6 mt-5 mx-3 jumbotron">
        <h3 class="text-center">Add new course</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="c_name">Course name</label>
                <input type="text" name="c_name" id="c_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="c_desc">Course description</label>
                <textarea type="text" name="c_desc" id="c_desc" class="form-control" row=2></textarea>
            </div>
            <div class="form-group">
                <label for="c_author">Author</label>
                <input type="text" name="c_author" id="c_author" class="form-control">
            </div>
            <div class="form-group">
                <label for="c_duration">Course duration</label>
                <input type="text" name="c_duration" id="c_duration" class="form-control">
            </div>
            <div class="form-group">
                <label for="c_ori_price">Course original price</label>
                <input type="text" name="c_ori_price" id="c_ori_price" class="form-control">
            </div>
            <div class="form-group">
                <label for="c_price">Course selling price</label>
                <input type="text" name="c_price" id="c_price" class="form-control">
            </div>
            <div class="form-group">
                <label for="c_img">Course Image</label>
                <input type="file" name="c_img" id="c_img" class="form-control">
            </div>
            <div class="text-center mt-5">
                <button type="submit" class="btn btn-danger" id="c_submit" name="c_submit">Submit</button>
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