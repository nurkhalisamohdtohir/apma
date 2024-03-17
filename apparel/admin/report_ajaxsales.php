<?php
include '../connect.php';
$counter = 1;
$search = '';
$to = '';
$from = '';
$output = '';
$query = "";


//filter = fabric and choice = all
if( strlen($_GET['to']) != 0 && strlen($_GET['from']) != 0 && ($_GET['filter']) =='fabric' && ($_GET['choice']) =='ALL')  
{

  $to = $_GET['to'];
  $from = $_GET['from'];
  $choice = $_GET['choice'];
  $filter= $_GET['filter'];

  $query = "SELECT p.Datetime, f.Fabric_Code, f.Fabric_Type, f.Fabric_Qty, f.Fabric_Price, f.Fabric_Qty*f.Fabric_Price as totalpaid, f.Fabric_Qty*60 as totalmeter, SUM(a.Apparel_Qty*2) as totalused
            FROM `fabric` f
            LEFT JOIN `apparel` a ON f.Fabric_ID=a.Fabric_ID
            LEFT JOIN `production` p ON a.Apparel_ID=p.Apparel_ID  
            WHERE p.Datetime BETWEEN '$from' AND '$to'
            GROUP BY  a.Fabric_ID"; 
 
 $result = mysqli_query($conn, $query);

 if(mysqli_num_rows($result) > 0)
  {
   $output .= '
              <table class= "w3-table-all w3-hoverable" style="text-align: left; border: 1">
                <tr class="thead">
                    <th width="3%">No</th>
                    <th width="8%">Date </th>
                    <th width="3%">Code</th>
                    <th width="18%">Type</th>
                    <th width="10%">Total Roll</th>
                    <th width="15%">Price/Roll (RM)</th>
                    <th width="15%">Total Paid (RM)</th>
                    <th width="15%">Total Meter (m)</th>
                    <th width="16%">Total Used (m)</th>
                </tr>   
   '; 

   $totalpaid = 0; $totalmeter = 0; $totalused = 0;
   while($row1 = mysqli_fetch_array($result))
   {

    $output .= '
        <tr class="tbody">
          <td>'. $counter .'</td>


          <td>'. date("d/m/Y", strtotime( $row1['Datetime'] )) .'</td>
                    
          <td>'. $row1['Fabric_Code'] .'</td>
          
          <td>'. $row1['Fabric_Type'] .'</td>
                    
          <td>'. $row1['Fabric_Qty'] .'</td>

          <td>'. $row1['Fabric_Price'] .'</td>

          <td>'. $row1['totalpaid'] .'</td>
          
          <td>'. $row1['totalmeter'] .'</td>

          <td>'. $row1['totalused'] .'</td>

        </tr> ';
         
            $counter++;
            $totalpaid += $row1['totalpaid'];
            $totalmeter += $row1['totalmeter'];
            $totalused += $row1['totalused'];
          
    }

      $output .= '
        <tr class="tbody">
          <td colspan="6" style="color:red;background-color:#DCDCDC;">GRAND TOTAL</td>

          <td style="color:red;background-color:#DCDCDC;">' . $totalpaid . '</td>

          <td style="color:red;background-color:#DCDCDC;">' . $totalmeter . '</td>

          <td style="color:red;background-color:#DCDCDC;">' . $totalused . '</td>

        </tr> ';
      echo $output;
  }

  else
  {
  echo '<br><br><br><br>No Record Found';
  }
}

