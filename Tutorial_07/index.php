<?php
session_start();
require "libary/vendor/autoload.php";

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

if (isset($_POST['generate-btn'])) {
  if (!file_exists("generate")) {
    mkdir("generate");
  }
  $siteLinkErro = "";
  $qrNameError = "";
  $oldSiteLink = "";
  $oldQRName = "";
  $result = "";
  $siteLink = $_POST['site_name'];
  $qrName = $_POST['qr_name'];

  $_SESSION['old-siteLink'] = $siteLink;
  $_SESSION['old-qrname'] = $qrName;

  if (!$siteLink && !$qrName) {
    $siteLinkError = "Site link field require.";
    $qrNameError = "QR Code name field require.";
  } elseif (!$siteLink) {
    $siteLinkError = "Site link field require.";
    $oldQRName = $_SESSION['old-qrname'];
  } elseif (!$qrName) {
    $qrNameError = "QR Code name field require.";
    $oldSiteLink = $_SESSION['old-siteLink'];
  } else {
    if (file_exists("generate/" . $qrName . ".png")) {
      $oldQRName = $_SESSION['old-qrname'];
      $oldSiteLink = $_SESSION['old-siteLink'];
      $qrNameError = "QR Code already exist.";
    } else {
      $qr = QrCode::create($siteLink);
      $writer = new PngWriter();
      $writer->write($qr)->saveToFile("generate/" . $qrName . ".png");
      $result = $qrName;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial 7</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="container clearfix">
    <div class="form-blk">
      <form action="#" method="POST" class="upload-form">
        <h1>Create QR Code Here</h1>
        <input type="text" name="site_name" placeholder="Site Link" class="text-box" value="<?php echo $oldSiteLink ?? ""; ?>">
        <p class="cmn-error"><?php echo $siteLinkError; ?></p>
        <input type="text" name="qr_name" placeholder="QR Name" class="text-box" value="<?php echo $oldQRName ?? ""; ?>">
        <p class="cmn-error"><?php echo $qrNameError; ?></p>
        <input type="submit" name="generate-btn" value="Generate" class="generate-btn">
      </form>
    </div>
    <div class="resut-qrcode">
      <?php
      if ($result != "") {
        echo "<h2 class='sub-ttl'>Your QR Code</h2>";
        echo "<img src='generate/" . $result . ".PNG' alt='QR Code' class='image' >";
      } else {
        echo "<h2 class='sub-ttl'>No QR Code</h2>";
      }
      ?>
    </div>
  </div>
</body>

</html>
