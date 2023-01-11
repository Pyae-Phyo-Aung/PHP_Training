<?php
$id = $_GET['id'];
echo $id;
if (unlink($id)) {
  echo "<script>window.location='index.php'</script>";
}

