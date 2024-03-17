<?php

include_once '../connect.php';

// Check If form submitted, insert form data into users table.
if(isset($_POST['Submit'])) {
	
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$date = date("d-m-Y");
	$file = $_FILES["Pattern_Image"];
	$fileName = $file['name'];
	$fileTmpName = $file['tmp_name'];
	$fileSize = $file['name'];
	$fileError = $file['error'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$fileNameNew = $date."_".$fileName ;
	$fileDestination = '../image/'.$fileNameNew;
	move_uploaded_file($fileTmpName, $fileDestination);
	//INSERT EVERY COLUMN

			
    $Pattern_Type= $_POST['Pattern_Type'];
    $Pattern_Code = $_POST['Pattern_Code'];
    $Pattern_Meter = $_POST['Pattern_Meter'];
			
	$sql = "INSERT INTO pattern (Pattern_Code, Pattern_Type, Pattern_Meter, Pattern_Image) VALUES ((UPPER('$Pattern_Code')), (UPPER('$Pattern_Type')), '$Pattern_Meter', '$fileDestination')";

	// Show message when user added
	if (!mysqli_query($conn, $sql)) 
	{
    	die('Error: ' . mysqli_error($conn)); 
	}
	else 
	{

		?>
        <script type="text/javascript">
        	alert('New Pattern Record Added!');
        	window.location.href='pattern_list.php?success';
        </script> 
	
<?php
	}	
}
?> 
