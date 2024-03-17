<?php

include_once '../connect.php';
 
    $Pattern_ID = $_GET['Pattern_ID'];
 
    $sql = "DELETE FROM pattern WHERE Pattern_ID=$Pattern_ID";
    
if (!mysqli_query($conn, $sql)) {
    die('Error: ' . mysqli_error($conn)); 
}else {?>
        <script type="text/javascript">
        alert('Pattern record is deleted!');
        window.location.href='pattern_list.php?success';
        </script> 
<?php
}
?>
   