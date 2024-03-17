<?php

include_once '../connect.php';

// Check If form submitted, insert form data into users table.
if(isset($_POST['Submit'])) {
	$Production_ID = $_POST['Production_ID'];
	$Apparel_ID = $_POST['Apparel_ID'];
    $Process_ID= 1;
    $Emp_ID= 20015;

		// Insert category data into table
	$sql = "INSERT INTO production (Production_ID, Apparel_ID, Process_ID) VALUES ('$Production_ID', '$Apparel_ID', '$Process_ID')";

	$sql2 = "INSERT INTO log (Emp_ID, Production_ID, Apparel_ID, Production_Desc) VALUES ('$Emp_ID', '$Production_ID', '$Apparel_ID', '$Process_ID')";

	// Show message when user added
	if (!mysqli_query($conn, $sql2)) 
	{
    	die('Error: ' . mysqli_error($conn)); 
	}

	// Show message when user added
	if (!mysqli_query($conn, $sql)) 
	{
    	die('Error: ' . mysqli_error($conn)); 
	}
	else 
	{
        echo "<script type='text/javascript'>
			alert('New Production Record Added!');
	        window.location.href='production_list.php?success';
			</script>";
	
	}//	

	
}
?>   