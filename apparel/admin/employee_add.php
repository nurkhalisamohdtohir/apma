<!DOCTYPE html>
<html>
<head>
    <title>New Employee | Admin</title>
    <link rel="stylesheet" href="../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<!-- check if email already exist -->
    <script type="text/javascript" src="js/jquery.js"></script>

</head>
<body>
<?php
  include_once '../connect.php';
    include_once 'sidebar.php'; 
?>

<div id="main">
<?php
  include_once 'header.php';

$query = "SELECT Emp_ID FROM employee ORDER BY Emp_ID DESC";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
$lastid = $row['Emp_ID'];
if(empty($lastid))
{
    $number = "0001";
}
else
{
    $idd = str_replace("", "", $lastid);
    $id = str_pad($idd + 1, 4, 0, STR_PAD_LEFT);
    $number = $id;
}
?>

    <div class="w3-container"> 
        <hr>

        <div class="w3-card-4" style="width:100%;">
            <div class="w3-container">
                <center>

        <div class="title">
            <h2><b>Add Employee</b></h2><hr>
        </div>

        <div class="form-box">
            <!-- <div class="form-left"> -->
                <form role="form"  action="employee_data.php" method="POST">

                    <div class="form">
                        <label><b>ID No : </b></label>
                        <input type="text" name="Emp_ID" value="<?php echo $number; ?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>IC No : </b></label><br>
                        <input type="text" name="Emp_IC" pattern="[0-9]{12}" title="IC number should contain 12 numeric values only e.g: 000000000000" placeholder="e.g: 000000000000" required>
                    </div>

                    <div class="form">
                        <label><b>Name : </b></label>
                        <input type="text" name="Emp_Name" pattern="[a-zA-Z\s]+" title="Name should contain alphabets and whitespace only" required style="text-transform:uppercase">
                    </div>

                    <div class="form">
                        <label><b>Department : </b></label>
                        <select class="prefer" name="Emp_Dept" required>
                                <option disabled selected>-- Select Department --</option>
                                <option value="ADMIN"> ADMIN </option><!--  by default -->
                                <option value="PRODUCTION-MANAGER"> PRODUCTION-MANAGER </option>
                                <option value="PRODUCTION-FABRIC INSPECTION"> PRODUCTION-FABRIC INSPECTION </option>
                                <option value="PRODUCTION-PATTERN MAKING"> PRODUCTION-PATTERN MAKING </option>
                                <option value="PRODUUCTION-CUTTING"> PRODUCTION-CUTTING </option> 
                                <option value="PRODUCTION-SEWING"> PRODUCTION-SEWING </option>
                                <option value="PRODUCTION-FINISHING"> PRODUCTION-FINISHING </option>    
                            </select>
                    </div>


                    <div class="form">
                        <label><b>Email : </b></label>
                        <input type="text" name="Emp_Email" id="Emp_Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,4}$" title="e.g: xyz@something.com" placeholder="e.g: xyz@something.com" onkeyup="checkemail();" required>
                        <span id="email_status"></span>
                    </div>

                    <div class="form">
                        <label><b>Phone No : </b></label><br>
                        <input type="text" name="Emp_Phone" pattern="[0-9]{10}" title="Phone number should contain 10 numeric values only e.g: 0000000000" placeholder="e.g: 0000000000" required><br>
                    </div>

                    <br>

                    <div class="form">
                        <input type="checkbox" name="catatan" value="" required><strong> I acknowledge that all information are correct.</strong>
                    </div>

                    <br>
                    <div class="feedback-button">
                        <button style="background-color: MediumSeaGreen" type="submit" name="Submit" value="submit" class="btn">SUBMIT</button>
                        <button style="background-color: red" type="reset" class="btn">RESET</button>
                    </div>
                    
                </form>
            <!-- </div> -->
        </div>
    </center>
            </div>
        </div>
    </div>
    
</div>

<script>
     function checkemail()
{
 var Emp_Email=document.getElementById( "Emp_Email" ).value;
    
 if(Emp_Email)
 {
  $.ajax({
  type: 'post',
  url: 'validate.php',
  data: {
   Emp_Email:Emp_Email,
  },
  success: function (response) {
   $( '#email_status' ).html(response);
   if(response=="")   
   {
    return true;    
   }
   else
   {
    return false;   
   }
  }
  });
 }
 else
 {
  $( '#email_status' ).html("");
  return false;
 }
}
</script>
</body>

</html>