<?php
    require_once "conn.php";
	
	$Emp_ID=$_POST['Emp_ID'];
	
	$result = array();
	$result['production'] = array();
	$select= "SELECT * FROM production 
				INNER JOIN apparel ON production.Apparel_ID = apparel.Apparel_ID
				INNER JOIN fabric ON apparel.Fabric_ID = fabric.Fabric_ID
				INNER JOIN pattern ON apparel.Pattern_ID = pattern.Pattern_ID
				INNER JOIN production_process ON production.Process_ID = production_process.Process_ID
				INNER JOIN log ON production.Production_ID = log.Production_ID
				INNER JOIN employee ON log.Emp_ID = employee.Emp_ID
				WHERE log.Emp_ID = '$Emp_ID' AND employee.Emp_Dept LIKE CONCAT('%', production_process.Process_Desc ,'%') ";
	$response = mysqli_query($conn,$select);
	
	  
	while($row = mysqli_fetch_array($response))
		{
			//fetch data
			
			$index['Apparel_ID']			=$row['1'];
			$index['Production_ID']			=$row['0'];
			$index['Pattern_Code']			=$row['28'];
			$index['Fabric_Code']			=$row['18'];
			$index['Fabric_Type']			=$row['19'];
			$index['Fabric_Image']			=$row['25'];
			$index['Apparel_Code']		=$row['7'];
			$index['Apparel_Name']		=$row['8'];
			$index['Apparel_Image']		=$row['13'];
			$index['Apparel_Qty']			=$row['10'];
			$index['Production_Qty']			=$row['3'];
			$index['Process_Desc']		=$row['33'];
		
			
			
			array_push($result['production'], $index);
		}
			$result["success"]="1";
			echo json_encode($result);
			mysqli_close($conn);	
	  
	
?>
