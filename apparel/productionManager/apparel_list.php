<!DOCTYPE html>
<html>
<head>
    <title>Apparel List </title>
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


            <div class="w3-container">

<center>
<content>
  <center>
    <div class="title">
      <h2><b>List of Apparel</b></h2><hr>
    </div>

    <div class="div-table">
            <table class= "w3-table-all w3-hoverable" style="text-align: left; border: 1">
              <tr><input id="search" style="width: 30%; height: 30px;font-size: 15px;" type="text" placeholder="Search.."></tr><br><br>
                <tr class="w3-light-grey">
                    <th width="2%">No</th>
                    <th width="4%">Code</th>
                    <th width="25%">Name</th>
                    <th width="5%">Fabric</th>
                    <th width="5%">Pattern</th>
                    <th width="8%">Price</th>
                    <th width="5%">Qty(P)</th>
                    <th width="5%">Qty(RS)</th>
                    <th width="5%">Qty(D)</th>
                    <th width="8%">Image</th>
                    <th width="8%">QR Code</th>
                    <th width="15%">Action</th>
                </tr>   

        <?php

        $counter = 1;
        $sql="SELECT * , apparel.Apparel_QtyD = (SELECT SUM(inventory.Quantity) 
                                        FROM inventory
                                        WHERE apparel.Apparel_ID=inventory.Apparel_ID), 
            apparel.Apparel_QtyRS = apparel.Apparel_Qty - (SELECT SUM(inventory.Quantity) 
                                                    FROM inventory
                                                    WHERE apparel.Apparel_ID=inventory.Apparel_ID)
            FROM `apparel`
            LEFT JOIN `production` ON apparel.Apparel_ID=production.Apparel_ID 
            LEFT JOIN `fabric` ON apparel.Fabric_ID=fabric.Fabric_ID 
            LEFT JOIN `pattern` ON  apparel.Pattern_ID=pattern.Pattern_ID";
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

                    <td><?php echo $row1['Apparel_Code'] ?></td>

                    <td><?php echo $row1['Apparel_Name'] ?></td>

                    <td><a href="fabric_view.php?Fabric_ID=<?php echo $row1['Fabric_ID'] ?>" target="_blank"><?php echo $row1['Fabric_Code'] ?></a></td>

                    <td><a href="pattern_view.php?Pattern_ID=<?php echo $row1['Pattern_ID'] ?>" target="_blank"><?php echo $row1['Pattern_Code'] ?></a></td>

                    <td>RM <?php echo $row1['Apparel_Price'] ?></td>

                    <td><?php echo $row1['Apparel_Qty'] ?></td>

                    <td><?php echo $row1['Apparel_QtyRS'] ?></td>

                    <td><?php echo $row1['Apparel_QtyD'] ?></td>
                    <!--<td><?php echo $row1['Production_Qty'] ?></td>-->

                    <td><a href="../image/<?php echo $row1['Apparel_Image']; ?>" target="_blank"><img src="../image/<?php echo $row1['Apparel_Image']; ?>" style="width:50px;"></a></td>

                    <!--<td><a href="<?php echo $row1['QR_Code']; ?>" target="_blank"><img src="<?php echo $row1['QR_Code']; ?>" style="width:50px;"></a></td>-->
                    <!--<td><a href="#" onClick="newWindow = window.open('<?php echo $row1['QR_Code']; ?>'); newWindow.print();"><img src="<?php echo $row1['QR_Code']; ?>" style="width:50px;"></a></td>-->

                    <td><a href="#" onClick="newWindow = window.open('https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl={Apparel_ID:<?php echo $row1['Apparel_ID'] ?>,Production_ID:<?php echo $row1['Production_ID'] ?>,Apparel_Code:<?php echo $row1['Apparel_Code'] ?>,Apparel_Qty:<?php echo $row1['Apparel_Qty'] ?>}&choe=UTF-8&chld=M|0');">

                        <img src='https://chart.googleapis.com/chart?chs=50x50&cht=qr&chl={Apparel_ID:<?php echo $row1["Apparel_ID"] ?>,Production_ID:<?php echo $row1["Production_ID"] ?>,Apparel_Code:<?php echo $row1["Apparel_Code"] ?>,Apparel_Qty:<?php echo $row1["Apparel_Qty"] ?>}&choe=UTF-8&chld=M|0'></a>
                    </td>

                    <td><a href="apparel_view.php?Apparel_ID=<?php echo $row1['Apparel_ID'] ?>"><button type='button'><i class="fas fa-eye"></i></button></a>   

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