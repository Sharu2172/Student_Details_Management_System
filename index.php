<?php
//Getting the database credentials
include("dbcon.php");
//Checking if database is avilable or not.
$check = 'CREATE DATABASE ' . $name;
if ($conn->query($check)) {
  echo '
    <form method="POST" id="form_id" action="sql_queries/"></form>
    <script type="text/javascript">
	  document.forms[\'form_id\'].submit();
    </script>
    ';
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <script src="assets/js/bootstrap1.min.js"></script>
  <script src="assets/dist/js/popper.min.js"></script>
  <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/dist/js/jquery-3.5.1.min.js"></script>
  <script src="assets/dist/js/bootstrap.min.js"></script>
  <script src="assets/js/cities.js"></script>
</head>

<body>
  <h2>
    <center><u>Student Data Management System</u></center>
  </h2>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item active " role="presentation">
      <a class="nav-link" data-toggle="tab" href="#student" role="tab" aria-controls="student" aria-selected="true">Student Login</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" data-toggle="tab" href="#admin" role="tab" aria-controls="admin" aria-selected="false">Admin Login</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false">About</a>
    </li>
  </ul>

  <div class="tab-content">

    <div class="tab-pane fade show active" id="student" role="tabpanel" aria-labelledby="student-tab">
      <center>
        <div>
          <form action="Student/extra/login.php" method="post" enctype='multipart/form-data'>
            <br><br><br>
            <h3><b><u>Student Login Page</u></b></h3>
            <br>
            <div class="form-group row">
              <label for="inputstud" class="col-sm-5 col-form-label"><b>Student USN : </b></label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="user" placeholder="Student Mail ID" id="inputstud" required>
              </div>
            </div>
            <br>
            <div class="form-group row">
              <label for="inputstudpass" class="col-sm-5 col-form-label"><b>Password : </b></label>
              <div class="col-sm-5">
                <input type="password" class="form-control" name="pass" id="inputstudpass" required>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-6">
                <button class="btn btn-primary" id="student" type="submit">Submit</button>
              </div>
              <div class="col-md-6">
                <button class="btn btn-secondary" id="Reset" type="reset">Clear</button>
              </div>
            </div>
          </form>
        </div>
      </center>
    </div>

    <div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin-tab">
      <center>
        <div>
          <form action="Admin/extra/login.php" method="post" enctype='multipart/form-data'>
            <br><br><br>
            <h3><b><u>Admin Login Page</u></b></h3>
            <br>
            <div class="form-group row">
              <label for="inputuser" class="col-sm-5 col-form-label"><b>Username :</b></label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="user" placeholder="Username" id="inputuser" required>
              </div>
            </div>
            <br>
            <div class="form-group row">
              <label for="inputpass" class="col-sm-5 col-form-label"><b>Password: </b></label>
              <div class="col-sm-5">
                <input type="password" class="form-control" name="passwd" id="inputpass" required>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-6">
                <button class="btn btn-primary" id="admin" type="submit">Submit</button>
              </div>
              <div class="col-md-6">
                <button class="btn btn-secondary" id="Reset" type="reset">Clear</button>
              </div>
            </div>
          </form>
        </div>
      </center>
    </div>

    <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
      <br><br><br>
      <center>
        <p>
          <?php
          function nl2br2($text)
          {
            return preg_replace("/\r\n|\n|\r/", "<br>", $text);
          }
          $str = file_get_contents("Readme.txt");
          echo nl2br2($str);
          ?>
        </p>
      </center>
    </div>

  </div>
</body>

</html>