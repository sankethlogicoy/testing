 
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            Create Google Charts
        </title>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
            google.load("visualization", "1", {packages: ["corechart"]});
            google.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([

                    ['Username', 'Balance INR'],
                    ["starting", 0],
<?php
$query = "select username,total from (select * from wallet GROUP BY (date) DESC) AS x GROUP BY username order by date desc";

$exec = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($exec)) {

    echo "['" . $row['username'] . "'," . $row['total'] . "],";
}
?>

                ]);

                var options = {
                    title: 'Wallet Balance'
                };
                var chart = new google.visualization.ColumnChart(document.getElementById("columnchart"));
                chart.draw(data, options);
            }
        </script>
    </head>
    <body>

        <div id="columnchart"  class="chart"></div>
    </body>
</html>