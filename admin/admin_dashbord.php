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
    $sql = "SELECT *FROM course";
    $result = $conn->query($sql);
    $tc=$result->num_rows;

    $sql = "SELECT *FROM student";
    $result = $conn->query($sql);
    $ts=$result->num_rows;

    $sql = "SELECT *FROM courseorder";
    $result = $conn->query($sql);
    $tso=$result->num_rows;

?>
            <div class="col-sm-9 mt-5">
                <div class="row mx-5 text-center">
                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-header">Courses</div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <?php echo $tc; ?>
                                </h4>
                                <a href="courses.php" class="btn text-white">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-header">Students</div>
                            <div class="card-body">
                                <h4 class="card-title">
                                <?php echo $ts; ?>                                    
                                </h4>
                                <a href="student.php" class="btn text-white">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                            <div class="card-header">Sold</div>
                            <div class="card-body">
                                <h4 class="card-title">
                                <?php echo $tso; ?>                                    
                                </h4>
                                <a href="sellreport.php" class="btn text-white">View</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-5 mt-5 text-center">
                    <p class="bg-dark text-white p-2">Course ordered</p>
                    <?php 
                    $sql = "SELECT * FROM courseorder";
                    $resule = $conn->query($sql);
                    if($result->num_rows>0){
                        echo'
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Order id</th>
                                <th scope="col">Course id</th>
                                <th scope="col">Student email</th>
                                <th scope="col">Order date</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>';
                        while($row=$result->fetch_assoc()){
                            echo'<tr>';
                            echo'<th scope="row">'.$row["order_id"].'</th>';
                            echo'<td>'.$row["c_id"].'</td>';
                            echo'<td>'.$row["s_email"].'</td>';
                            echo'<td>'.$row["order_date"].'</td>';
                            echo'<td>'.$row["amount"].'</td>';
                            echo'<td><form action="" method="POST" class="d-inline"><input type="hidden" name="id" value='.$row["co_id"].'><button type="submit" class="btn btn-danger" name="delete" value="delete">del</button></form></td>';
                            echo'</tr>';
                    }
                        echo '</tbody>';
                    echo '</table>';
                }
                if(isset($_REQUEST['delete'])){
                    $sql = "DELETE FROM courseorder WHERE co_id = {$_REQUEST['id']}";
                    if($conn->query($sql)==TRUE){
                        echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
                    }
                }?>
                </div>
            </div>
        </div>
    </div>

<?php 
    include('afooter.php');
?>