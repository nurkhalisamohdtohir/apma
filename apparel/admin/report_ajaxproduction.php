<?php
include '../connect.php';
$counter = 1;
$search = '';
$to = '';
$from = '';
$output = '';
$query = "";


//filter = all and choice = all
if( strlen($_GET['to']) != 0 && strlen($_GET['from']) != 0 && ($_GET['filter']) =='ALL' && ($_GET['choice']) =='ALL')  
{

  $to = $_GET['to'];
  $from = $_GET['from'];
  $choice = $_GET['choice'];
  $filter= $_GET['filter'];

  $query = "SELECT *
            FROM `apparel`
            LEFT JOIN `production` ON apparel.Apparel_ID=production.Apparel_ID
            LEFT JOIN production_process ON production.Process_ID=production_process.Process_ID
            LEFT JOIN `log` ON log.Production_ID=production.Production_ID 
            LEFT JOIN `fabric` ON apparel.Fabric_ID=fabric.Fabric_ID 
            LEFT JOIN `pattern` ON  apparel.Pattern_ID=pattern.Pattern_ID 
            WHERE log.Datetime BETWEEN '$from' AND '$to'
            GROUP BY  apparel.Apparel_ID"; 
 
 $result = mysqli_query($conn, $query);

 if(mysqli_num_rows($result) > 0)
  {
   $output .= '
              <table class= "w3-table-all w3-hoverable" style="text-align: left; border: 1">
                <tr class="thead">
                    <th width="3%">No</th>
                    <th width="10%">Date </th>
                    <th width="3%">ProducionID</th>
                    <th width="23%">Pattern</th>
                    <th width="15%">Fabric Type</th>
                    <th width="25%">Apparel Name</th>
                    <th width="3%">Qty(P)</th>
                    <th width="3%">Qty(RS)</th>
                    <th width="15%">Status</th>
                </tr>   
   '; 

   $totalp = 0; $totalrs = 0;
   while($row1 = mysqli_fetch_array($result))
   {

    $output .= '
        <tr class="tbody">
          <td>'. $counter .'</td>

          <td>'. date("d/m/Y", strtotime( $row1['Datetime'] )) .'</td>

          <td>'. $row1['Production_ID'] .'</td>
                    
          <td>'. $row1['Pattern_Type'] .'</td>
          
          <td>'. $row1['Fabric_Type'] .'</td>
                    
          <td>'. $row1['Apparel_Name'] .'</td>

          <td>'. $row1['Apparel_Qty'] .'</td>

          <td>'. $row1['Apparel_QtyRS'] .'</td>
          
          <td>'. $row1['Process_Desc'] .'</td>

        </tr> ';
         
            $counter++;
            $totalp += $row1['Apparel_Qty'];
            $totalrs += $row1['Apparel_QtyRS'];
    }

      $output .= '
        <tr class="tbody">
          <td colspan="6" style="color:red;background-color:#DCDCDC;">GRAND TOTAL</td>

          <td style="color:red;background-color:#DCDCDC;">' . $totalp . '</td>

          <td colspan="2" style="color:red;background-color:#DCDCDC;">' . $totalrs . '</td>

        </tr> ';
      echo $output;
  }

  else
  {
  echo '<br><br><br><br>No Record Found';
  }
}


