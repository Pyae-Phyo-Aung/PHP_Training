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
            ['', 'Yearly Created Post'],
            <?php
            for ($i = 1; $i <= 12; $i++) {
                $sql = "SELECT title FROM posts WHERE year(created_datetime) = '2022' AND month(created_datetime) = '$i';";
                $result = mysqli_query($conn, $sql);
                $rowcount = mysqli_num_rows($result);
                if ($i == 12) {
                    $month = "December";
                } elseif ($i == 11) {
                    $month = "November";
                } elseif ($i == 10) {
                    $month = "October";
                } elseif ($i == 9) {
                    $month = "September";
                } elseif ($i == 8) {
                    $month = "August";
                } elseif ($i == 7) {
                    $month = "July";
                } elseif ($i == 6) {
                    $month = "June";
                } elseif ($i == 5) {
                    $month = "May";
                } elseif ($i == 4) {
                    $month = "April";
                } elseif ($i == 3) {
                    $month = "March";
                } elseif ($i == 2) {
                    $month = "February";
                } elseif ($i == 1) {
                    $month = "January";
                } else {
                    $month = "Unknow";
                }
                $posts = $rowcount;
            ?>['<?php echo $month; ?>', <?php echo $posts; ?>],
            <?php
            }
            ?>
        ]);

        var options = {
            chart: {
                title: 'Yearly Created Post',
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
                <a href="graph_yearly.php" class="cmn-btn bg-secondary-outline float-right active">Yearly</a>
                <a href="graph_monthly.php" class="cmn-btn bg-secondary-outline float-right">Monthly</a>
                <a href="graph_weekly.php" class="cmn-btn bg-secondary-outline float-right">Weekly</a>
            </div>
            <div id="barchart_material"></div>
        </div>
    </section>
    <!--/.sec-chart-->
</body>

</html>
