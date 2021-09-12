<?php
include('./nav.php');
include('./dbconnection.php');
?>

<div class="container-fluid bg-dark">
    <div class="row">
        <img src="https://specials-images.forbesimg.com/imageserve/5ed251d884e582000745fafc/960x0.jpg?fit=scale" alt="" style="height: 100vh;background-size: cover; width:100%; padding:50px" />
    </div>
</div>

<div class="container-fluid mt-5">
    <h1 class="text-center">All Course</h1>
    <div class="row mt-4">
    <?php 
    $sql = "SELECT * FROM course";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
      while($row = $result -> fetch_assoc()){
        $c_id = $row['c_id'];
        echo'
        <div class="col-md-4 mb-4>
        <a href="coursedetail.php?c_id='.$c_id.'" class="btn" style="text-align: left; padding:0px; margin:0px; ">
        <div class="card">
          <img src="image/courseimg/'.$row['c_img'].'" class="card-img-top" alt="..." />
          <div class="card-body">
            <h5 class="card title">'.$row['c_name'].'</h5>
            <p class="card-text">'.$row['c_desc'].'</p>
          </div>
          <div class="card-footer text-center">
            <p class="card-text d-inline">Price: <small><del>&#8377 '.$row['c_ori_price'].'</del></small><span class="font-weight-bolder">
            <h5>  &#8377 '.$row['c_price'].'
            </h5></span>
            </p>
            <a href="coursedetail.php?c_id='.$c_id.'" class="btn btn-primary text-white font-weight-bolder float-right">Enroll</a>
          </div>
        </div>
      </a>
      </div>
        ';
      }
    }
  ?>    
</div>
</div>


<?php
include('./contact.php');
?>

<?php
include('./footer.php');
?>