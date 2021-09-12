<?php
    include('./dbconnection.php');
    include('./nav.php');

?>

<div class="container-fluid bg-dark">
    <div class="row">
        <img src="https://image.freepik.com/free-vector/business-training-event_81522-1551.jpg" alt="" style="height: 100vh;background-size: cover; width:100%; padding:50px" /> 
    </div>
</div>

<div class="container jumbotron mt-5" style="background-color: grey;">
    <div class="row">
        <div class="col-md-4">
            <h5 class="mb-3">If already registerd !! login</h5>
            <form role="form" id="sl">
                <div class="form-group">
                    <label for="slemail" class="pl-2 font-weight-bold">Email</label>
                    <small id="statuslogemail"></small>
                    <input type="email" name="semail" id="slemail" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="slpassword" class="pl-2 font-weight-bold">Password</label>
                    <input type="password" name="slpassword" id="slpassword" class="form-control" placeholder="Password">
                </div>
                <button type="button" class="btn btn-primary mt-3" id="slsubmit" onclick="checklog()">Login</button>
            </form><br/>
            <small id="slms"></small>
            <hr>
        </div>
        <div class="col-md-6 offset-md-1">
            <h5 class="mb-3">New user !! signup</h5>
            <form id="s">
            <div class="row mb-3">
              <label for="sname" class="pl-2 font-weight-bold">Name</label><small id="status1"></small>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="sname">
              </div>
            </div>
            <div class="row mb-3">
              <label for="semail" class="pl-2 font-weight-bold">Email</label><small id="status2"></small>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="semail">
              </div>
            </div>
            <div class="row mb-3">
              <label for="spassword" class="pl-2 font-weight-bold">Password</label><small id="status3"></small>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="spassword">
              </div>
            </div>
          </form>
          <button type="button" class="btn btn-primary mb-2" onclick="addStu()" id="ssign">Signup</button>
            <small id="sms"></small>
        </div>
    </div>
</div>
<hr>
<?php
    include('./contact.php');
?>


<?php
    include('./footer.php');
?>