<!-- File to add header style and function to multipe pages with preset navigation bar. -->
<?php
include('../../dbcon.php');
include('../../Session.php');
?>
<!doctype html>
<html lang="en">

<!-- Header tag to include all stylesheet and javascript files -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../extra/icon.png" type="image/x-icon">
  <meta name="description" content="">
  <meta name="author" content="D.Sharath">
  <meta name="generator" content="Hugo 0.79.0">
  <title>Student Management System</title>
  <!-- Bootstrap core CSS -->
  <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
  <script src="../../assets/js/bootstrap1.min.js"></script>
  <script src="../../assets/dist/js/popper.min.js"></script>
  <script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/dist/js/jquery-3.5.1.min.js"></script>
  <script src="../../assets/dist/js/bootstrap.min.js"></script>
  <script src="../../assets/js/cities.js"></script>
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    #td {
      vertical-align: middle;
      font-size: 16px;
    }

    .tp {
      background-color: transparent;
      border-radius: 8px;
      color: white;
    }
  </style>

</head>

<!-- Body tag to have navigation file and data structure. -->
<body onClose="sessionClose()">
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="../admin/"><?php echo $_SESSION['uname']; ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item active">
            <a class="btn nav-link" aria-current="page" href="../dashboard/">Home</a>
          </li>
            <li class="nav-item">
              <form action="../add-Student/" method="post">
                <button type="submit" class="btn nav-link">
                  Add Student
                </button>
              </form>
            </li>
            <li class="nav-item">
              <button type="button" class="btn nav-link" data-toggle="modal" data-target="#Logout">
                Logout
              </button>
            </li>
        </ul>
        <form class="d-flex" action="../search-student/index.php" method="POST">
          <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" name='trial' type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <br><br><br>