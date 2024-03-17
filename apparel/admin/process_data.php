<?php

include_once '../connect.php';

// Check If form submitted, insert form data into users table.
if(isset($_POST['Submit'])) {
	$Process_ID = $_POST['Process_ID'];
    $Process_Desc= $_POST['Process_Desc'];


	// Insert category data into table
	$sql = "INSERT INTO production_process (Process_ID, Process_Desc) VALUES ('$Process_ID', (UPPER('$Process_Desc')))";

	// Show message when user added
	if (!mysqli_query($conn, $sql)) 
	{
    	die('Error: ' . mysqli_error($conn)); 
	}
	else 
	{?>
        <script type="text/javascript">
        	alert('New Production Process Record Added!');
        	window.location.href='process_list.php?success';
        </script> 
	
<?php
	}	
}
?>   