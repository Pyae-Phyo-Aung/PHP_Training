<?php
require_once "db_connect.php";
require_once "header.php";
session_start();
$email = $_GET['mail'];
$passwordError = "";
$cpasswordError = "";
$error = "";

if (isset($_POST['password-reset-btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passHash = password_hash($password, PASSWORD_DEFAULT);
    $confirmPassword = $_POST['confirm-password'];

    if (!$password && !$confirmPassword) {
        $passwordError = "Password require.";
        $cpasswordError = "Confirm password require.";
    } elseif (!$password) {
        $passwordError = "Password require.";
    } elseif (!$confirmPassword) {
        $cpasswordError = "Confirm password require.";
    } else {
        if ($password == $confirmPassword) {
            $sql = "UPDATE user SET password = '$passHash'WHERE email='$email'";
            $ret = mysqli_query($conn, $sql);
            if ($ret) {
                header("location:logout.php");
            }
        } else {
            $error = "<div class='alert alert-danger' role='alert'>
                        Password and Confirm Password not match.
                        </div>";
        }
    }
}
?>
<div class="container-fluid">
    <div class="row justify-content-md-center">
        <dic class="col-6 mt-3">
            <div class="card">
                <div class="card-header">
                    <h4>Reset Password</h4>
                </div>
                <div class="card-body">
                    <?php echo $error; ?>
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="">
                                Email
                            </label>
                            <input class="form-control" type="text" name="email" value="<?php echo $email; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">
                                New Password
                            </label>
                            <input class="form-control" type="password" name="password" placeholder="********">
                            <span class="text-danger"><?php echo $passwordError; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="">
                                Confirm Password
                            </label>
                            <input class="form-control" type="password" name="confirm-password" placeholder="********">
                            <span class="text-danger"><?php echo $cpasswordError; ?></span>
                        </div>
                        <div class="row text-right">
                            <div class="col-12">
                                <button name="password-reset-btn" class="btn btn-primary text-light">Confirm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </dic>
    </div>
</div>
