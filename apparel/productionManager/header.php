<!DOCTYPE html>
<html>
<head>
  <?php
include_once '../connect.php';

?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- notification-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<style>
body {
  margin: 0;
}

</style>

</head>
<body>

<div class="topnav" id="myTopnav">

  <a href="home_user.php" style="float: left"><b>Apparel Production Monitoring</b></a>
  <a href="../logout.php"><i class="fas fa-fw fa-sign-out-alt"></i></a>
  <a href="profile.php"><i class="fa fa-fw fa-user"></i><?php echo "$row0[Emp_Name]"?><a>
</div>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>



</body>
</html>
