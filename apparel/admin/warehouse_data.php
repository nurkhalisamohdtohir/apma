<?php

include_once '../connect.php';

// Check If form submitted, insert form data into users table.
if(isset($_POST['Submit'])) {
	$Warehouse_ID = $_POST['Warehouse_ID'];
    $Warehouse_Location= $_POST['Warehouse_Location'];


	// Insert category data into table
	$sql = "INSERT INTO warehouse (Warehouse_ID, Warehouse_Location) VALUES ('$Warehouse_ID', (UPPER('$Warehouse_Location')))";

	// Show message when user added
	if (!mysqli_query($conn, $sql)) 
	{
    	die('Error: ' . mysqli_error($conn)); 
	}
	else 
	{?>
        <script type="text/javascript">
        	alert('New Warehouse Record Added!');
        	window.location.href='warehouse_list.php?success';
        </script> 
	
<?php
	}	
}
?>   