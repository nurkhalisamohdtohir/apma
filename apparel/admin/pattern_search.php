<?php
include_once '../connect.php';

if(isset($_GET["term"]))
{
    $result = $conn->query("SELECT * FROM pattern WHERE Pattern_Code LIKE '%".$_GET["term"]."%' ORDER BY Pattern_Code ASC");
    $total_row = mysqli_num_rows($result); 
    $output = array();
    if($total_row > 0){
      foreach($result as $row)
      {
       $temp_array = array();
       $temp_array['value'] = $row['Pattern_ID'];
       $temp_array['label'] = '<img src="../image/'.$row['Pattern_Image'].'" width="70" />   '.$row['Pattern_Code'].'';
       $output[] = $temp_array;
      }
    }else{
      $output['value'] = '';
      $output['label'] = 'No Record Found';
    }
 echo json_encode($output);
}

?>