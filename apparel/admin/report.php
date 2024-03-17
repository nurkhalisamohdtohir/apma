<!DOCTYPE html>
<html>
<head>
    <title>Report| Admin</title>
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
            <a href="process_add.php" class="w3-button w3-circle w3-gray" style="font-size: 20px; float:right; margin-right: 50px;"><i class="fa fa-plus"></i></a><br><br><br>

            <div class="w3-container">

<center>
<content>
  <center>
    <div class="title">
      <h2><b>Profit Estimation</b></h2><hr>
    </div>

    <div class="div-table">
            <table class= "w3-table-all w3-hoverable" style="text-align: left; border: 1">
                <tr class="w3-light-grey">
                    <th width="2%">No</th>
                    <th width="38%">Fabric Type</th>
                    <th width="20%">Total Roll</th>
                    <th width="20%">Total Apparel</th>
                    <th width="20%">Total Price</th>
                </tr>   

        <?php

        $counter = 1;
        $sql="SELECT *, ((Fabric_Qty*60) / 4) AS totalapparel, (Fabric_Price*Fabric_Qty)  AS total FROM fabric;";
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

                    <td><?php echo $row1['Fabric_Type'] ?></td>

                    <td><?php echo $row1['Fabric_Qty'] ?></td>

                    <td>750</td> 

                    <td>RM <?php echo $row1['total'] ?></td>  

                    </td>
                </tr>
          <?php
            $counter++;
          } 
        }

          ?> 
                
            </table><br><br>

            <table class= "w3-table-all w3-hoverable" style="text-align: left; border: 1">
                <tr class="w3-light-grey">
                    <th width="2%">No</th>
                    <th width="58%">Apparel Name</th>
                    <th width="20%">Total Quantity</th>
                    <th width="20%">Total Price</th>
                </tr>   

        <?php

        $counter = 1;
        $sql="SELECT *, Apparel_Price*Apparel_Qty  AS total FROM apparel;";
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

                    <td><?php echo $row1['Apparel_Name'] ?></td>

                    <td><?php echo $row1['Apparel_Qty'] ?></td>

                    <td>RM <?php echo $row1['total'] ?></td>  

                    </td>
                </tr>
          <?php
            $counter++;
          } 
        }

          ?> 
                
            </table><br><br>
            
            <table class= "w3-table-all w3-hoverable" style="text-align: left; border: 1">
                <tr class="w3-light-grey">
                    <th width="2%">No</th>
                    <th width="40%">Profit Estimation</th>
                </tr>   

        <?php

        $counter = 1;
        $sql="SELECT ((Apparel_Qty*Apparel_Price)-(Fabric_Qty*Fabric_Price)) AS profit
            FROM apparel 
            JOIN fabric ON apparel.Fabric_ID = fabric.Fabric_ID;";
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

                    <td>RM <?php echo $row1['profit'] ?></td> 
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