//filter = production_process and choice = ?
if( strlen($_GET['to']) != 0 && strlen($_GET['from']) != 0 && ($_GET['filter']) =='production_process' )  
{

  $to = $_GET['to'];
  $from = $_GET['from'];
  $choice = $_GET['choice'];
  $filter= $_GET['filter'];

  $query = "SELECT * 
            FROM `apparel`
            LEFT JOIN `production` ON apparel.Apparel_ID=production.Apparel_ID
            LEFT JOIN production_process ON production.Process_ID=production_process.Process_ID
            LEFT JOIN `log` ON log.Production_ID=production.Production_ID 
            LEFT JOIN `fabric` ON apparel.Fabric_ID=fabric.Fabric_ID 
            LEFT JOIN `pattern` ON  apparel.Pattern_ID=pattern.Pattern_ID 
            WHERE log.Datetime BETWEEN '$from' AND '$to' AND production.Process_ID=$choice
            GROUP BY  apparel.Apparel_ID"; 
 
 $result = mysqli_query($conn, $query);

 if(mysqli_num_rows($result) > 0)
  {
   $output .= '
              <table class= "w3-table-all w3-hoverable" style="text-align: left; border: 1">
                <tr class="thead">
                    <th width="3%">No</th>
                    <th width="10%">Date </th>
                    <th width="3%">ProducionID</th>
                    <th width="15%">Pattern</th>
                    <th width="15%">Fabric Type</th>
                    <th width="15%">Apparel Name</th>
                    <th width="3%">Qty(P)</th>
                    <th width="3%">Qty(RS)</th>
                    <th width="15%">Status</th>
                </tr>   
   '; 

   $totalp = 0; $totalrs = 0;
   while($row1 = mysqli_fetch_array($result))
   {

    $output .= '
        <tr class="tbody">
        <td>'. $counter .'</td>
          <td>'. date("d/m/Y", strtotime( $row1['Datetime'] )) .'</td>

          <td>'. $row1['Production_ID'] .'</td>
                    
          <td>'. $row1['Pattern_Type'] .'</td>
          
          <td>'. $row1['Fabric_Type'] .'</td>
                    
          <td>'. $row1['Apparel_Name'] .'</td>

          <td>'. $row1['Apparel_Qty'] .'</td>

          <td>'. $row1['Apparel_QtyRS'] .'</td>
          
          <td>'. $row1['Process_Desc'] .'</td>

        </tr> ';
         
            $counter++;
            $totalp += $row1['Apparel_Qty'];
            $totalrs += $row1['Apparel_QtyRS'];
          
        }


        $output .= '
        <tr class="tbody">
          <td colspan="6" style="color:red;background-color:#DCDCDC;">GRAND TOTAL</td>

          <td style="color:red;background-color:#DCDCDC;">' . $totalp . '</td>

          <td colspan="2" style="color:red;background-color:#DCDCDC;">' . $totalrs . '</td>

        </tr> ';
      echo $output;
  }

  else
  {
  echo '<br><br><br><br>No Record Found';
  }
}


//filter = pattern and choice = ?
if( strlen($_GET['to']) != 0 && strlen($_GET['from']) != 0 && ($_GET['filter']) =='pattern' )  
{

  $to = $_GET['to'];
  $from = $_GET['from'];
  $choice = $_GET['choice'];
  $filter= $_GET['filter'];

  $query = "SELECT *
            FROM `apparel`
            LEFT JOIN `production` ON apparel.Apparel_ID=production.Apparel_ID
            LEFT JOIN `log` ON log.Production_ID=production.Production_ID 
            LEFT JOIN `pattern` ON  apparel.Pattern_ID=pattern.Pattern_ID 
            WHERE log.Datetime BETWEEN '$from' AND '$to' AND apparel.Pattern_ID=$choice
            GROUP BY  apparel.Pattern_ID"; 
 
 $result = mysqli_query($conn, $query);

 if(mysqli_num_rows($result) > 0)
  {
   $output .= '
              <table class= "w3-table-all w3-hoverable" style="text-align: left; border: 1">
                <tr class="thead">
                  <th width="3%">No </th>
                    <th width="10%">Date </th>
                    <th width="10%">Pattern Code </th>
                    <th width="23%">Pattern Type</th>
                    <th width="25%">Apparel Name</th>
                    <th width="10%">Total Quantity</th>
                </tr>   
   '; 

   $totalq = 0;
   while($row1 = mysqli_fetch_array($result))
   {

    $output .= '
        <tr class="tbody">
        <td>'. $counter .'</td>

          <td>'. date("d/m/Y", strtotime( $row1['Datetime'] )) .'</td>

          <td>'. $row1['Pattern_Code'] .'</td>
                    
          <td>'. $row1['Pattern_Type'] .'</td>
                    
          <td>'. $row1['Apparel_Name'] .'</td>

          <td>'. $row1['Apparel_Qty'] .'</td>

        </tr> ';
         
            $counter++;
            $totalq += $row1['Apparel_Qty'];
        }


        $output .= '
        <tr class="tbody">
          <td colspan="5" style="color:red;background-color:#DCDCDC;">GRAND TOTAL</td>

          <td style="color:red;background-color:#DCDCDC;">' . $totalq . '</td>

        </tr> ';
      echo $output;
  }

  else
  {
  echo '<br><br><br><br>No Record Found';
  }
}

