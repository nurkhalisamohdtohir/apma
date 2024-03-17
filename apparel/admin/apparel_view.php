<!DOCTYPE html>
<html>
<head>
    <title>Apparel | Admin</title>
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
    $Apparel_ID = $_GET['Apparel_ID'];

    $query="SELECT * FROM `apparel` a JOIN `fabric` f ON a.Fabric_ID=f.Fabric_ID JOIN `pattern` p ON  a.Pattern_ID=p.Pattern_ID WHERE Apparel_ID=$Apparel_ID";
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
            <h2><b>View Apparel</b></h2><hr>
        </div>

        <div class="form-box">
                <form role="form" action="" method="post">
                    
                    <!--<div class="form">
                        <label><b>ID : </b></label>
                        <input type="text" name="Apparel_ID" value="<?php echo "$row[Apparel_ID]"?>" readonly>
                    </div>-->

                    <div class="form">
                        <label><b>Apparel : </b></label><br>
                        <input type="text" name="Apparel_Name" value="<?php echo "$row[Apparel_Code]"?> - <?php echo "$row[Apparel_Name]"?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Fabric : </b></label>
                        <input type="text" name="Fabric_Type" value="<?php echo "$row[Fabric_Code]"?> - <?php echo "$row[Fabric_Type]"?>" readonly>
                        <td><img src="../image/<?php echo $row['Fabric_Image']; ?>" style="width:150px;"></td>
                    </div>

                    <div class="form">
                        <label><b>Pattern : </b></label>
                        <input type="text" name="Pattern_Type" value="<?php echo "$row[Pattern_Code]"?> - <?php echo "$row[Pattern_Type]"?>" readonly>
                        <td><img src="../image/<?php echo $row['Pattern_Image']; ?>" style="width:150px;"></td>
                    </div>


                    <div class="form">
                        <label><b>Price :</b></label><br>
                        <input type="text" name="Apparel_Price" value="RM <?php echo "$row[Apparel_Price]"?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Qty (P):</b></label><br>
                        <input type="text" name="Apparel_Qty" value="<?php echo "$row[Apparel_Qty]"?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Qty (RS):</b></label><br>
                        <input type="text" name="Apparel_QtyRS" value="<?php echo "$row[Apparel_QtyRS]"?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Qty (D):</b></label><br>
                        <input type="text" name="Apparel_QtyD" value="<?php echo "$row[Apparel_QtyD]"?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Image :</b></label><br>
                        <td><img src="../image/<?php echo $row['Apparel_Image']; ?>" style="width:150px;"></td>
                    </div>

                    <div class="form">
                        <label><b>QR Code :</b></label><br>
                        <td><a href="#" onClick="newWindow = window.open('https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=<?php echo $row['Apparel_ID'] ?>&choe=UTF-8&chld=M|0');"><img src='https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=<?php echo $row["Apparel_ID"] ?>&choe=UTF-8&chld=M|0'></a></td>
                    </div>
                

                    <div class="form">
                        <input type="checkbox" name="catatan" value="" checked><strong> I acknowledge that all information are correct.</strong>
                    </div>

                    <br>
                    <div class="feedback-button">
                        <a href="apparel_list.php"><button style="background-color: DodgerBlue" type='button' class="btn">BACK</button></a>
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