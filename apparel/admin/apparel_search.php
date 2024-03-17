<?php
include_once '../connect.php';

if(isset($_GET["term"]))
{
    $result = $conn->query("SELECT * FROM apparel WHERE Apparel_ID LIKE '%".$_GET["term"]."%' ORDER BY Apparel_ID ASC");
    $total_row = mysqli_num_rows($result); 
    $output = array();
    if($total_row > 0){
      foreach($result as $row)
      {
       $temp_array = array();
       $temp_array['value'] = $row['Apparel_ID'];
       $temp_array['label'] = '<img src="../image/'.$row['Apparel_Image'].'" width="70" />   '.$row['Apparel_ID'].'';
       $output[] = $temp_array;
      }
    }else{
      $output['value'] = '';
      $output['label'] = 'No Record Found';
    }
 echo json_encode($output);
}

?>