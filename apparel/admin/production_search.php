<?php
include_once '../connect.php';

if(isset($_GET["term"]))
{
    $result = $conn->query("SELECT * FROM production WHERE Process_ID = 5 AND Production_ID LIKE '%".$_GET["term"]."%' ORDER BY Production_ID ASC");
    $total_row = mysqli_num_rows($result); 
    $output = array();
    if($total_row > 0){
      foreach($result as $row)
      {
       $temp_array = array();
       $temp_array['value'] = $row['Production_ID'];
       $temp_array['label'] = ''.$row['Production_ID'].'';
       $output[] = $temp_array;
      }
    }else{
      $output['value'] = '';
      $output['label'] = 'No Record Found';
    }
 echo json_encode($output);
}

?>