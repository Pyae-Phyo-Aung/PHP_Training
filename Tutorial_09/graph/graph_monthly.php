<?php
require_once "../db_connect.php";
require_once "../functions.php";
require_once "../header.php";
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['bar']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['2022', 'Monthly Created Post'],
            <?php
            $currentMonth = date('m');
            $currentYear = date('Y');
            $dayCount = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);
            for ($i = 1; $i <= $dayCount; $i++) {
                $sql = "SELECT * FROM posts WHERE year(created_datetime) = '$currentYear' AND month(created_datetime) = '$currentMonth' AND day(created_datetime) = '$i';";
                $result = mysqli_query($conn, $sql);
                $rowcount = mysqli_num_rows($result);
                $date = $i;
                $posts = $rowcount;
            ?>['<?php echo $date; ?>', <?php echo $posts; ?>],
            <?php
            }
            ?>
        ]);

        var options = {
            chart: {
                title: 'Monthly Created Post',
            },
            bars: 'vertical'
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 9</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <section class="sec-chart">
        <div class="l-inner">
            <div class="group clearfix">
                <a href="../index.php" class="cmn-btn bg-secondary float-left">Back</a>
                <a href="graph_yearly.php" class="cmn-btn bg-secondary-outline float-right">Yearly</a>
                <a href="graph_monthly.php" class="cmn-btn bg-secondary-outline float-right active">Monthly</a>
                <a href="graph_weekly.php" class="cmn-btn bg-secondary-outline float-right">Weekly</a>
            </div>
            <div id="barchart_material"></div>
        </div>
    </section>
    <!--/.sec-chart-->
</body>

</html>
