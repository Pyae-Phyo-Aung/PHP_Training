<?php
require_once "db_connect.php";

$nameError = "";
$mailError = "";
$phoneError = "";
$passwordError = "";
$addressError = "";

$oldName = "";
$oldMail = "";
$oldPhone = "";
$oldAddress = "";

if (isset($_POST['register-btn'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $passHash = password_hash($password, PASSWORD_DEFAULT);
  $address = $_POST['address'];

  $_SESSION['name'] = $name;
  $_SESSION['email'] = $email;
  $_SESSION['phone'] = $phone;
  $_SESSION['address'] = $address;

 
    $sql = "SELECT * FROM user WHERE email='$email'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
  if($row['email' == $email]){
    $mailError = "Email already exist.";
    $oldName =   $_SESSION['name'];
    $oldMail =   $_SESSION['email'];
    $oldPhone = $_SESSION['phone'];
    $oldAddress = $_SESSION['address'];
  }elseif (!$name && !$email && !$phone && !$password && !$address) {
    $nameError = "User name require.";
    $mailError = "Email require.";
    $phoneError = "Phone number require.";
    $passwordError = "Password require.";
    $addressError = "Address require.";
  } elseif (!$name) {
    $nameError = "User name require.";
    $oldMail =   $_SESSION['email'];
    $oldPhone = $_SESSION['phone'];
    $oldAddress = $_SESSION['address'];
  } elseif (!$email) {
    $mailError = "Email require.";
    $oldName =   $_SESSION['name'];
    $oldPhone = $_SESSION['phone'];
    $oldAddress = $_SESSION['address'];
  } elseif (!$phone) {
    $phoneError = "Phone number require.";
    $oldName =   $_SESSION['name'];
    $oldMail = $_SESSION['email'];
    $oldAddress = $_SESSION['address'];
  } elseif (!$password) {
    $passwordError = "Password require.";
    $oldName =   $_SESSION['name'];
    $oldMail = $_SESSION['email'];
    $oldPhone = $_SESSION['phone'];
    $oldAddress = $_SESSION['address'];
  } elseif (!$address) {
    $addressError = "Address require.";
    $oldName =   $_SESSION['name'];
    $oldMail = $_SESSION['email'];
    $oldPhone = $_SESSION['phone'];
  }else {
    $sql = "INSERT INTO user(name,email,phone,password,address,img) VALUES ('$name','$email','$phone','$passHash','$address','img/img_user.png')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      header("location:login.php");
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
  <title>Template 10 | Register</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="container-fluid">
    <div class="row  justify-content-md-center">
      <div class="col-4 mt-3">
        <div class="card">
          <div class="card-header">
            <h4>Register</h4>
          </div>
          <div class="card-body">
            <form action="#" method="post">
              <div class="form-group">
                <label for="">
                  User Name
                </label>
                <input class="form-control" type="text" name="name" placeholder="name" value="<?php echo $oldName; ?>">
                <span class="text-danger"><?php echo $nameError; ?></span>
              </div>
              <div class="form-group">
                <label for="">
                  Email
                </label>
                <input class="form-control" type="email" name="email" placeholder="name@example.com" value="<?php echo $oldMail; ?>">
                <span class="text-danger"><?php echo $mailError; ?></span>
              </div>
              <div class="form-group">
                <label for="">
                  Phone
                </label>
                <input class="form-control" min="11" type="text" name="phone" placeholder="09*********" value="<?php echo $oldPhone; ?>">
                <span class="text-danger"><?php echo $phoneError; ?></span>
              </div>
              <div class="form-group">
                <label for="">
                  Password
                </label>
                <input class="form-control" min="8" type="password" name="password" placeholder="password">
                <span class="text-danger"><?php echo $passwordError; ?></span>
              </div>
              <div class="form-group">
                <label for="">
                  Address
                </label>
                <input class="form-control" type="text" name="address" value="<?php echo $oldAddress; ?>">
                <span class="text-danger"><?php echo $addressError; ?></span>
              </div>
              <br>
              <div class="form-group">
                <button name="register-btn" class="btn btn-primary form-control">Register</button>
              </div>
              <div class="form-group text-center">
                <a href="login.php">Already have an account?</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
