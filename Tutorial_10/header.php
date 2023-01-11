<?php
require_once "db_connect.php";
session_start();
$userID = $_SESSION['user']['id'];
$sql = "SELECT * FROM user WHERE id='$userID'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

$oldImg = $row['img'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial 10</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-light bg-light justify-content-between">
    <a class="navbar-brand" href="index.php">Home</a>
    <ul class="nav justify-content-end">
      <?php
      if ($_SESSION['user']['id']) {
        echo "<li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
                  <img width='35px' height='35px' class='rounded-circle' src=" . $oldImg . " alt='Profile'>
                </a>
                <div class='dropdown-menu'>
                  <a class='dropdown-item' href='profile.php'>Profile</a>
                  <a class='dropdown-item' href='logout.php'>Logout</a>
                </div>
              </li>";
      } else {
        echo "<li class='nav-item'>
                <a class='btn btn-primary mr-3' href='login.php'>Login</a>
              </li>
              <li class='nav-item'>
                <a class='btn btn-primary' href='register.php'>Register</a>
              </li>";
      }
      ?>
    </ul>
  </nav>
  