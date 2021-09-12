<?php
include('./nav.php');
include('./dbconnection.php');
?>
<!-- background photo -->
<div class="container-fluid remove-bg-marg">
  <div class="bg-parent">
    <div class="bg">
      <div class="pa"></div>
    </div>
    <div class="bg-over"></div>
  </div>
  <div class="bg-content">
    <h1 class="my-content">Welcome to ESchool</h1>
    <small class="my-content">learn and implement</small>
    <br>

    <?php
    if (!isset($_SESSION['is_login'])) {
      echo '
         <a href="#" class="btn btn-danger btn-lg my-content" data-bs-toggle="modal" data-bs-target="#exampleModal">Get start</a>';
    } else {
      echo '
         <a href="./student/studentprofile.php" class="btn btn-danger mt-3 ">Profile</a>';
    }
    ?>
  </div>
</div>

<!-- start text banner -->
<div class="container-fluid bg-danger txt-banner">
  <div class="row bottom-banner">
    <div class="col-sm">
      <h5>100+ Online Courses</h5>
    </div>
    <div class="col-sm">
      <h5>Expert Instructor</h5>
    </div>
    <div class="col-sm">
      <h5>lifetime</h5>
    </div>
    <div class="col-sm">
      <h5>Money back Gaurantee</h5>
    </div>
  </div>
</div>

<!-- course -->
<div class="container-fluid mt-5">
    <h1 class="text-center">Popular Course</h1>
    <div class="row mt-4">
    <?php 
    $sql = "SELECT * FROM course LIMIT 6";
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
          <div class="card-footer text-center d-inline">
            <p class="card-text d-inline">Price: <small><del>&#8377 '.$row['c_ori_price'].'</del></small><span class="font-weight-bolder"> <h5> &#8377 '.$row['c_price'].'
            </h5></span>
            </p>
            <a href="coursedetail.php?c_id='.$c_id.'" class="btn btn-primary text-white font-weight-bolder">Enroll</a>
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


  <div class="text-center m-2">
    <a href="courses.php" class="btn btn-danger btn-lg">View All Course</a>
  </div>
</div>

<!-- contact us -->
<?php
include('./contact.php');
?>
<!-- social media -->
<div class="container-fluid bg-danger txt-banner">
  <div class="row bottom-banner">
    <div class="col-sm">
      <a href="#" class="text-white social-hover">Facebook</a>
    </div>
    <div class="col-sm">
      <a href="#" class="text-white social-hover">Instagram</a>
    </div>
    <div class="col-sm">
      <a href="#" class="text-white social-hover">Twitter</a>
    </div>
    <div class="col-sm">
      <a href="#" class="text-white social-hover">Whatsapp</a>
    </div>
  </div>
</div>

<div class="container-fluid p-4" style="background-color: white;">
  <div class="container" style="background-color: whitesmoke;">
    <div class="row text-center">
      <div class="col-sm">
        <h5>About Us</h5>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit ullam hic fugiat quam aut sunt deleniti cumque mollitia ducimus iure.</p>
      </div>
      <div class="col-sm">
        <h5>Category</h5>
        <a href="" class="text-dark" style="text-decoration: none;">Web Development</a><br>
        <a href="" class="text-dark" style="text-decoration: none;">App Development</a><br>
        <a href="" class="text-dark" style="text-decoration: none;">Game Development</a><br>
        <a href="" class="text-dark" style="text-decoration: none;">Database Development</a><br>
      </div>
      <div class="col-sm">
        <h5>Contact US</h5>
        <p>E-mail id:eschool@gmail.com</p>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<!-- footer -->
<?php
include('./footer.php');
?>