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
?>

<div class="col-sm-9 mt-5 mx-3">
    <form action="" class="mt-3 form-inline d-print-none">
        <div class="form-group mr-3">
            <label for="checkid">Enter course id:</label>
            <input type="text" name="checkid" id="checkid" class="form-control ml-3">  
        </div>
        <button type="submit" class="btn btn-danger">Search</button>
    </form>

    <?php
        $sql = "SELECT c_id FROM course";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            if(isset($_REQUEST['checkid']) && $_REQUEST['checkid'] == $row['c_id']){
                $sql = "SELECT * FROM course WHERE c_id = {$_REQUEST['checkid']} ";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                if(($row['c_id']) == $_REQUEST['checkid']){
                    $_SESSION['c_id']= $row['c_id'];
                    $_SESSION['c_name']= $row['c_name'];
                    ?>
                    <h3 class="mt-5 bg-dark text-white p-2">Course id:<?php if(isset($row['c_id'])){ echo $row['c_id'];} ?> Course name:
                    <?php if(isset($row['c_name'])){ echo $row['c_name'];} ?>  </h3>
                    <?php

                    $sql = "SELECT * FROM lesson WHERE c_id = {$_REQUEST['checkid']}";
                    $result = $conn->query($sql);
                        echo '
                    <table class="table">
            <thead>
                <tr>
                    <th scope="col">Lesson id</th>
                    <th scope="col">Lesson Name</th>
                    <th scope="col">Lesson link</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>'; 
                while($row = $result->fetch_assoc()){
                echo '<tr>';
                   echo '<th scope="row">'.$row['l_id'].'</th>';
                   echo '<td>'.$row['l_name'].'</td>';
                   echo '<td>'.$row['l_link'].'</td>';
                   echo '<td>';
                   echo '
                   <form action="editlesson.php" method="POST" class="d-inline">
                   <input type="hidden" name="id" value='.$row["l_id"].'>
                   <button type="submit" class="btn btn-info mr-3" name="view" value="view">Edit</button>
                   </form>

                   <form action="" method="POST" class="d-inline">
                   <input type="hidden" name="id" value='.$row["l_id"].'>
                    <button type="submit" class="btn btn-secondary" name="delete" value="delete">del</button>
                    </form>';
                    echo '</td>';
                    echo '</tr>';
             } 
           echo '</tbody>
        </table>';
               }
            }
            if(isset($_REQUEST['delete'])){
                $sql = "DELETE FROM lesson WHERE l_id = {$_REQUEST['id']}";
                if($conn->query($sql) == TRUE)
                {
                    echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
                }
                else{
                    echo "unable to delete";
                }
            }
        }
    ?>
</div>

<?php
    if(isset($_SESSION['c_id'])){
        echo'
        <div>
            <a href="./addlesson.php" class="btn btn-danger box">ADD</a>
        </div>';
    }
?>

<?php 
    include('afooter.php');
?>