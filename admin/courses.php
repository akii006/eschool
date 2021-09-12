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
        <p class="bg-dark text-white p-2">List of Corses</p>
        <?php 
           $sql = "SELECT * FROM course"; 
           $result = $conn->query($sql);
           if($result->num_rows > 0){
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Course id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Author</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while($row = $result->fetch_assoc()){
                echo '<tr>';
                   echo '<th scope="row">'.$row['c_id'].'</th>';
                   echo '<td>'.$row['c_name'].'</td>';
                   echo '<td>'.$row['c_author'].'</td>';
                   echo '<td>';
                   echo '
                   <form action="editcourse.php" method="POST" class="d-inline">
                   <input type="hidden" name="id" value='.$row["c_id"].'>
                   <button type="submit" class="btn btn-info mr-3" name="view" value="view">Edit</button>
                   </form>

                   <form action="" method="POST" class="d-inline">
                   <input type="hidden" name="id" value='.$row["c_id"].'>
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
        <a href="addcourse.php" class="btn btn-danger box">
            +
        </a>
    </div>
    </div>

    <?php
        if(isset($_REQUEST['delete'])){
            $sql = "DELETE FROM course WHERE C_id = {$_REQUEST['id']}";
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