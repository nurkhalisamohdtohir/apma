<!DOCTYPE html>
<html>
<head>
    <title>Fabric List | Admin</title>
    <link rel="stylesheet" href="../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--table-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".tbody").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>


</head>
<body>
<?php
  include_once '../connect.php';
  include_once 'sidebar.php';
?>

<div id="main">
<?php
  include_once 'header.php';
?>

    <div class="w3-container"> 
        <hr>

        <div class="w3-card-4" style="width:100%;">
            <hr>
            <a href="fabric_add.php" class="w3-button w3-circle w3-gray" style="font-size: 20px; float:right; margin-right: 50px;"><i class="fa fa-plus"></i></a><br><br><br>

            <div class="w3-container">

<center>
<content>
  <center>
    <div class="title">
      <h2><b>List of Fabric</b></h2><hr>
    </div>

    <div class="div-table">
            <table class= "w3-table-all w3-hoverable" style="text-align: left; border: 1">
              <tr><input id="search" style="width: 30%; height: 30px;font-size: 15px;" type="text" placeholder="Search.."></tr><br><br>
                <tr class="w3-light-grey">
                    <th width="4%">No</th>
                    <th width="4%">Code</th>
                    <th width="15%">Type</th>
                    <th width="6%">Quantity (Rolls)</th>
                    <th width="8%">Price/Roll (RM)</th>
                    <th width="10%">Total Meters (1roll = 60m)</th>
                    <th width="8%">Used Meters</th>
                    <th width="8%">Balance Meters</th>
                    <th width="5%">Image</th>
                    <th width="8%">QR Code</th>
                    <th width="8%">Action</th>
                </tr>   

        <?php

        $counter = 1;
        $sql="SELECT apparel.Apparel_ID, apparel.Fabric_ID, apparel.Pattern_ID, fabric.Fabric_ID, fabric.Fabric_Code, fabric.Fabric_Type, fabric.Fabric_Qty, fabric.Fabric_Price, fabric.Fabric_Total, IFNULL(SUM(apparel.Apparel_Qty*pattern.Pattern_Meter), 0) as Fabric_Used, IFNULL((fabric.Fabric_Total - SUM(apparel.Apparel_Qty*pattern.Pattern_Meter)), fabric.Fabric_Total) as Fabric_Balance, fabric.Fabric_Image
FROM fabric
LEFT JOIN apparel ON fabric.Fabric_ID=apparel.Fabric_ID
LEFT JOIN pattern ON  apparel.Pattern_ID=pattern.Pattern_ID
GROUP BY fabric.Fabric_ID, apparel.Pattern_ID
ORDER BY fabric.Fabric_ID ASC";
        $result_set=mysqli_query($conn,$sql);

        if ($result_set-> num_rows == 0)  
        {
          echo "<font size='3'>0 result</font>";
        }

        else {

        
                
            

        While($row1=mysqli_fetch_array($result_set))
        { ?>
                <tr class="tbody" id="MyTable">
                    <td><?php echo $counter; ?></td>

                    <td><?php echo $row1['Fabric_Code'] ?></td>

                    <td><?php echo $row1['Fabric_Type'] ?></td>

                    <td><?php echo $row1['Fabric_Qty'] ?></td>

                    <td>RM <?php echo $row1['Fabric_Price'] ?></td>

                    <td><?php echo $row1['Fabric_Total'] ?></td>

                    <td><?php echo $row1['Fabric_Used'] ?></td>

                    <td><?php echo $row1['Fabric_Balance'] ?></td>

                    <td><a href="../image/<?php echo $row1['Fabric_Image']; ?>" target="_blank"><img src="../image/<?php echo $row1['Fabric_Image']; ?>" style="width:50px;"></a></td>

                    <!--<td><a href="<?php echo $row1['QR_Code']; ?>" target="_blank"><img src="<?php echo $row1['QR_Code']; ?>" style="width:50px;"></a></td>-->
                    <!--<td><a href="#" onClick="newWindow = window.open('<?php echo $row1['QR_Code']; ?>'); newWindow.print();"><img src="<?php echo $row1['QR_Code']; ?>" style="width:50px;"></a></td>-->

                    <td><a href="#" onClick="newWindow = window.open('https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=<?php echo $row1['Fabric_ID'] ?>&choe=UTF-8&chld=M|0');"><img src='https://chart.googleapis.com/chart?chs=50x50&cht=qr&chl=<?php echo $row1["Fabric_ID"] ?>&choe=UTF-8&chld=M|0'></a></td>

                    <td><a href="fabric_view.php?Fabric_ID=<?php echo $row1['Fabric_ID'] ?>"><button type='button'><i class="fas fa-eye"></i></button></a> 
                    <a href="fabric_update.php?Fabric_ID=<?php echo $row1['Fabric_ID'] ?>"><button type='button'><i class="fas fa-edit"></i></button></a> 
                    <a href="fabric_delete.php?Fabric_ID=<?php echo $row1['Fabric_ID'] ?>"><button type='button'><i class="fas fa-trash"></i></button></a>   

                    </td>
                </tr>
          <?php
            $counter++;
          } 
        }

          ?> 
                
            </table>
    </div>
    <br>
    </center>
</content>
</center>

    <br><br>

            </div>

        </div>
    </div>
    
</div>


</body>

</html>