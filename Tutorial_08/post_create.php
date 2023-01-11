<?php

require_once "db_connect.php";
require_once "functions.php";

$titleError = "";
$commonError = "";
$successMessage = "";

if (isset($_POST['create-btn'])) {
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

    $sql = "INSERT INTO posts (title,content,is_published) VALUES ('$title','$content','$publish');";
    $ret = mysqli_query($conn, $sql);
    if ($ret) {
      header('location:index.php?message=New Post Successfully Add.');
    } else {
    }
  }
}
?>
<?php require_once "header.php"; ?>
<div class="l-inner">
  <div class="card">
    <div class="card-header">
      <h2 class="cmn-ttl">Create Post</h2>
    </div>
    <div class="card-body">
      <form action="#" method="post">
        <label for="title" class="lbl">Title</label>
        <input type="text" id="title" name="title" placeholder="Title" class="text-box">
        <p class="error-message"><?php echo $titleError; ?></p>
        <label for="content" class="lbl">Content</label>
        <textarea type="text" id="content" rows="5" name="content" placeholder="Content" class="text-box"></textarea>
        <input type="checkbox" id="publish" name="publish" class="check-box">
        <label for="publish" class="lblPublish">Publish</label><br>
        <div class="group clearfix">
          <a href="index.php" class="cmn-btn bg-secondary float-left">Back</a>
          <input type="submit" class="cmn-btn bg-primary float-right" name="create-btn" value="Create">
        </div>
      </form>
    </div>
  </div>
</div>
</body>

</html>
