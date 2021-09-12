<?php
include('./nav.php');
include('./dbconnection.php');
?>

<div class="container-fluid bg-dark">
    <div class="row">
        <img src="https://specials-images.forbesimg.com/imageserve/5ed251d884e582000745fafc/960x0.jpg?fit=scale" alt="" style="height: 100vh;background-size: cover; width:100%;box-shadow:10px;
    background-attachment: fixed;" />
    </div>
</div>

<div class="container mt-5">
    <?php
    if (isset($_GET['c_id'])) {
        $c_id = $_GET['c_id'];
        $_SESSION['c_id'] = $c_id;
        $sql = "SELECT * FROM course WHERE c_id = '$c_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>
    <div class="row">
        <div class="col-md-4">
            <img src="image/courseimg/<?php echo $row['c_img'] ?>" alt="" class="card-img-top" />
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">
                    Course Name:<?php echo $row['c_name'] ?>
                </h5>
                <p class="card-text">Description: <?php echo $row['c_desc'] ?></p>
                <p class="card-text">Duration : <?php echo $row['c_duration'] ?></p>
                <form action="checkout.php" method="post">
                    <p class="card-text d-inline">price : <small><del>&#8377 <?php echo $row['c_ori_price'] ?></del></small><span class="font-weight-bolder">
                            <h5>&#8377 <?php echo $row['c_price'] ?></h5>
                        </span></p>
                        <input type="hidden" name="id" value="$row['c_price'] ">
                    <button type="submit" class="btn btn-primary text-white font-weight-bolder float-right" name="buy">Buy now</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Lesson no.</th>
                    <th scope="col">Lesson name</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $sql = 'SELECT * FROM lesson';
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                $num=0;
            while ($row = $result->fetch_assoc()) {
                if($c_id == $row['c_id']){
                    $num++;
                echo'<tr>
                <th scope="row">'.$num.'</th>
                <td>'.$row['l_name'].'</td>
            </tr>';
                }
            }
        }
            ?>  </tbody>
            </table>
    </div>
</div>


<?php
include('./footer.php');
?>