<?php

include_once '../connect.php';
 
$Emp_ID = $_POST['Emp_ID'];
$Emp_IC = $_POST['Emp_IC'];
$Emp_Name = $_POST['Emp_Name'];
$Emp_Email = $_POST['Emp_Email'];
$Emp_Phone = $_POST['Emp_Phone'];
$Emp_Password = $_POST['Emp_Password'];

$sql = "UPDATE employee SET Emp_Name ='$Emp_Name', Emp_Email ='$Emp_Email', Emp_Phone = '$Emp_Phone', Emp_Password ='$Emp_Password' where Emp_IC ='$Emp_IC' and Emp_ID = '$Emp_ID'";

if (!mysqli_query($conn, $sql)) {
    die('Error: ' . mysqli_error($conn)); 
}else {?>
		<script type="text/javascript">
		alert('Your Profile is Successfully Updated!');
        window.location.href='profile.php?success';
		</script> 
<?php
}
?>
       