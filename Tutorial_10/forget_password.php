<?php
session_start();
require_once "db_connect.php";
require_once "header.php";
require 'libary/includes/PHPMailer.php';
require 'libary/includes/SMTP.php';
require 'libary/includes/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;

$mailError = "";

if (isset($_POST['sendmail-btn'])) {
    $email = $_POST['email'];
    if (!$email) {
        $mailError = "Email require.";
    } else {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Port = "587";
        $mail->Username = "pyaephyoaung31999@gmail.com";
        $mail->Password = "ewrqvupjxsdnxklo";
        $mail->Subject = "Password Reset";
        $mail->setFrom('pyaephyoaung31999@gmail.com');
        $mail->isHTML(true);
        $mail->Body = "You Can chage your password. <a href='http://localhost/tutorial_10/reset_password.php?mail=$email'>Change password.</a>";
        $mail->addAddress($email);
        if ($mail->send()) {
            header("location:login.php?message=Check your email and reset your new password.");
        }
    }
}
?>
<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-6 mt-3">
            <div class="card">
                <div class="card-header">
                    <h4>Forget Password</h4>
                </div>
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="">
                                Email
                            </label>
                            <input class="form-control" type="email" name="email">
                            <span class="text-danger"><?php echo $mailError; ?></span>
                        </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-10 form-group text-left">
                            <a href="login.php">Login</a>
                        </div>
                        <div class="col-2 form-group">
                            <button name="sendmail-btn" class="btn btn-primary form-control">Send</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
