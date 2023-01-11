<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 5 | Home</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="header clearfix">
        <h1 class="user"> User: <?php echo $_SESSION['username'] ?></h1>
        <nav class="nav">
            <ul class="menu clearfix">
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="text.php">Text</a></li>
                <li><a href="excel.php">Excel</a></li>
                <li><a href="csv.php">CSV</a></li>
                <li><a href="document.php">Document</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>