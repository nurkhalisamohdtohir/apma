<?php
//include('phpqrcode/qrlib.php');
include_once '../connect.php';

// Check If form submitted, insert form data into users table.
if(isset($_POST['Submit'])) {

    date_default_timezone_set("Asia/Kuala_Lumpur");
	$date = date("d-m-Y");
	$file = $_FILES["Apparel_Image"];
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
	$Apparel_ID = $_POST['Apparel_ID'];
	$Apparel_Code = $_POST['Apparel_Code'];
	$Apparel_Name = $_POST['Apparel_Name'];
    $Fabric_ID= $_POST['Fabric_ID'];
    $Pattern_ID= $_POST['Pattern_ID'];;
    $Apparel_Qty= $_POST['Apparel_Qty'];
    $Apparel_QtyRS= $_POST['Apparel_QtyRS'];
    $Apparel_Price= $_POST['Apparel_Price'];

	$sql = "INSERT INTO apparel (Apparel_ID, Apparel_Code, Apparel_Name, Fabric_ID, Pattern_ID, Apparel_Qty, Apparel_QtyRS, Apparel_Price, Apparel_Image) VALUES ('$Apparel_ID', (UPPER('$Apparel_Code')), (UPPER('$Apparel_Name')), '$Fabric_ID', '$Pattern_ID', '$Apparel_Qty', '$Apparel_QtyRS', (UPPER('$Apparel_Price')),'$fileNameNew')";

		// Show message when user added
		if (!mysqli_query($conn, $sql)) 
		{
    		die('Error: ' . mysqli_error($conn)); 
		}
		else 
		{
			echo "<script type='text/javascript'>
				alert('New Apparel Record Added!');
	        	window.location.href='apparel_list.php?success';
				</script>";
		}	

	
}
?> 
