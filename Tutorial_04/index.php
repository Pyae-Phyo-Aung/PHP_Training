<?php
session_start();
if (!$_SESSION['username']) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template 4</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h1>
            <?php
            echo " Welcome to dashboard " . $_SESSION['username'];
            ?>
        </h1>
        <a href="logout.php">Logout</a>
    </div>
    <!--/.containet -->
</body>

</html>
