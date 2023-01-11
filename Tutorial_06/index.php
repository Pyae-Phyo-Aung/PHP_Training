<?php
session_start();
$folderError = "";
$errorFile = "";
$errorFolder = "";
$successMessage = "";
if (isset($_POST['submit-btn'])) {
    if (!file_exists("images")) {
        mkdir("images");
    }
    $folderName = $_POST['folder_name'];
    $fileName = $_FILES['file_name'];
    $file = $_FILES['file_name']['name'];
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    $_SESSION['old_folder_name'] = $folderName;

    if ($fileName['name'] == "" && $folderName == "") {
        $errorFile = '<p class="cmn-error"> File Name Field Require. </p>';
        $errorFolder = '<p class="cmn-error"> Folder Name Field Require. </p>';
    } elseif ($fileName['name'] == "") {
        $oldFolderName = $_SESSION['old_folder_name'];
        $errorFile = '<p class="cmn-error"> File Name Field Require. </p>';
    } elseif ($ext !== "jpg") {
        $oldFolderName = $_SESSION['old_folder_name'];
        $errorFile = '<p class="cmn-error"> Only JPG image allow. </p>';
    } elseif ($folderName == "") {
        $errorFolder = '<p class="cmn-error"> Folder Name Field Require. </p>';
    } else {
        if (!file_exists('images/' . $folderName)) {
            if (mkdir("images/" . $folderName)) {
                $successMessage = ' <p class="success"> New Folder successfully created.  </p>';
                $source_dir = "images/" . $folderName . "/";
                $file_path = $source_dir . $fileName['name'];
                move_uploaded_file($fileName['tmp_name'], $file_path);
            }
        } else {
            $folderError = '<p class="error"> Folder name ' . $folderName . ' is already exist. </p>';
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
    <title>Tutorial 6</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <form action="#" method="POST" enctype="multipart/form-data" class="upload-form">
            <h1>Create folder and upload your image</h1>
            <?php echo $successMessage; ?>
            <?php echo $folderError; ?>
            <label for="folder_name">Folder Name</label>
            <input type="text" id="folder_name" name="folder_name" class="text-box" value="<?php echo $oldFolderName ?? ''; ?>">
            <?php echo $errorFolder; ?>
            <label for="file_name">Upload Image</label>
            <input type="file" id="file_name" name="file_name" class="text-box">
            <?php echo $errorFile; ?>
            <input type="submit" id="submit-btn" name="submit-btn" class="cmn-btn" value="Submit">
        </form>
        <div class="gallery" style="width: 80%; margin: 20px auto;">

            <?php
            $dir_name = "images/";
            $images = glob($dir_name . "*");
            echo '<h2 class="sub-ttl" style="padding: 30px 0; text-align:center;">Your Uploaded Images</h2>';
            echo "<table>";
            foreach ($images as $image) {
                $folder_name = $image . '/';
                $photos = glob($folder_name . "*");

                foreach ($photos as $photo) {
                    echo "<tr>";
                    echo "<td>";
                    echo '<img class="images" src="' . $photo . '" alt="">';
                    echo "</td>";
                    echo "<td>";
            ?>
                    <a class='cmn-btn' href='delete.php?id=<?php echo $photo ?>' onclick="return confirm('Are you sure to delete?')">Delete</a>
            <?php
                    echo "</td>";
                    echo "<tr>";
                }
            }
            echo "</table>";
            ?>
        </div>
    </div>
    <!--/.container -->
</body>

</html>
