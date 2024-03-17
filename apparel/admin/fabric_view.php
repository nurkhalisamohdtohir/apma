<!DOCTYPE html>
<html>
<head>
    <title>Fabric | Admin</title>
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
    $Fabric_ID = $_GET['Fabric_ID'];

    $query ="SELECT * FROM fabric WHERE Fabric_ID=$Fabric_ID";
    $result=mysqli_query($conn, $query);
    if (!mysqli_query($conn, $query)) 
    {
        die('Error: ' . mysqli_error($conn)); 
    }
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
            <h2><b>View Fabric</b></h2><hr>
        </div>

        <div class="form-box">
                <form role="form" action="" method="post">
                    
                    <div class="form">
                            <label><b>Code :</b></label>
                            <input type="text" name="Fabric_Code" value="<?php echo "$row[Fabric_Code]"?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Type :</b></label>
                        <input type="text" name="Fabric_Type" value="<?php echo "$row[Fabric_Type]"?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Quantity (Rolls) :</b></label>
                        <input type="text" name="Fabric_Qty" value="<?php echo "$row[Fabric_Qty]"?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Price/Roll (RM) :</b></label>
                        <input type="text" name="Fabric_Price" value="RM <?php echo "$row[Fabric_Price]"?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Image :</b></label><br>
                        <td><img src="../image/<?php echo $row['Fabric_Image']; ?>" style="width:150px;"></td>
                    </div>

                    <div class="form">
                        <label><b>QR Code :</b></label><br>
                        <td><a href="#" onClick="newWindow = window.open('https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=<?php echo $row['Fabric_ID'] ?>&choe=UTF-8&chld=M|0');"><img src='https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=<?php echo $row["Fabric_ID"] ?>&choe=UTF-8&chld=M|0'></a></td>
                    </div>

                    <div class="form">
                        <td><input type="hidden" name="Fabric_ID" value=<?php echo $_GET['Fabric_ID'];?>></td>
                    </div>
                

                    <div class="form">
                        <input type="checkbox" name="catatan" value="" checked><strong> I acknowledge that all information are correct.</strong>
                    </div>

                    <br>
                    <div class="feedback-button">
                        <a href="fabric_list.php"><button style="background-color: DodgerBlue" type='button' class="btn">BACK</button></a>
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