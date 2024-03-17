<!DOCTYPE html>
<html>
<head>
  <?php
include_once '../connect.php';

$count=0;
$sql2="SELECT * FROM production JOIN apparel ON production.Apparel_ID = apparel.Apparel_ID WHERE production.Production_Qty=apparel.Apparel_Qty";
$result=mysqli_query($conn, $sql2);
$count=mysqli_num_rows($result);

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
<script type="text/javascript">

  function myNoti() {
    $.ajax({
      url: "production_notification.php",
      type: "POST",
      processData:false,
      success: function(data){
       $("#notification-count").remove();          
        $("#box").show();
        $(".show").html(data);
      },
      error: function(){}           
    });
   }
     
  </script>
<style>

.notification {
  color: white;
  text-decoration: none;
  position: relative;
  display: inline-block;
  border-radius: 2px;
}

.notification:hover {
  color: black;
}

.notification .badge {
  position: absolute;
  top: -0px;
  right: -0px;
  padding: 0px 8px;
  border-radius: 50%;
  background-color: red;
  color: white;
  font-size: 14px ;
}

.notification-item {
  margin-top: 100px;
}

/* Popup box BEGIN */
.notifi-box {
    width: 350px;
    height: auto;
    opacity: 0;
    position: absolute;
    top: 63px;
    right: 35px;
    box-shadow: 10px 10px 60px #555;
    background-color: #eee;
    border-radius: 6px;
}
.notifi-box h2 {
    background-color: #eee;
    font-size: 14px;
    padding: 2px;
    color: #4682B4;
    margin-left: 18px;
}

.notifi-item, .show {
    display: block;
    cursor: pointer;
    background-color: #f9f9f9;
}
.notifi-item:hover {
    
}
/* Set all odd list items to a different color (zebra-stripes) */
.notifi-item:nth-child(odd) {
  background-color: #f9f9f9;
}

.notifi-item .text h4 {
    color: black;
    font-size: 14px;
    margin-top: 4px;
    margin-left: 18px;
}
.notifi-item .text h5 {
    color: #aaa;
    font-size: 13px;
    margin-left: 18px;
    border-bottom: 2px solid #eee;

}

/* Popup box BEGIN */
</style>
</head>
<body>

<div class="topnav" id="myTopnav">

  <a href="home_user.php" style="float: left"><b>Apparel Production Monitoring</b></a>
  <a href="../logout.php"><i class="fas fa-fw fa-sign-out-alt"></i></a>
  <a href="#" class="notification" id="notification-icon" onclick="toggleNotifi();myNoti();" title="Notification">
          <span><i class="fa fa-bell fa-fw w3-large" style="font-size:24px"></i></span>
          <?php if($count > 0) 
          { ?>
            <span class="badge" id="notification-count"><?php echo $count; ?></span> 
          <?php
          } 
          ?>
    </a>
    <!--dropdown -->
    <div class="notifi-box" id="box">
            <h2><i class="fa fa-bell" style="font-size:14px"></i><b>  Production Status Notifications :</b></h2>
            <div class="show">
               
            </div>

        </div>
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

<script>
var box  = document.getElementById('box');
var down = false;


function toggleNotifi(){
    if (down) {
        box.style.height  = '0px';
        box.style.opacity = 0;
        down = false;
    }else {
        box.style.height  = 'auto';
        box.style.opacity = 1;
        down = true;
    }
}
    </script>

</body>
</html>
