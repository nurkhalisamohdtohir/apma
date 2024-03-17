<?php

include_once '../connect.php';
 
    $Warehouse_ID = $_GET['Warehouse_ID'];
 
    $sql = "DELETE FROM warehouse WHERE Warehouse_ID=$Warehouse_ID";
    
if (!mysqli_query($conn, $sql)) {
    die('Error: ' . mysqli_error($conn)); 
}else {?>
        <script type="text/javascript">
        alert('Warehouse record is deleted!');
        window.location.href='warehouse_list.php?success';
        </script> 
<?php
}
?>
   