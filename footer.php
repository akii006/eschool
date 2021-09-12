<footer class="container-fluid bg-dark text-center p-2">
    <small class="text-white">Copyright &copy; 2021 || Designed By E-learning || <a href="#login" data-bs-toggle="modal" data-bs-target="#aLoginModal"> Admin Login</a></small>
  </footer>

  <!-- registration -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Student Signup</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
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
        </div>
        <div class="modal-footer">
        <span id="sms"></span>
          <button type="button" class="btn btn-primary" onclick="addStu()" id="ssign">Signup</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <!-- login -->

  <div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="LoginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Student Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="sl">
            <div class="row mb-3">
              <label for="slemail" class="pl-2 font-weight-bold">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="slemail">
              </div>
            </div>
            <div class="row mb-3">
              <label for="slpassword" class="pl-2 font-weight-bold">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="slpassword">
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
        <small id="slms"></small>
          <button type="button" onclick="checklog()" class="btn btn-primary" id="slsubmit">Login</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- admin login -->

  <div class="modal fade" id="aLoginModal" tabindex="-1" aria-labelledby="aLoginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Admin Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="al">
            <div class="row mb-3">
              <label for="alemail" class="pl-2 font-weight-bold">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="alemail">
              </div>
            </div>
            <div class="row mb-3">
              <label for="alpassword" class="pl-2 font-weight-bold">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="alpassword">
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
        <small id="alms"></small>
          <button type="button" class="btn btn-primary" id="alsubmit" onclick="alog()">Login</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="js/ajaxrequest.js"></script>
  <script type="text/javascript" src="js/adminajax.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>

</html>