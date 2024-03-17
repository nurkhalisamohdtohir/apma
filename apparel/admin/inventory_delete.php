<?php

include_once '../connect.php';
 
    $Inventory_ID = $_GET['Inventory_ID'];
 
    $sql = "DELETE FROM inventory WHERE Inventory_ID=$Inventory_ID";
    
if (!mysqli_query($conn, $sql)) {
    die('Error: ' . mysqli_error($conn)); 
}else {?>
        <script type="text/javascript">
        alert('Inventory record is deleted!');
        window.location.href='inventory_list.php?success';
        </script> 
<?php
}
?>
   