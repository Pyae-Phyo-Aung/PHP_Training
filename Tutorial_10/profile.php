<?php
require_once "db_connect.php";
require_once "header.php";
session_start();
if(!$_SESSION['user']['id']){
    header('location:index.php');
}

$userID = $_SESSION['user']['id'];

$sql = "SELECT * FROM user WHERE id='$userID'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

$oldName = $row['name'];
$oldMail = $row['email'];
$oldImg = $row['img'];

if (isset($_POST['update-btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $fileName = $_FILES['profile'];

    if ($_FILES['profile']['name'] == "") {
        $sql = "UPDATE user SET name = '$name', email='$email' WHERE id='$userID'";
        $ret = mysqli_query($conn, $sql);
        if ($ret) {
            header('location:profile.php');
        }
    } else {
        $source_dir = "img/";
        $file_path = $source_dir . $fileName['name'];
        move_uploaded_file($fileName['tmp_name'], $file_path);

        $sql = "UPDATE user SET name = '$name', email='$email', img='$file_path' WHERE id='$userID'";
        $ret = mysqli_query($conn, $sql);
        if ($ret) {
            header('location:profile.php');
        }
    }
}
?>
<div class="container">
    <div class="row  justify-content-md-center">
        <div class="col-6 mt-3">
            <div class="card">
                <div class="card-header">
                    <h4>My Profile Setting</h4>
                </div>
                <div class="card-body">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <img width="100px" height="100px" class='rounded-circle' src="<?php echo $oldImg; ?>" alt="Profile">
                            <input type="file" name="profile" class="btn btn-outline-success">
                        </div>
                        <div class="form-group">
                            <label for="">
                                Name
                            </label>
                            <input class="form-control" type="text" name="name" value="<?php echo $oldName ?>">
                        </div>
                        <div class="form-group">
                            <label for="">
                                Email
                            </label>
                            <input class="form-control" type="email" name="email" value="<?php echo $oldMail ?>">
                        </div>
                        <div class="row text-right">
                            <div class="col-12">
                                <button type="submit" name="update-btn" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
