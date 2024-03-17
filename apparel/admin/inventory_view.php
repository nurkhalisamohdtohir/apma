<!DOCTYPE html>
<html>
<head>
    <title>Inventory | Admin</title>
    <link rel="stylesheet" href="../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<?php
    include_once '../connect.php';
  include_once 'sidebar.php';

    // Getting id from url
    $Inventory_ID = $_GET['Inventory_ID'];

    $query="SELECT * FROM `inventory` i
        LEFT JOIN `apparel` a ON  i.Apparel_ID=a.Apparel_ID
        LEFT JOIN `fabric` f ON a.Fabric_ID=f.Fabric_ID 
        LEFT JOIN `pattern` p ON  a.Pattern_ID=p.Pattern_ID
        LEFT JOIN `warehouse` w ON  i.Warehouse_ID=w.Warehouse_ID
        WHERE Inventory_ID=$Inventory_ID";
    $result=mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

?>

<div id="main">
<?php
  include_once 'header.php';
?>

    <div class="w3-container"> 
        <hr>

        <div class="w3-card-4" style="width:100%;">
            <div class="w3-container">
    <center>
        <div class="title">
            <h2><b>View Inventory</b></h2><hr>
        </div>

        <div class="form-box">
                <form role="form" action="" method="post">
                    
                    <div class="form">
                            <label><b>Production :</b></label>
                            <input type="text" name="Production_ID" value="<?php echo "$row[Production_ID]"?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Apparel :</b></label>
                        <input type="text" name="Apparel_ID" value="<?php echo "$row[Apparel_Code]"?> - <?php echo "$row[Apparel_Name]"?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Warehouse :</b></label>
                        <input type="text" name="Warehouse_ID" value="<?php echo "$row[Warehouse_Location]"?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Quantity :</b></label>
                        <input type="text" name="Quantity" value="<?php echo "$row[Quantity]"?>" readonly>
                    </div>

                    <div class="form">
                        <td><input type="hidden" name="Inventory_ID" value=<?php echo $_GET['Inventory_ID'];?>></td>
                    </div>
                

                    <div class="form">
                        <input type="checkbox" name="catatan" value="" checked><strong> I acknowledge that all information are correct.</strong>
                    </div>

                    <br>
                    <div class="feedback-button">
                        <a href="inventory_list.php"><button style="background-color: DodgerBlue" type='button' class="btn">BACK</button></a>
                    </div>
                    
                </form>
            <!-- </div> -->
        </div>
        </center>
            </div>
        </div>
    </div>
    
</div>


</body>

</html>