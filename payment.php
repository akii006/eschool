<?php
include('./nav.php');
?>

<div class="container-fluid bg-dark">
    <div class="row">
        <img src="https://specials-images.forbesimg.com/imageserve/5ed251d884e582000745fafc/960x0.jpg?fit=scale" alt="" style="height: 600px;background-size: cover; width:100%;box-shadow:10px;
    background-attachment: fixed;" />
    </div>
</div>

    <div class="container">
        <h2 class="text-center my-4">Payment Status</h2>
        <form action="" method="post">
            <div class="form-group row">
                <label class="offset-sm-3 col-fform-lable">Order ID:</label>
                <div>
                    <input type="text" class="form-control mx-3">
                </div>
                <div>
                    <input type="submit" class="btm btn-primary mx-4" value="view">
                </div>
            </div>
        </form>
    </div>

<?php
include('./contact.php');
?>

<?php
include('./footer.php');
?>