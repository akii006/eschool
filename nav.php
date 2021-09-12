<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ELearn</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <!-- start navigation -->

  <nav class="navbar navbar-expand-lg navbar-light bg-dark pl-5 fixed-top">
    <div class="container">
      <a class="navbar-brand logo" href="index.php">E<span> School</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav coustom-nav pl-5 mx-auto">
          <li class="nav-item">
            <a class="nav-link coustom-nav-item" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link coustom-nav-item" href="courses.php">Courses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link coustom-nav-item" href="payment.php">PaymentStatus</a>
          </li>
          <?php
            session_start();
            if(isset($_SESSION['is_login'])){
              echo'          
          <li class="nav-item">
          <a class="nav-link coustom-nav-item" href="./student/studentprofile.php">MyProfile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link coustom-nav-item" href="logout.php">Logout</a>
        </li>';
            }
            else{
              echo'<li class="nav-item">
              <a class="nav-link coustom-nav-item" href="#" data-bs-toggle="modal" data-bs-target="#LoginModal">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link coustom-nav-item" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">Signup</a>
            </li>
            ';
            }
          ?>
          <li class="nav-item">
            <a class="nav-link coustom-nav-item" href="#contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
