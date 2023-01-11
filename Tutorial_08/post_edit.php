<?php

require_once "db_connect.php";
require_once "functions.php";

$id = $_GET['id'];
$titleError = "";
$successMessage = "";
//get old value
$select = "SELECT * FROM posts WHERE id = '$id'";
$result = mysqli_query($conn, $select);
$arr = mysqli_fetch_array($result);

$oldTitle = $arr['title'];
$oldContent = $arr['content'];
if ($arr['is_published'] == 0) {
  $oldPulished = "Unpublished";
} else {
  $oldPulished = "Published";
}
//update post 
if (isset($_POST['update-btn'])) {
  $title = $_POST['title'];
  $content = textFilter($_POST['content']);
  if (!$_POST['publish']) {
    $publish = "0";
  } else {
    $publish = "1";
  }

  if (!$title) {
    $titleError = "Title field require.";
  } else {
    $update = "UPDATE posts SET title = '$title', content = '$content', is_published = '$publish' WHERE id ='$id';";
    $result = mysqli_query($conn, $update);
    if (!$result) {
      header('location:index.php?message=Something Wrong in Updating Post');
    } else {
      header('location:index.php?message=Post Successfully Update.');
    }
  }
}
?>
<?php require_once "header.php"; ?>
<div class="card">
  <div class="card-header">
    <h2 class="cmn-ttl">Edit Post</h2>
  </div>
  <div class="card-body">
    <form action="#" method="post">
      <label for="title" class="lbl">Title</label>
      <input type="text" id="title" name="title" placeholder="Title" class="text-box" value="<?php echo $oldTitle; ?>">
      <p class="error-message"><?php echo $titleError; ?></p>
      <label for="content" class="lbl">Content</label>
      <textarea type="text" rows="5" id="content" name="content" placeholder="Content" class="text-box"><?php echo $oldContent; ?></textarea>
      <?php
      if ($oldPulished == "Published") {
      ?>
        <input type="checkbox" id="lbl-publish" name="publish" checked>
      <?php } else { ?>
        <input type="checkbox" id="lbl-publish" name="publish">
      <?php } ?>
      <label for="lbl-publish">Publish</label>
      <div class="group clearfix">
        <a href="index.php" class="cmn-btn bg-secondary float-left">Back</a>
        <input type="submit" class="cmn-btn bg-primary float-right" name="update-btn" value="Update">
      </div>
    </form>
  </div>
</div>

</body>

</html>
