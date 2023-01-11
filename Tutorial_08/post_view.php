<?php
require_once "db_connect.php";
require_once "functions.php";
$id = $_GET['id'];

$select = "SELECT * FROM posts WHERE id = '$id'";
$ret = mysqli_query($conn, $select);
$arr = mysqli_fetch_array($ret);

$id = $arr['id'];
$title = $arr['title'];
$content = $arr['content'];
if ($arr['is_published'] == 0) {
  $isPulished = "Unpublished";
} else {
  $isPulished = "Published";
}
$createdDate = $arr['created_datetime'];
$updatedDate = $arr['updated_datetime'];
?>
<?php require_once "header.php"; ?>
<div class="card">
  <div class="card-header">
    <h2 class="cmn-ttl">Post Detail</h2>
  </div>
  <div class="card-body">
    <h3 class="cmn-ttl">
      <?php echo $title; ?>
    </h3>
    <p class="date">
      <?php echo $isPulished . " at " . showDate($createdDate); ?>
    </p>
    <p class="content">
      <?php echo $content; ?>
    </p>
    <a href="index.php" class="cmn-btn bg-secondary">Back</a>
  </div>
</div>
</body>

</html>
