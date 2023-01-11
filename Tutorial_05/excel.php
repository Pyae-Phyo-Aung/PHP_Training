<?php

session_start();
if (!$_SESSION['username']) {
    header("location:login.php");
}

require 'libary/excel/vendor/autoload.php';

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();


$spreadsheet = $reader->load("files/friend_list.xlsx");

$d = $spreadsheet->getSheet(0)->toArray();

$sheetData = $spreadsheet->getActiveSheet()->toArray();

$i = 1;
include_once "header.php";
?>
<section class="sec-excel-list">
    <h1 class="cmn-ttl">Excel File Data</h1>
    <table class="table">
        <?php
        foreach ($sheetData as $t) {
            echo "<tr>";
            echo "<td>" . $t[0] . "</td>";
            echo "<td>" . $t[1] . "</td>";
            echo "<td>" . $t[2] . "</td>";
            echo "<td>" . $t[3] . "</td>";
            echo "<td>" . $t[4] . "</td>";
            $i++;
            echo "</tr>";
        }
        ?>
    </table>
</section>
<!--/.sec-excel-list -->
</body>

</html>
