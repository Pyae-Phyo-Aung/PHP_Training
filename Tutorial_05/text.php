<?php
session_start();
if (!$_SESSION['username']) {
  header("location:login.php");
}
include_once "header.php";
?>
<section class="sec-text">
  <div class="l-inner">
    <h1>Text File data</h1>
    <?php
    $filename = "files/test.txt";
    $file = fopen($filename, "r");
    if ($file == false) {
      echo "Something wrong";
    }
    $filesize = filesize($filename);
    $filetext = fread($file, $filesize);
    echo '<pre class="text-blk">' . $filetext . '</pre>';
    ?>
  </div>
</section>
<!--/.sec-text -->
</body>

</html>
