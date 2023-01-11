<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 2</title>
</head>

<body>
    <div style="width: 30%; margin:100px auto;">
        <?php
        echo "<pre>";
        $row = 1;
        //first part 
        while ($row < 6) {
            $col = $row;
            while ($col < 6) {
                echo "&nbsp;&nbsp;";
                $col++;
            }
            $col = 2 * $row - 1;
            while ($col > 0) {
                echo "&nbsp;*";
                $col--;
            }
            $row++;
            echo "<br>";
        }
        //second part  
        $n = 6;
        $row = 6;
        while ($row > 0) {
            $col = $n - $row;
            while ($col > 0) {
                echo "&nbsp;&nbsp;";
                $col--;
            }
            $col = 2 * $row - 1;
            while ($col > 0) {
                echo "&nbsp;*";
                $col--;
            }
            $row--;
            echo "<br>";
        }
        echo "</pre>";
        ?>
    </div>
</body>

</html>
