<?php

include_once '../connect.php';

$Emp_ID = $_POST['Emp_ID'];
$Emp_IC = $_POST['Emp_IC'];
$Emp_Name = $_POST['Emp_Name'];
$Emp_Dept = $_POST['Emp_Dept'];
$Emp_Email = $_POST['Emp_Email'];
$Emp_Phone = $_POST['Emp_Phone'];



//$sql = "SELECT * FROM employee WHERE Emp_Email = '$Emp_Email' ";
//$rs = mysqli_query($conn, $sql);
//if (mysqli_num_rows($rs) > 0) {
            //</script>";
//}

//else
//{
	$sql = "INSERT INTO employee (Emp_ID, Emp_IC, Emp_Name, Emp_Dept, Emp_Email, Emp_Phone) VALUES ('$Emp_ID', '$Emp_IC', (UPPER('$Emp_Name')), (UPPER('$Emp_Dept')), '$Emp_Email', '$Emp_Phone')";

	if (!mysqli_query($conn, $sql)) {
    	die('Error: ' . mysqli_error($conn)); 
    }
    else{
    	echo "<script type='text/javascript'>
			alert('New Employee Record Added!');
        window.location.href='employee_list.php?success';
			</script>";
    }
//}
 

?>
   