//filter = fabric and choice = ?
if( strlen($_GET['to']) != 0 && strlen($_GET['from']) != 0 && ($_GET['filter']) =='fabric' && ($_GET['choice']) !='ALL')  
{

  $to = $_GET['to'];
  $from = $_GET['from'];
  $choice = $_GET['choice'];
  $filter= $_GET['filter'];

  $query = "SELECT p.Datetime, f.Fabric_Code, f.Fabric_Type, f.Fabric_Qty, f.Fabric_Price, f.Fabric_Qty*f.Fabric_Price as totalpaid, f.Fabric_Qty*60 as totalmeter, SUM(a.Apparel_Qty*2) as totalused
            FROM `fabric` f
            LEFT JOIN `apparel` a ON f.Fabric_ID=a.Fabric_ID
            LEFT JOIN `production` p ON a.Apparel_ID=p.Apparel_ID  
            WHERE p.Datetime BETWEEN '$from' AND '$to' AND a.Fabric_ID=$choice
            GROUP BY  a.Fabric_ID"; 
 
 $result = mysqli_query($conn, $query);

 if(mysqli_num_rows($result) > 0)
  {
   $output .= '
              <table class= "w3-table-all w3-hoverable" style="text-align: left; border: 1">
                <tr class="thead">
                    <th width="3%">No</th>
                    <th width="8%">Date </th>
                    <th width="3%">Code</th>
                    <th width="18%">Type</th>
                    <th width="10%">Total Roll</th>
                    <th width="15%">Price/Roll (RM)</th>
                    <th width="15%">Total Paid (RM)</th>
                    <th width="15%">Total Meter (m)</th>
                    <th width="16%">Total Used (m)</th>
                </tr>   
   '; 

   $totalpaid = 0; $totalmeter = 0; $totalused = 0;
   while($row1 = mysqli_fetch_array($result))
   {

    $output .= '
        <tr class="tbody">
          <td>'. $counter .'</td>


          <td>'. date("d/m/Y", strtotime( $row1['Datetime'] )) .'</td>
                    
          <td>'. $row1['Fabric_Code'] .'</td>
          
          <td>'. $row1['Fabric_Type'] .'</td>
                    
          <td>'. $row1['Fabric_Qty'] .'</td>

          <td>'. $row1['Fabric_Price'] .'</td>

          <td>'. $row1['totalpaid'] .'</td>
          
          <td>'. $row1['totalmeter'] .'</td>

          <td>'. $row1['totalused'] .'</td>

        </tr> ';
         
            $counter++;
            $totalpaid += $row1['totalpaid'];
            $totalmeter += $row1['totalmeter'];
            $totalused += $row1['totalused'];
    }

      $output .= '
        <tr class="tbody">
          <td colspan="6" style="color:red;background-color:#DCDCDC;">GRAND TOTAL</td>

          <td style="color:red;background-color:#DCDCDC;">' . $totalpaid . '</td>

          <td style="color:red;background-color:#DCDCDC;">' . $totalmeter . '</td>

          <td style="color:red;background-color:#DCDCDC;">' . $totalused . '</td>

        </tr> ';
      echo $output;
  }

  else
  {
  echo '<br><br><br><br>No Record Found';
  }
}

