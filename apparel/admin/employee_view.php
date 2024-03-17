<!DOCTYPE html>
<html>
<head>
    <title>Profile | Admin</title>
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

    // Getting id from url
    $Emp_IC = $_GET['Emp_IC'];

    $query ="SELECT * FROM `employee` WHERE Emp_IC=$Emp_IC";
    $result=mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);


if(isset($_POST['Update'])) {
    $Emp_ID = $_POST['Emp_ID'];
    $Emp_IC = $_POST['Emp_IC'];
    $Emp_Status = $_POST['Emp_Status'];


    // Insert user data into table
    $sql = "UPDATE employee SET Emp_Status='$Emp_Status' WHERE Emp_IC=$Emp_IC";

    // Show message when user added
    if (!mysqli_query($conn, $sql)) 
    {
        die('Error: ' . mysqli_error($conn)); 
    }
    else 
    {
?>

<script type="text/javascript">
            alert('Employee record is updated!');
            window.location.href='employee_list.php?success';
        </script> 
    
<?php
    }   
}
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
        <hr>

        <div class="w3-card-4" style="width:100%;">
            <div class="w3-container">
    <center>
        <div class="title">
            <h2><b>View Employee</b></h2><hr>
        </div>

        <div class="form-box">
            <center><img src="../image/user2.png" width="150" height="150" class="image-user"></center><br>
                <form role="form" action="" method="post">
                    
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
                        <label><b>Departmente :</b></label>
                        <input type="text" name="Emp_Dept" value="<?php echo "$row[Emp_Dept]"?>" readonly>
                    </div>

                    
                    <div class="form">
                        <label><b>Phone Number :</b></label>
                        <input type="text" name="Emp_Phone" value="<?php echo "$row[Emp_Phone]"?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Email Address :</b></label>
                        <input type="text" name="Emp_Email" value="<?php echo "$row[Emp_Email]"?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Status: </b></label><br>
                            <select class="prefer" name="Emp_Status" value="<?php echo "$row[Emp_Status]"?>" required>
                                <option value="INACTIVE" selected> INACTIVE </option>
                                <option value="ACTIVE"> ACTIVE </option>
                            </select>
                    </div>

                    <div class="form">
                        <td><input type="hidden" name="Emp_IC" value=<?php echo $_GET['Emp_IC'];?>></td>
                    </div>
                
                    
                    <br>

                    <div class="form">
                        <input type="checkbox" name="catatan" value="" checked><strong> I acknowledge that all information are correct.</strong>
                    </div>

                    <br>
                    <div class="feedback-button">
                        <button style="background-color: MediumSeaGreen" onClick="return confirm('Are you sure you want to update this record?')" type="submit" name="Update" value="Update" class="btn">UPDATE</button>
                        <a href="employee_list.php"><button style="background-color: DodgerBlue" type='button' class="btn">BACK</button></a>
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