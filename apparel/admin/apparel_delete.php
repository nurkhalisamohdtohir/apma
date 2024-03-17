<?php

include_once '../connect.php';
 
    $Apparel_ID = $_GET['Apparel_ID'];
 
    $sql = "DELETE FROM apparel WHERE Apparel_ID=$Apparel_ID";
    
if (!mysqli_query($conn, $sql)) {
    die('Error: ' . mysqli_error($conn)); 
}else {?>
        <script type="text/javascript">
        alert('Apparel record is deleted!');
        window.location.href='apparel_list.php?success';
        </script> 
<?php
}
?>
   