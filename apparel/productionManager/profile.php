<!DOCTYPE html>
<html>
<head>
    <title>Profile </title>
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
?>

<div id="main">
<?php
  include_once 'header.php';
?>
<script>
function myFunction() {
  var x = document.getElementById("katalaluan");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
    <div class="w3-container"> 
        <h3>Profile</h3>
        <hr>

        <div class="w3-card-4" style="width:100%;">
            <div class="w3-container">
                    <center>
        <div class="title">
            <h2><b>Update Profile</b></h2><hr>
        </div>

        <div class="form-box">
            <center><img src="../image/user2.png" width="150" height="150" class="image-user"></center><br>
                <form role="form" action="profile_update.php" method="post">
                    
                <div class="form">
                        <div class="ID-left">
                            <label><b>Employee ID :</b></label>
                            <input type="text" name="Emp_ID" value="<?php echo "$row[Emp_ID]"?>" readonly>
                        </div>  

                        <div class="IC-right">
                            <label><b>I/C Number :</b></label>
                            <input type="text" name="Emp_IC" value="<?php echo "$row[Emp_IC]"?>" readonly>
                        </div> 
                    </div>

                    <div class="form">
                        <label><b>Full Name :</b></label>
                        <input type="text" name="Emp_Name" value="<?php echo "$row[Emp_Name]"?>" readonly>
                    </div>

                    
                    <div class="form">
                        <label><b>Phone Number :</b></label>
                        <input type="text" name="Emp_Phone" value="<?php echo "$row[Emp_Phone]"?>" pattern="[0-9]{10}" title="Phone number should contain 10 numeric values only e.g: 0000000000">
                    </div>

                    <div class="form">
                        <label><b>Email Address :</b></label>
                        <input type="text" name="Emp_Email" value="<?php echo "$row[Emp_Email]"?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,4}$" title="e.g: xyz@something.com">
                    </div>

                    <div class="form">
                        <label><b>Password :</b></label>
                        <input type="password" id="katalaluan" name="Emp_Password" value="<?php echo "$row[Emp_Password]"?>">
                        <input type="checkbox" onclick="myFunction()"> Show Password
                    </div>
                    
                
                    
                    <div class="feedback-button">
                        <button type="submit" class="btn">Save</button>
                    </div>
                    
                </form>
            <!-- </div> -->
        </div>
        </center>
            </div>
        </div>
    </div>
    
</div>


</body>

</html>