<!DOCTYPE html>
<html>
<head>
    <title>Inventory List | Admin</title>
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
            <a href="inventory_add.php" class="w3-button w3-circle w3-gray" style="font-size: 20px; float:right; margin-right: 50px;"><i class="fa fa-plus"></i></a><br><br><br>

            <div class="w3-container">

<center>
<content>
  <center>
    <div class="title">
      <h2><b>List of Inventory</b></h2><hr>
    </div>

    <div class="div-table">
            <table class= "w3-table-all w3-hoverable" style="text-align: left; border: 1">
              <tr><input id="search" style="width: 30%; height: 30px;font-size: 15px;" type="text" placeholder="Search.."></tr><br><br>
                <tr class="w3-light-grey">
                    <th width="2%">No</th>
                    <th width="4%">Production</th>
                    <th width="4%">Apparel</th>
                    <th width="4%">Fabric</th>
                    <th width="4%">Pattern</th>
                    <th width="5%">Image</th>
                    <th width="10%">Warehouse</th>
                    <th width="4%">Quantity</th>
                    <th width="8%">Action</th>
                </tr>   

        <?php

        $counter = 1;
        $sql="SELECT * FROM `inventory` i
        LEFT JOIN `apparel` a ON  i.Apparel_ID=a.Apparel_ID
        LEFT JOIN `fabric` f ON a.Fabric_ID=f.Fabric_ID 
        LEFT JOIN `pattern` p ON  a.Pattern_ID=p.Pattern_ID
        LEFT JOIN `warehouse` w ON  i.Warehouse_ID=w.Warehouse_ID";
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

                    <td><?php echo $row1['Production_ID'] ?></td>

                    <td><a href="apparel_view.php?Apparel_ID=<?php echo $row1['Apparel_ID'] ?>" target="_blank"><?php echo $row1['Apparel_Code'] ?></a></td>

                    <td><a href="fabric_view.php?Fabric_ID=<?php echo $row1['Fabric_ID'] ?>" target="_blank"><?php echo $row1['Fabric_Code'] ?></a></td>

                    <td><a href="pattern_view.php?Pattern_ID=<?php echo $row1['Pattern_ID'] ?>" target="_blank"><?php echo $row1['Pattern_Code'] ?></a></td>

                    <td><a href="../image/<?php echo $row1['Apparel_Image']; ?>" target="_blank"><img src="../image/<?php echo $row1['Apparel_Image']; ?>" style="width:50px;"></a></td>

                    <td><a href="warehouse_view.php?Warehouse_ID=<?php echo $row1['Warehouse_ID'] ?>" target="_blank"><?php echo $row1['Warehouse_Location'] ?></a></td>

                    <td><?php echo $row1['Quantity'] ?></td>


                    <td><a href="inventory_view.php?Inventory_ID=<?php echo $row1['Inventory_ID'] ?>"><button type='button'><i class="fas fa-eye"></i></button></a> 
                    <a href="inventory_update.php?Inventory_ID=<?php echo $row1['Inventory_ID'] ?>"><button type='button'><i class="fas fa-edit"></i></button></a> 
                    <a href="inventory_delete.php?Inventory_ID=<?php echo $row1['Inventory_ID'] ?>"><button type='button'><i class="fas fa-trash"></i></button></a>   

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