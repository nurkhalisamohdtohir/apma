<?php

include_once '../connect.php';

$sql="SELECT * FROM production 
		JOIN apparel ON production.Apparel_ID = apparel.Apparel_ID 
		JOIN production_process ON production.Process_ID = production_process.Process_ID
		INNER JOIN log ON production.Production_ID = log.Production_ID  
		WHERE production.Production_Qty=apparel.Apparel_Qty AND production.Process_ID=log.Production_Desc AND production.Process_ID <= 4";

$sql2="SELECT * FROM production 
		JOIN apparel ON production.Apparel_ID = apparel.Apparel_ID 
		JOIN log ON production.Production_ID = log.Production_ID 
		WHERE production.Production_Qty=apparel.Apparel_Qty AND production.Process_ID = 5 AND log.Production_Desc = 5";

$result=mysqli_query($conn, $sql);
$result2=mysqli_query($conn, $sql2);

$response='';
$subject= "Production Status Alert";
while($row=mysqli_fetch_array($result2)) {
	$response = $response .  
	"<div class='notifi-item'><div class='text'><h4>" . " Production ID : " . $row["Production_ID"]  . " has finished overall production process & reached the target quantity : " . $row["Production_Qty"]  . "</h4>
	<h5>" . date("d/m/Y", strtotime(date($row['Datetime'])))  . "</h5></div></div>";
}
while($row=mysqli_fetch_array($result)) {
	$response = $response .  
	"<div class='notifi-item'><div class='text'><h4>" . " Production ID : " . $row["Production_ID"]  . " has finished " . $row["Process_Desc"]  . " & reached the target quantity : " . $row["Production_Qty"]  . "</h4><h5>" . date("d/m/Y", strtotime(date($row['Datetime'])))  . "</h5></div></div>";
}
if(!empty($response)) {
	print $response;
}
?>
   