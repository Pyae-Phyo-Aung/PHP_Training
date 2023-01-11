<?php

require_once "db_connect.php";
require_once "functions.php";

$titleError = "";
$commonError = "";
if (isset($_GET['message'])) {
  $successMessage = $_GET['message'];
} else {
  $successMessage = "";
}

?>
<?php require_once "header.php"; ?>
<section class="sec-list">
  <div class="l-inner">
    <div class="group clearfix">
      <a href="post_create.php" class="cmn-btn bg-primary create-btn">Create</a>
      <a href="graph/graph_yearly.php" class="cmn-btn bg-primary">Graph</a>
    </div>
    <?php
    if ($successMessage != "") {
      echo "<p class='messaage'>" . $successMessage . "</p>";
    }
    ?>
    <div class="card">
      <div class="card-header">
        Post List
      </div>
      <div class="card-body">
        <table class="table" id="table">
          <thead class="thead">
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Content</th>
              <th>Is Published</th>
              <th>Created Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="tbody">
            <?php
            $query = "SELECT * FROM posts";
            $select = mysqli_query($conn, $query);
            $count = mysqli_num_rows($select);
            for ($i = 0; $i < $count; $i++) {
              $row = mysqli_fetch_array($select);

              $id = $row['id'];
              $title = $row['title'];
              $content = $row['content'];

              if ($row['is_published'] == 0) {
                $isPulished = "Unpublished";
              } else {
                $isPulished = "Published";
              }
              $createdDate = $row['created_datetime'];
              $j = 1;
            ?>
              <tr>
                <td> <?php echo $id; ?></td>
                <td> <?php echo $title; ?></td>
                <td> <?php echo short($content); ?></td>
                <td> <?php echo $isPulished; ?></td>
                <td> <?php echo showDate($createdDate); ?></td>
                <td>
                  <a href='post_view.php?id=<?php echo $id; ?>' class='cmn-btn bg-success'>View</a>
                  <a href='post_edit.php?id=<?php echo $id; ?>' class='cmn-btn bg-info'>Edit</a>
                  <a href='post_delete.php?id=<?php echo $id; ?>' class='cmn-btn bg-danger' onclick='return confirm("Are you sure to delete?")'>Delete</a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
</body>

</html>
