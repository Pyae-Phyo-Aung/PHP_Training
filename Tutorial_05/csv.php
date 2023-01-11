<?php
session_start();
if (!$_SESSION['username']) {
    header("location:login.php");
}
include_once "header.php";
?>
<section class="sec-csv">
    <div class="l-inner">
        <h1 class="cmn-ttl">CSV file data</h1>
        <table class="table">
            <?php
            $start_row = 1;
            if (($csv_file = fopen("files\info.csv", "r")) !== FALSE) {
                while (($read_data = fgetcsv($csv_file, 1000, ",")) !== FALSE) {
                    $column_count = count($read_data);
                    $start_row++;
                    echo '<tr>';
                    for ($c = 0; $c < $column_count; $c++) {
                        echo "<td>" . $read_data[$c] . "</td>";
                    }
                    echo '</tr>';
                }
                fclose($csv_file);
            }
            ?>
        </table>
    </div>
</section>
<!--/.sec-csv -->
</body>

</html>
