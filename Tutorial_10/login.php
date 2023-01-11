<?php
require_once "db_connect.php";
?>
<?php
if (!$_GET['message']) {
    $message = "";
} else {
    $mailMessage = $_GET['message'];
    $message = "<div class='alert alert-success' role='alert'>" . $mailMessage . "</div>";
}
$mailError = "";
$passwordError = "";
$oldMail = "";
$loginError = "";
if (isset($_POST['login-btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $_SESSION['old-email'] = $email;
    if (!$email && !$password) {
        $mailError = "Email require.";
        $passwordError = "Password require.";
    } elseif (!$email) {
        $mailError = "Email require.";
    } elseif (!$password) {
        $oldMail = $_SESSION['old-email'];
        $passwordError = "Password require.";
    } else {
        $sql = "SELECT * FROM user WHERE email='$email'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);
        if (!$row) {
            $loginError = "<div class='alert alert-danger' role='alert'>
                                Incorrect email or password.
                            </div>";
        } else {
            if (!password_verify($password, $row['password'])) {
                $loginError = "<div class='alert alert-danger' role='alert'>
                                    Incorrect email or password.
                                </div>";
            } else {
                session_start();
                $_SESSION['user'] = $row;
                header("location:index.php");
            }
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
    <title>Template 10 | Login</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row  justify-content-md-center">
            <div class="col-4 mt-5">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <?php echo $loginError; ?>
                        <?php echo $message; ?>
                        <form action="#" method="post">
                            <div class="form-group">
                                <label for="">
                                    <i class="text-primary fas fa-columns"></i>
                                    Email
                                </label>
                                <input class="form-control" type="email" name="email" placeholder="name@example.com" value="<?php echo $oldMail ?? ''; ?>">
                                <span class="text-danger"><?php echo $mailError; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">
                                    <i class="text-primary fas fa-key"></i>
                                    Password
                                </label>
                                <input class="form-control" type="password" name="password" placeholder="password">
                                <span class="text-danger"><?php echo $passwordError; ?></span>
                                <a href="forget_password.php">Forget Password?</a>
                            </div>
                            <br>
                            <div class="form-group">
                                <button name="login-btn" class="btn btn-primary form-control">Login</button>
                            </div>
                            <div class="form-group text-center">
                                <p>Not a member?<a href="register.php">Sign Up</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
