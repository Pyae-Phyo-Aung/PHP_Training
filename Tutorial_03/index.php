<?php
$error = "";
$result = "";
if (isset($_POST['btnSubmit'])) {
    $error = "";
    $result = "";
    $dob = $_POST['dob'];
    if (!empty($dob)) {
        $bday = new DateTime($dob);
        $today = new DateTime(date('m/d/y'));
        if ($bday >= $today) {
            $result = "Your are not born yet.";
        } else {
            $diff = $today->diff($bday);
            $result = "Your are $diff->y years, $diff->m months and $diff->d days old now.";
        }
    } else {
        $error = "Date filed require.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 3</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container clearfix">
        <div class="img-blk">
            <img src="img/img_bg.jpg" alt="">
        </div>
        <div class="form-blk">
            <h1>Calculate Your Age</h1>
            <form action="#" method="post" name="AgeCalculatorFrom">
                <input type="date" name="dob">
                <p><?php echo "$error"; ?></p>
                <br>
                <button type="submit" name="btnSubmit" class="btn-submit">Calculate</button>
            </form>
            <p class="result-txt">
                <?php echo $result; ?>
            </p>
        </div>
    </div>
    <!--/.container -->
</body>

</html>
