<?php
require_once "db_connect.php";
require_once "functions.php";

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $delete = "DELETE FROM posts WHERE id = '$id'";
  $result = mysqli_query($conn, $delete);

  if (!$result) {
    header('location:index.php');
  } else {
    header('location:index.php?message=Post Successfully Delete.');
  }
} else {
  header('location:index.php?message=Post ID not found.');
}
