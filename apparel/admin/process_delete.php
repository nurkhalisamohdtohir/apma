<?php

include_once '../connect.php';
 
    $Process_ID = $_GET['Process_ID'];
 
    $sql = "DELETE FROM production_process WHERE Process_ID=$Process_ID";
    
if (!mysqli_query($conn, $sql)) {
    die('Error: ' . mysqli_error($conn)); 
}else {?>
        <script type="text/javascript">
        alert('Production Process record is deleted!');
        window.location.href='process_list.php?success';
        </script> 
<?php
}
?>
   