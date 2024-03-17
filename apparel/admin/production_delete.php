<?php

include_once '../connect.php';
 
    $Production_ID = $_GET['Production_ID'];
 
    $sql = "DELETE FROM production WHERE Production_ID=$Production_ID";
    
if (!mysqli_query($conn, $sql)) {
    die('Error: ' . mysqli_error($conn)); 
}else {?>
        <script type="text/javascript">
        alert('Production record is deleted!');
        window.location.href='production_list.php?success';
        </script> 
<?php
}
?>
   