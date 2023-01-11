<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 1</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <table class="table" cellspacing="0">
        <?php
        $value = 0;
        $row = 0;

        while ($row < 8) {
            $col = 0;
            echo "<tr>";
            $value = $row;

            while ($col < 8) {
                if ($value % 2 != 0) {
                    echo "<td class='chess bg-dark'></td>";
                    $value++;
                } else {
                    echo "<td class='chess bg-light'></td>";
                    $value++;
                }
                $col++;
            }
            echo "</tr>";
            $row++;
        }
        ?>
    </table>
</body>

</html>
