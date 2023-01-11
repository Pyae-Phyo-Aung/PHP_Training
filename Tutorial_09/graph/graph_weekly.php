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
            ['', 'Weekly Created Post'],
            <?php
            $currentMonth = date('m');
            $currentYear = date('Y');
            $weekstart = strtotime("next Monday") - 604800;
            $weekend = strtotime("next Monday") - 1;
            $startDate = date('j', $weekstart);
            $endDate = date('j', $weekend);
            $dayCount = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);
            for ($i = $startDate; $i <= $endDate; $i++) {
                $sql = "SELECT * FROM posts WHERE year(created_datetime) = '$currentYear' AND month(created_datetime) = '$currentMonth' AND day(created_datetime) = '$i';";
                $result = mysqli_query($conn, $sql);
                $rowcount = mysqli_num_rows($result);
                $getDate = DateTime::createFromFormat('d/m/Y', $i . '/' . $currentMonth . '/' . $currentYear);
                $day = $getDate->format('l');
                $posts = $rowcount;
            ?>['<?php echo $day; ?>', <?php echo $posts; ?>],
            <?php
            }
            ?>
        ]);

        var options = {
            chart: {
                title: 'Weekly Created Post',
            },
            bars: 'vertical'
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>

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
                <a href="graph_monthly.php" class="cmn-btn bg-secondary-outline float-right">Monthly</a>
                <a href="graph_weekly.php" class="cmn-btn bg-secondary-outline float-right active">Weekly</a>
            </div>
            <div id="barchart_material"></div>
        </div>
    </section>
    <!--/.sec-chart-->
</body>

</html>
