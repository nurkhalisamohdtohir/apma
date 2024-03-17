<?php

include_once '../connect.php';

//validate if email alreaady exists
if(isset($_POST['Emp_Email']))
{
 $Emp_Email=$_POST['Emp_Email'];

 $checkdata=" SELECT Emp_Email FROM employee WHERE Emp_Email='$Emp_Email' ";

$rs = mysqli_query($conn, $checkdata);

if (mysqli_num_rows($rs) > 0)
 {
  echo "<span style='color:red'>**Email alredy exists </span>";
 }
 else
 {
  echo "";
 }
 exit();
}


//validate fabric cukup ke tak
if(isset($_POST['Apparel_Qty']))
{
 $Apparel_Qty=$_POST['Apparel_Qty'];
 $Fabric_ID=$_POST['Fabric_ID'];

 $sqlcheck="SELECT ((fabric.Fabric_Qty*60)-SUM(apparel.Apparel_Qty*2)) as totalbalance FROM apparel
        INNER JOIN fabric ON  fabric.Fabric_ID=apparel.Fabric_ID
        WHERE apparel.Fabric_ID ='$Fabric_ID'
        GROUP BY fabric.Fabric_ID";
    $result=mysqli_query($conn, $sqlcheck);
	$row = mysqli_fetch_array($result);

if ($Apparel_Qty*2 >= $row["totalbalance"])
 {
  echo "<span style='color:red'>**Fabric is not sufficient to proceed with the request. </span>";
 }
 else
 {
  echo "<span style='color:green'>**Fabric is sufficient to proceed with the request. </span>";
 }
 exit();
}

//max quantity fabric
if(isset($_POST['Fabric_ID']))
{
 $Fabric_ID=$_POST['Fabric_ID'];

 $sqlquantity="SELECT ((fabric.Fabric_Qty*60)-SUM(apparel.Apparel_Qty*2)) as totalbalance FROM apparel
        INNER JOIN fabric ON  fabric.Fabric_ID=apparel.Fabric_ID
        WHERE apparel.Fabric_ID ='$Fabric_ID'
        GROUP BY fabric.Fabric_ID";
    $result=mysqli_query($conn, $sqlquantity);
    $row = mysqli_fetch_array($result);
	
	if ($result-> num_rows == 0)  
    {
        echo "";
    }
    else
    {
    	echo $row["totalbalance"]/2;
    }

 exit();
}


//validate apparel cukup ke tak untuk distribute
if(isset($_POST['Quantity']))
{
 $Quantity=$_POST['Quantity'];
 $Apparel_ID=$_POST['Apparel_ID'];

 $sqlcheck="SELECT Apparel_QtyRS as readystock FROM apparel
        WHERE Apparel_ID ='$Apparel_ID' ";
    $result=mysqli_query($conn, $sqlcheck);
    $row = mysqli_fetch_array($result);

if ($Quantity > $row['readystock'])
 {
  echo "<span style='color:red'>**Apparel is not sufficient to proceed with the request. </span>";
 }
 else
 {
  echo "<span style='color:green'>**Apparel is sufficient to proceed with the request. </span>";
 }
 exit();
}

//max quantity apparel
if(isset($_POST['Apparel_ID']))
{
 $Apparel_ID=$_POST['Apparel_ID'];

 $sql="SELECT Apparel_QtyRS as readystock FROM apparel
        WHERE Apparel_ID ='$Apparel_ID' ";
    $result=mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    
    if ($result-> num_rows == 0)  
    {
        echo "";
    }
    else
    {
        echo $row["readystock"];
    }

 exit();
}

//show dropdown option based on production id 
if(isset($_POST['Production_ID']))
{
 $Production_ID=$_POST['Production_ID'];

 $sql="SELECT * FROM production p 
        INNER JOIN apparel a ON p.Apparel_ID=a.Apparel_ID
        WHERE Production_ID ='$Production_ID' ";
    $result=mysqli_query($conn, $sql); 

    if ($result-> num_rows == 0)  
    {
        echo "";
    }
    else
    {
        while($data= mysqli_fetch_array($result))
        {
        echo "<option disabled selected value='".$data['Apparel_ID']."'>".$data['Apparel_Code']."</option><br>";
        }
    }

 exit();
}


?>