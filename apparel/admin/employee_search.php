<?php
include_once '../connect.php';

if(isset($_GET["term"]))
{
    $result = $conn->query("SELECT * FROM employee WHERE Emp_ID LIKE '%".$_GET["term"]."%' ORDER BY Emp_ID ASC");
    $total_row = mysqli_num_rows($result); 
    $output = array();
    if($total_row > 0){
      foreach($result as $row)
      {
       $temp_array = array();
       $temp_array['value'] = $row['Emp_ID'];
       $temp_array['label'] = ''.$row['Emp_ID'].'   '.$row['Emp_Name'].'';
       $output[] = $temp_array;
      }
    }else{
      $output['value'] = '';
      $output['label'] = 'No Record Found';
    }
 echo json_encode($output);
}

?>