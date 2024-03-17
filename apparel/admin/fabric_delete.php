<?php

include_once '../connect.php';
 
    $Fabric_ID = $_GET['Fabric_ID'];
 
    $sql = "DELETE FROM fabric WHERE Fabric_ID=$Fabric_ID";
    
if (!mysqli_query($conn, $sql)) {
    die('Error: ' . mysqli_error($conn)); 
}else {?>
        <script type="text/javascript">
        alert('Fabric record is deleted!');
        window.location.href='fabric_list.php?success';
        </script> 
<?php
}
?>
   