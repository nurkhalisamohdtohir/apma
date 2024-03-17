<?php 

require_once('../connect.php');
$createTable = '';
$year = '2022';
$sum = 0;

if(isset($_GET['query'])) {
  $year = $_GET['query'];
}

?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

          var data = google.visualization.arrayToDataTable([
            ['Production Status', 'Percentage'],

            <?php 
              $querytype = "SELECT Process_Desc, COUNT(Process_ID) AS total FROM production_process 
              INNER JOIN log ON production_process.Process_ID = log.Production_Desc
              WHERE YEAR(Datetime) = '$year'
              GROUP BY Process_ID";
              $rstype = mysqli_query($conn, $querytype);

              while ($rowtype = mysqli_fetch_array($rstype)) { 
            ?>

            ["<?php echo $rowtype['Process_Desc'] ?>", <?php echo $rowtype["total"] ?>],

              
            <?php 
              } 
            ?>
          ]);

          var options = {
            title: 'Production Status'
          };

          var chart = new google.visualization.PieChart(document.getElementById('piechart'));

          chart.draw(data, options);
        }
      </script>


      <script type="text/javascript">

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

          var data = google.visualization.arrayToDataTable([
            ['Fabric Type', 'Total'],

            <?php 
              $querytype = "SELECT Fabric_Type, SUM(Apparel_Qty) as total FROM apparel
              INNER JOIN fabric ON apparel.Fabric_ID = fabric.Fabric_ID
              GROUP BY Fabric_Type";
              $rstype = mysqli_query($conn, $querytype);

              while ($rowtype = mysqli_fetch_array($rstype)) { 
            ?>

            ["<?php echo $rowtype['Fabric_Type'] ?>", <?php echo $rowtype["total"] ?>],

              
            <?php 
              } 
            ?>
          ]);

          var options = {
            title: 'Total of Apparel Produced Based on Fabric Type',
          };

          var chart = new google.visualization.ColumnChart(document.getElementById('columnchart'));

          chart.draw(data, options);
        }
      </script>

      <script type="text/javascript">

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

          var data = google.visualization.arrayToDataTable([
            ['Apparel', 'Sales (RM)', 'Expenses (RM)', 'Profit (RM)'],

            <?php 
              $querytype = "SELECT Apparel_Name, (Apparel_Qty*Apparel_Price) as sales, (Fabric_Price*Fabric_Qty) as expenses, ((Apparel_Qty*Apparel_Price) - (Fabric_Price*Fabric_Qty)) as profit FROM apparel
              INNER JOIN fabric ON apparel.Fabric_ID = fabric.Fabric_ID
              GROUP BY Apparel_Name";
              $rstype = mysqli_query($conn, $querytype);

              while ($rowtype = mysqli_fetch_array($rstype)) { 
            ?>

            ["<?php echo $rowtype['Apparel_Name'] ?>", <?php echo $rowtype["sales"] ?>, <?php echo $rowtype["expenses"] ?>, <?php echo $rowtype["profit"] ?>],

              
            <?php 
              } 
            ?>
          ]);

          var options = {
            title: 'Sales, Expenses, Profit Based on Apparel',
          };

          var chart = new google.visualization.BarChart(document.getElementById('barchart'));

          chart.draw(data, options);
        }
      </script>

<?php

  echo '<div style="padding-bottom: 200px ; width: 80%;">
      <div id="piechart" style="float: left; width: 48%; height: 300px;"></div>
      <div id="columnchart" style="float: right; width: 48%; height: 300px; "></div>
      </div>
      <br><br><br><br>
      <div id="barchart" style="font-size: 12px; width: 80%; height: 500px; padding: 20px"></div>';
?>    