<!DOCTYPE html>
<html>
<head>
    <title>Dashboard | Admin</title>
    <link rel="stylesheet" href="../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

      $(document).ready(function(){

            load_data();

            function load_data(query)
            {

                $.ajax({
                  url:"report_ajax.php",
                  method:"GET",
                  data:{query:query},
                  success:function(data)
                  {
                    $('#report').html(data);
                  }
                });
            }

            $('#year').change(function(){
                var search = $(this).val();
                if(search != '')
                {
                  load_data(search);
                }
                else
                {
                  load_data();
                }
             });

            $('#print').click(function(){
                var year = $('#year').val();
                window.open('print_booking_report.php?year='+year);
              
            });
      });

      </script>

</head>
<body>
<?php
  include_once '../connect.php';
include_once 'sidebar.php';

$countEmployee=0;
$sqlEmployee="SELECT * FROM employee";
$result=mysqli_query($conn, $sqlEmployee);
$countEmployee=mysqli_num_rows($result);

$countWarehouse=0;
$sqlWarehouse="SELECT * FROM warehouse";
$result=mysqli_query($conn, $sqlWarehouse);
$countWarehouse=mysqli_num_rows($result);

$countApparel=0;
$sqlApparel="SELECT * FROM apparel";
$result=mysqli_query($conn, $sqlApparel);
$countApparel=mysqli_num_rows($result);

$countProduction=0;
$sqlProduction="SELECT * FROM production";
$result=mysqli_query($conn, $sqlProduction);
$countProduction=mysqli_num_rows($result);
?>

<section class="home-section">
      <div class="text">
        <?php
  include_once 'header.php';
?>

    <div class="w3-container"> 
        <h3>Dashboard</h3>
        <hr>

        <div class="row">
  <div class="column">
    <div class="card" style="background-color: #EEE8AA">
      <h3><?php echo $countEmployee; ?></h3>
      <p>Total Employee</p>
      <p><i class='fas fa-users' style="font-size: 30px"></i></p>
    </div>
  </div>

  <div class="column">
    <div class="card" style="background-color: skyblue">
      <h3><?php echo $countWarehouse; ?></h3>
      <p>Total Warehouse</p>
      <p><i class='fas fa-warehouse' style="font-size: 30px"></i></p>
    </div>
  </div>
  
  <div class="column">
    <div class="card" style="background-color: #EEE8AA">
      <h3><?php echo $countApparel; ?></h3>
      <p>Total Apparel</p>
      <p><i class='fas fa-tshirt' style="font-size: 30px"></i></p>
    </div>
  </div>
  
  <div class="column">
    <div class="card" style="background-color: skyblue">
      <h3><?php echo $countProduction; ?></h3>
      <p>Total Production</p>
      <p><i class='fas fa-boxes' style="font-size: 30px"></i></p>
    </div>
  </div>
</div>

<hr>
<center>
  <content>
    <center>
<div style="background-color: black; width: 100%">
      <div class="form-search" style="width: 30%; margin-left: 90px; float: left;">
      <label><b>Year of Report: </b></label>
      <select class="prefer" style="width: 50%" id="year">
        <option value="2022">2022</option>
      
      </select>
      </div>
      <div style="float: right; margin-right: 110px;margin-top: 10px;">
        <button id = "print" type="button" class="btn" style="width: 100px">Print</button>
      </div>
    </div>
    
    <br><br><br>
    <div id="report">
      
    </div>

    </center>
  </content>
  </center>

    </div><!-- -->
      </div>
</section>


<?php
  include("../footer.php");
  ?>
</body>
</html>