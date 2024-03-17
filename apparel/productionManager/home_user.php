<!DOCTYPE html>
<html>
<head>
    <title>Dashboard </title>
    <link rel="stylesheet" href="../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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
    </div>
      </div>
</section>


<?php
  include("../footer.php");
  ?>
</body>
</html>