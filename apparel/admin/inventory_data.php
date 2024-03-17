<?php

include_once '../connect.php';

// Check If form submitted, insert form data into users table.
if(isset($_POST['Submit'])) {
	$Inventory_ID = $_POST['Inventory_ID'];
	$Production_ID = $_POST['Production_ID'];
	$Apparel_ID = '01';
    $Warehouse_ID= $_POST['Warehouse_ID'];
    $Quantity= $_POST['Quantity'];


    //check quantity inventory yang diupdate tak boleh lebih dari yang available 
    $sqlcheck="SELECT Apparel_QtyRS as readystock FROM apparel
        WHERE Apparel_ID ='$Apparel_ID' ";
    $result=mysqli_query($conn, $sqlcheck);
	$row = mysqli_fetch_array($result);
	if ($Quantity > $row['readystock']) {
		echo "<script type='text/javascript'>
			alert('Request is unsuccessful! Apparel is not enough.');
	        window.location.href='inventory_add.php';
			</script>";
	}
	else
	{
		// Insert inventory data into table
		$sql = "INSERT INTO inventory (Inventory_ID, Production_ID, Apparel_ID, Warehouse_ID, Quantity) VALUES ('$Inventory_ID','$Production_ID', '$Apparel_ID', '$Warehouse_ID', '$Quantity')";

		if (!mysqli_query($conn, $sql)) 
		{
    		die('Error: ' . mysqli_error($conn)); 
		}

		// update ready stock quantity and distribution quantity setiap kali new insert 
		$sql2 = "UPDATE apparel
            SET apparel.Apparel_QtyD = (SELECT SUM(inventory.Quantity) 
                                        FROM inventory
                                        WHERE Apparel_ID=$Apparel_ID), 
            apparel.Apparel_QtyRS = Apparel_Qty - (SELECT SUM(inventory.Quantity) 
                                                    FROM inventory
                                                    WHERE Apparel_ID=$Apparel_ID)            
            WHERE Apparel_ID=$Apparel_ID";

		if (!mysqli_query($conn, $sql2)) 
		{
    		die('Error: ' . mysqli_error($conn)); 
		}

		else 
		{
			echo "<script type='text/javascript'>
				alert('New Inventory Record Added!');
        		window.location.href='inventory_list.php?success';
			</script>";

		}

	}

	
}
?>   