
<?php

if(isset($_POST['Production_ID']) && isset($_POST['Apparel_ID'])){
 require_once "conn.php";
	
	
	$Production_ID=$_POST['Production_ID'];
	
	$Apparel_ID=$_POST['Apparel_ID'];
	
	$Production_Qty=$_POST['Production_Qty'];


	$sql_mileage = "UPDATE production SET Production_Qty='$Production_Qty' + 1 WHERE Production_ID='$Production_ID' AND Apparel_ID='$Apparel_ID'";

	$result1=mysqli_query($conn,$sql_mileage);
	
	if ($result1) 
	{
 
		echo "Updated successfully";			

	} 

	else 
	{
		echo "failure";
	}
	

}


?>