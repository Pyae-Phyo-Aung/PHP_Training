<?php
session_start();
if (!empty($_SESSION['username'])) {
    header("location:index.php");
}
$nameError = $mailError = $passwordError = "";

if (isset($_POST['btnLogin'])) {
    $userName = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $oldUserName = $oldEmail = "";
    $_SESSION['old-username'] = $userName;
    $_SESSION['old-email'] = $email;
    $_SESSION['old-password'] = $password;

    if ($userName == "" && $email == "" && $password == "") {
        $nameError = "Please Enter User Name.";
        $mailError = "Please Enter Your Email.";
        $passwordError = "Please Enter Password.";
    } elseif ($userName == "") {
        $nameError = "Please Enter User Name.";

        $oldEmail = $_SESSION['old-email'];
    } elseif ($email == "" && $password == "") {
        $mailError = "Please Enter Your Email.";
        $passwordError = "Please Enter Password.";

        $oldUserName = $_SESSION['old-username'];
    } elseif ($userName == "" && $password == "") {
        $nameError = "Please Enter User Name.";
        $passwordError = "Please Enter Password.";

        $oldEmail = $_SESSION['old-email'];
    } elseif ($password == "") {
        $passwordError = "Please Enter Password.";

        $oldUserName = $_SESSION['old-username'];
        $oldEmail = $_SESSION['old-email'];
    } elseif ($email == "") {
        $mailError = "Please Enter Your Email.";

        $oldUserName = $_SESSION['old-username'];
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mailError = "Envalid Email Format.";

        $oldEmail = $_SESSION['old-email'];
        $oldUserName = $_SESSION['old-username'];
    } else {
        $_SESSION['username'] = $userName;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        echo "<script>window.location='index.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 4</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container clearfix">
        <div class="img-blk">
            <img src="img/img_coffee.webp" alt="">
        </div>
        <div class="form-blk">
            <h1>Login in here</h1>
            <form action="#" method="post">
                <input type="text" name="username" placeholder="User Name" value="<?php echo $oldUserName; ?>">
                <p><?php echo $nameError; ?></p>
                <br>
                <input type="text" name="email" placeholder="Email" value="<?php echo $oldEmail; ?>">
                <p><?php echo $mailError; ?></p>
                <br>
                <input type="password" name="password" placeholder="Password">
                <p><?php echo $passwordError; ?></p>
                <br>
                <button type="submit" name="btnLogin" class="btn-submit">Login</button>
            </form>
        </div>
    </div>
    <!--/.containet -->
</body>

</html>
