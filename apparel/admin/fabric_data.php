<?php

include_once '../connect.php';

// Check If form submitted, insert form data into users table.
if(isset($_POST['Submit'])) {
    
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $date = date("d-m-Y");
    $file = $_FILES["Fabric_Image"];
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

    $Fabric_ID = $_POST['Fabric_ID'];
    $Fabric_Code = $_POST['Fabric_Code'];        
    $Fabric_Type= $_POST['Fabric_Type'];
    $Fabric_Qty = $_POST['Fabric_Qty'];
    $Fabric_Price = $_POST['Fabric_Price'];
    $Fabric_Image = $_POST['Fabric_Image'];
    $Fabric_Total = $Fabric_Qty * 60;
    $Fabric_Balance = $Fabric_Total;
    $Fabric_Used = $Fabric_Total - $Fabric_Balance;
            
    $sql = "INSERT INTO fabric (Fabric_ID, Fabric_Code, Fabric_Type, Fabric_Qty, Fabric_Price, Fabric_Total, Fabric_Used, Fabric_Balance, Fabric_Image) VALUES ('$Fabric_ID', (UPPER('$Fabric_Code')), (UPPER('$Fabric_Type')), '$Fabric_Qty', '$Fabric_Price', '$Fabric_Total', '$Fabric_Used','$Fabric_Balance', '$fileNameNew')";

    // Show message when user added
    if (!mysqli_query($conn, $sql)) 
    {
        die('Error: ' . mysqli_error($conn)); 
    }
    else 
    {

        ?>
        <script type="text/javascript">
            alert('New Fabric Record Added!');
            window.location.href='fabric_list.php?success';
        </script> 
    
<?php
    }   
}
?> 
