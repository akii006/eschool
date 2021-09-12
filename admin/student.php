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

    <div class="col-sm-9 mt-5">
        <p class="bg-dark text-white p-2">List of Students</p>
        <?php 
           $sql = "SELECT * FROM student"; 
           $result = $conn->query($sql);
           if($result->num_rows > 0){
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Studentid id</th>
                    <th scope="col">Name</th>
                    <th scope="col">emailid</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while($row = $result->fetch_assoc()){
                echo '<tr>';
                   echo '<th scope="row">'.$row['s_id'].'</th>';
                   echo '<td>'.$row['s_name'].'</td>';
                   echo '<td>'.$row['s_email'].'</td>';
                   echo '<td>';
                   echo '
                   <form action="editstudent.php" method="POST" class="d-inline">
                   <input type="hidden" name="id" value='.$row["s_id"].'>
                   <button type="submit" class="btn btn-info mr-3" name="view" value="view">Edit</button>
                   </form>

                   <form action="" method="POST" class="d-inline">
                   <input type="hidden" name="id" value='.$row["s_id"].'>
                    <button type="submit" class="btn btn-secondary" name="delete" value="delete">del</button>
                    </form>';
                    echo '</td>';
                    echo '</tr>';
             } ?>
            </tbody>
        </table>
        <?php } ?>
    </div>
    </div>

    <div>
        <a href="addstudent.php" class="btn btn-danger box">
            +
        </a>
    </div>
    </div>

    <?php
        if(isset($_REQUEST['delete'])){
            $sql = "DELETE FROM student WHERE s_id = {$_REQUEST['id']}";
            if($conn->query($sql) == TRUE)
            {
                echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
            }
            else{
                echo "unable to delete";
            }
        }
    ?>

<?php 
    include('afooter.php');
?>