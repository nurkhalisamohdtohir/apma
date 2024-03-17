<!DOCTYPE html>
<html>
<head>
    <title>Warehouse | Admin</title>
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
    $Warehouse_ID = $_GET['Warehouse_ID'];

    $query ="SELECT * FROM `warehouse` WHERE Warehouse_ID=$Warehouse_ID";
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
            <h2><b>View Warehouse</b></h2><hr>
        </div>

        <div class="form-box">
                <form role="form" action="" method="post">
                    
                    <div class="form">
                            <label><b>ID :</b></label>
                            <input type="text" name="Warehouse_ID" value="<?php echo "$row[Warehouse_ID]"?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Location :</b></label>
                        <input type="text" name="Warehouse_Location" value="<?php echo "$row[Warehouse_Location]"?>" readonly>
                    </div>

                    <div class="form">
                        <td><input type="hidden" name="Warehouse_ID" value=<?php echo $_GET['Warehouse_ID'];?>></td>
                    </div>
                

                    <div class="form">
                        <input type="checkbox" name="catatan" value="" checked><strong> I acknowledge that all information are correct.</strong>
                    </div>

                    <br>
                    <div class="feedback-button">
                        <a href="warehouse_list.php"><button style="background-color: DodgerBlue" type='button' class="btn">BACK</button></a>
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