//filter = apparel and choice = all
if( strlen($_GET['to']) != 0 && strlen($_GET['from']) != 0 && ($_GET['filter']) =='apparel' && ($_GET['choice']) =='ALL')  
{

  $to = $_GET['to'];
  $from = $_GET['from'];
  $choice = $_GET['choice'];
  $filter= $_GET['filter'];

  $query = "SELECT p.Datetime, a.Apparel_Code, a.Apparel_Name, a.Apparel_Price, a.Apparel_Qty, a.Apparel_Price*a.Apparel_Qty as totalsales
            FROM `apparel` a
            LEFT JOIN `production` p ON a.Apparel_ID=p.Apparel_ID  
            WHERE p.Datetime BETWEEN '$from' AND '$to'
            GROUP BY  a.Apparel_ID"; 
 
 $result = mysqli_query($conn, $query);

 if(mysqli_num_rows($result) > 0)
  {
   $output .= '
              <table class= "w3-table-all w3-hoverable" style="text-align: left; border: 1">
                <tr class="thead">
                    <th width="3%">No</th>
                    <th width="8%">Date </th>
                    <th width="5%">Code</th>
                    <th width="25%">Name</th>
                    <th width="18%">Price/Unit (RM)</th>
                    <th width="18%">Total Quantity</th>
                    <th width="18%">Total Sales (RM)</th>
                </tr>   
   '; 

   $totalquantity = 0; $totalsales = 0;
   while($row1 = mysqli_fetch_array($result))
   {

    $output .= '
        <tr class="tbody">
          <td>'. $counter .'</td>


          <td>'. date("d/m/Y", strtotime( $row1['Datetime'] )) .'</td>
                    
          <td>'. $row1['Apparel_Code'] .'</td>
          
          <td>'. $row1['Apparel_Name'] .'</td>
                    
          <td>'. $row1['Apparel_Price'] .'</td>

          <td>'. $row1['Apparel_Qty'] .'</td>

          <td>'. $row1['totalsales'] .'</td>

        </tr> ';
         
            $counter++;
            $totalquantity += $row1['Apparel_Qty'];
            $totalsales += $row1['totalsales'];
          
    }
      $output .= '
        <tr class="tbody">
          <td colspan="5" style="color:red;background-color:#DCDCDC;">GRAND TOTAL</td>

          <td style="color:red;background-color:#DCDCDC;">' . $totalquantity . '</td>

          <td style="color:red;background-color:#DCDCDC;">' . $totalsales . '</td>

        </tr> ';
      echo $output;
  }

  else
  {
  echo '<br><br><br><br>No Record Found';
  }
}

//filter = apparel and choice = ?
if( strlen($_GET['to']) != 0 && strlen($_GET['from']) != 0 && ($_GET['filter']) =='apparel' && ($_GET['choice']) !='ALL')  
{

  $to = $_GET['to'];
  $from = $_GET['from'];
  $choice = $_GET['choice'];
  $filter= $_GET['filter'];

  $query = "SELECT p.Datetime, a.Apparel_Code, a.Apparel_Name, a.Apparel_Price, a.Apparel_Qty, a.Apparel_Price*a.Apparel_Qty as totalsales
            FROM `apparel` a
            LEFT JOIN `production` p ON a.Apparel_ID=p.Apparel_ID  
            WHERE p.Datetime BETWEEN '$from' AND '$to' AND a.Apparel_ID=$choice
            GROUP BY  a.Apparel_ID"; 
 
 $result = mysqli_query($conn, $query);

 if(mysqli_num_rows($result) > 0)
  {
   $output .= '
              <table class= "w3-table-all w3-hoverable" style="text-align: left; border: 1">
                <tr class="thead">
                    <th width="3%">No</th>
                    <th width="8%">Date </th>
                    <th width="5%">Code</th>
                    <th width="25%">Name</th>
                    <th width="18%">Price/Unit (RM)</th>
                    <th width="18%">Total Quantity</th>
                    <th width="18%">Total Sales (RM)</th>
                </tr>   
   '; 
   $totalquantity = 0; $totalsales = 0;
   while($row1 = mysqli_fetch_array($result))
   {

    $output .= '
        <tr class="tbody">
          <td>'. $counter .'</td>


          <td>'. date("d/m/Y", strtotime( $row1['Datetime'] )) .'</td>
                    
          <td>'. $row1['Apparel_Code'] .'</td>
          
          <td>'. $row1['Apparel_Name'] .'</td>
                    
          <td>'. $row1['Apparel_Price'] .'</td>

          <td>'. $row1['Apparel_Qty'] .'</td>

          <td>'. $row1['totalsales'] .'</td>

        </tr> ';
         
            $counter++;
            $totalquantity += $row1['Apparel_Qty'];
            $totalsales += $row1['totalsales'];
    }
    
    $output .= '
        <tr class="tbody">
          <td colspan="5" style="color:red;background-color:#DCDCDC;">GRAND TOTAL</td>

          <td style="color:red;background-color:#DCDCDC;">' . $totalquantity . '</td>

          <td style="color:red;background-color:#DCDCDC;">' . $totalsales . '</td>

        </tr> ';

      echo $output;
  }

  else
  {
  echo '<br><br><br><br>No Record Found';
  }
}
?>
