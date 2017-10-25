<?php
 include('../database.php');
 ?>
<!DOCTYPE HTML>
<html>
<head>
 <meta charset="utf-8">
 <title>
 Create Google Charts
 </title>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 
 <script type="text/javascript">
 google.load('visualization', '1', {packages: ['corechart', 'bar']});
 google.setOnLoadCallback(drawMaterial);

 function drawMaterial() {
 var data = google.visualization.arrayToDataTable([
 ['item type', 'overall inventory', 'allocated inventory'],
 <?php
 //selecting the item name along with count with the condition(group by item)
 $query = "SELECT count(item_name) AS count, item_name FROM inventory GROUP BY item_name";

 $exec = mysqli_query($con, $query);

while ($row = mysqli_fetch_array($exec)) {
 //shows item name in the x-axis   
    echo "['" . $row['item_name'] . "',";
    $itemname = $row['item_name'];
    $query2   = "select distinct item_name,count(item_name) from inventoty_allotment where item_name = '$itemname'";
    $exec2    = mysqli_query($con, $query2);
    $row2     = mysqli_fetch_assoc($exec2);
 //count of total inventory in y-axis   
    echo $row['count'];
    
    
 //count of allotted inventory in y-axis   
    
    echo "," . $row2['count(item_name)'] . "],";
}
?>
 ]);

 var options = {
 
 title: 'Histogram',
 
 bars: 'vertical'
 };
 var material = new google.charts.Bar(document.getElementById('barchart'));
 material.draw(data, options);
 }
 </script>
</head>
<body>
 <h3 style="margin:2%;color:grey !important;">Inventory Histogram</h3>
 <div id="barchart" style="width: 100%; height: 500px;"></div>
</body>
</html>