<?php include_once('../dbconnection.php');
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['is_login'])){
    $s_email = $_SESSION['semail'];
}
if(isset($s_email)){
    $sql = "SELECT s_img FROM student WHERE s_email='$s_email' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $s_img=$row['s_img'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="css/stustyle.css">
</head>
<body>
<nav class="navbar navbar-dark fixed-top p-0 flex-md-nowrap shadow" style="background-color: black;">
        <a href="studentprofile.php" class="navbar-brand col-sm-3 col-md-2 mr-0">ESchool</a>
    </nav>

    <div class="container-fluid mb-5" style="margin-top: 40px;">
        <div class="row">
            <nav class="col-sm-2 col-md-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-3">
                            <img src="<?php echo $s_img?>" alt="student img" class="img-thumbnail rounded-circle" style="width:200px; height:200px">
                        </li>
                        <li class="nav-item">
                            <a href="./studentprofile.php" class="nav-link">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="./mycourse.php" class="nav-link">My course</a>
                        </li>
                        <li class="nav-item">
                            <a href="./changepass.php" class="nav-link">Change password</a>
                        </li>
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-link">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>

</body>
</html>