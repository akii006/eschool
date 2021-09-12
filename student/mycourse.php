<?php if(!isset($_SESSION)){
    session_start();
}
    include('./header.php');
    if(isset($_SESSION['is_login'])){
        $s_email = $_SESSION['semail'];
    }else{
        echo"<script> location.herf='../index.php';</script>";
    }
    ?>
    <div class="container mt-5 ml-4">
        <div class="row">
            <div class="jumbotron">
                <h4 class="text-center">All course</h4>
                <?php 
                if(isset ($s_email))
                { $sql = "SELECT co.order_id, c.c_id, c.c_name, c. c_duration, c.c_desc, c.c_img, c. c_author, c.c_ori_price, c.c_price FROM courseorder AS co JOIN course AS c ON c.c_id = co.c_id WHERE co.s_email = '$s_email'";
                 $result = $conn->query($sql);
                  if($result->num_rows > 0) 
                  { while($row= $result->fetch_assoc())
                  { ?> 
                  <div class="bg-light mb-3">
                   <h5 class="card-header"><?php echo $row['c_name']; ?></h5>
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="../image/courseimg/<?php echo $row['c_img']; ?>" class="card-img-top mt-4">
                        </div>
                        <div class="col-sm-6 mb-3">
                        
                            <div class="card-body">
                                <p class="card-title"><?php echo $row['c_desc'];?> </p>
                                <small class="card-text">Duration: <?php echo $row['c_duration'];?> </small><br>
                                <small class="card-text">Instructor: <?php echo $row['c_author'];?> </small><br>
                                <p class="card-text d-inline">Price: <small><del>&#8377 <?php echo $row['c_ori_price']?></del></small><span class="font-weight-bolder">
            <h5>  &#8377 <?php echo $row['c_price']?>
                                <a href="watchcourse.php?c_id=<?php echo$row['c_id']?>" class="btn btn-primary mt-5 float-right">Watch course</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                  }
                }
            }
                  ?>
                  <hr>
            </div>
        </div>
    </div>
        
<?php
    include('./footer.php');
?>