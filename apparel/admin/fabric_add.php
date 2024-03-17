<!DOCTYPE html>
<html>
<head>
    <title>New Fabric | Admin</title>
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
?>

<div id="main">
<?php
  include_once 'header.php';

$query = "SELECT Fabric_Code FROM fabric ORDER BY Fabric_Code DESC";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
$lastid = $row['Fabric_Code'];
if(empty($lastid))
{
    $number = "F01";
}
else
{
    $idd = str_replace("F", "", $lastid);
    $id = str_pad($idd + 1, 2, 0, STR_PAD_LEFT);
    $number = 'F'.$id;
}
?>

    <div class="w3-container"> 
        <hr>

        <div class="w3-card-4" style="width:100%;">
            <div class="w3-container">
                <center>

        <div class="title">
            <h2><b>Add Fabric</b></h2><hr>
        </div>

        <div class="form-box">
            <!-- <div class="form-left"> -->
                <form role="form"  enctype="multipart/form-data" action="fabric_data.php" method="POST">

                    <div class="form">
                        <label><b>Code : </b></label>
                        <input type="text" name="Fabric_Code" value="<?php echo $number; ?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Type : </b></label><br>
                        <input type="text" name="Fabric_Type" required style="text-transform:uppercase">
                    </div>

                    <div class="form">
                        <label><b>Quantity (Rolls) : </b></label><br>
                        <input type="text" name="Fabric_Qty"  required>
                    </div>

                    <div class="form">
                        <label><b>Price/Roll (RM) : </b></label><br>
                        <input type="text" name="Fabric_Price"  required>
                    </div>

                    <div class="form">
                        <label><b>Image : </b></label><br>
                        <input type="file" id="image" name="Fabric_Image" accept="image/png, image/gif, image/jpeg, image/jpg, application/pdf" onchange="readURL(this);" required>
                        <img id="preview" src="#" style="visibility: hidden;" />
                
                    </div>

                    <br>

                    <div class="form">
                        <input type="checkbox" name="catatan" value="" required><strong> I acknowledge that all information are correct.</strong>
                    </div>

                    <br>
                    <div class="feedback-button">
                        <button style="background-color: MediumSeaGreen" type="submit" name="Submit" value="submit" class="btn">SUBMIT</button>
                        <button style="background-color: red" type="reset" class="btn">RESET</button>
                    </div>
                    
                </form>
            <!-- </div> -->
        </div>
    </center>
            </div>
        </div>
    </div>
    
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>

function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#preview').css("visibility","visible");
          $('#preview')
            .attr('src', e.target.result)
            .width(100)
            .height(100);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
</script>

</body>

</html>