//filter = fabric and choice = ?
if( strlen($_GET['to']) != 0 && strlen($_GET['from']) != 0 && ($_GET['filter']) =='fabric' )  
{

  $to = $_GET['to'];
  $from = $_GET['from'];
  $choice = $_GET['choice'];
  $filter= $_GET['filter'];

  $query = "SELECT p.Datetime, f.Fabric_Code, f.Fabric_Type, a.Apparel_Name, f.Fabric_Qty*60 as totalmeter, SUM(a.Apparel_Qty*2) as totalused
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
                  <th width="3%">No </th>
                    <th width="10%">Date </th>
                    <th width="10%">Fabric Code </th>
                    <th width="23%">Fabric Type</th>
                    <th width="25%">Apparel Name</th>
                    <th width="10%">Total meter(m)</th>
                    <th width="10%">Total used(m)</th>
                </tr>   
   '; 

   $totalmeter = 0; $totalused = 0;
   while($row1 = mysqli_fetch_array($result))
   {

    $output .= '
        <tr class="tbody">
        <td>'. $counter .'</td>

          <td>'. date("d/m/Y", strtotime( $row1['Datetime'] )) .'</td>

          <td>'. $row1['Fabric_Code'] .'</td>
                    
          <td>'. $row1['Fabric_Type'] .'</td>
                    
          <td>'. $row1['Apparel_Name'] .'</td>

          <td>'. $row1['totalmeter'] .'</td>

          <td>'. $row1['totalused'] .'</td>

        </tr> ';
         
            $counter++;
            $totalmeter += $row1['totalmeter'];
            $totalused += $row1['totalused'];
        }


        $output .= '
        <tr class="tbody">
          <td colspan="5" style="color:red;background-color:#DCDCDC;">GRAND TOTAL</td>

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

//filter = apparel and choice = ?
if( strlen($_GET['to']) != 0 && strlen($_GET['from']) != 0 && ($_GET['filter']) =='apparel' )  
{

  $to = $_GET['to'];
  $from = $_GET['from'];
  $choice = $_GET['choice'];
  $filter= $_GET['filter'];

  $query = "SELECT p.Datetime, a.Apparel_Code, a.Apparel_Name, SUM(a.Apparel_Qty) as totalquantity
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
                  <th width="3%">No </th>
                    <th width="10%">Date </th>
                    <th width="10%">Apparel Code </th>
                    <th width="25%">Apparel Name</th>
                    <th width="10%">Total Quantity</th>
                </tr>   
   '; 

   $totalquantity = 0;
   while($row1 = mysqli_fetch_array($result))
   {

    $output .= '
        <tr class="tbody">
        <td>'. $counter .'</td>

          <td>'. date("d/m/Y", strtotime( $row1['Datetime'] )) .'</td>

          <td>'. $row1['Apparel_Code'] .'</td>
                    
          <td>'. $row1['Apparel_Name'] .'</td>

          <td>'. $row1['totalquantity'] .'</td>

        </tr> ';
         
            $counter++;
            $totalquantity += $row1['totalquantity'];
        }

        $output .= '
        <tr class="tbody">
          <td colspan="4" style="color:red;background-color:#DCDCDC;">GRAND TOTAL</td>

          <td style="color:red;background-color:#DCDCDC;">' . $totalquantity . '</td>

        </tr> ';
      echo $output;
  }

  else
  {
  echo '<br><br><br><br>No Record Found';
  }
}
?>
