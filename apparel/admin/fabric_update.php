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

    $query ="SELECT * FROM `fabric` WHERE Fabric_ID=$Fabric_ID";
    $result=mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);


if(isset($_POST['Update'])) {

    $Fabric_ID = $_POST['Fabric_ID'];
    $Fabric_Type= $_POST['Fabric_Type'];
    $Fabric_Qty= $_POST['Fabric_Qty'];
    $Fabric_Price= $_POST['Fabric_Price'];
    $Fabric_Code = $_POST['Fabric_Code'];
    $Fabric_Total = $Fabric_Qty * 60;
    $Fabric_Balance = $Fabric_Total - $Fabric_Used;
    $Fabric_Used = $_POST['Fabric_Used'];

    date_default_timezone_set("Asia/Kuala_Lumpur");
    $date = date("d-m-Y");
    $file = $_FILES["Fabric_Image"];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['name'];
    $fileError = $file['error'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $fileNameNew = $date."_".$fileName ;
    $fileDestination = '../image/'.$fileNameNew;
    move_uploaded_file($fileTmpName, $fileDestination);

    //UPDATE EVERY COLUMN


    // Insert user data into table
    $sql = "UPDATE fabric SET Fabric_ID='$Fabric_ID',Fabric_Code='$Fabric_Code', Fabric_Type=(UPPER('$Fabric_Type')), Fabric_Qty='$Fabric_Qty', Fabric_Price='$Fabric_Price', Fabric_Total='$Fabric_Total', Fabric_Balance='$Fabric_Balance', Fabric_Used='$Fabric_Used', Fabric_Image='$fileNameNew' WHERE Fabric_ID=$Fabric_ID";

    // Show message when user added
    if (!mysqli_query($conn, $sql)) 
    {
        die('Error: ' . mysqli_error($conn)); 
    }
    else 
    {
?>

<script type="text/javascript">
            alert('Fabric record is updated!');
            window.location.href='fabric_list.php?success';
        </script> 
    
<?php
    }   
}
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
            <h2><b>Update Fabric</b></h2><hr>
        </div>

        <div class="form-box">
                <form role="form" enctype="multipart/form-data" action="" method="post">
                    
                    <div class="form">
                            <label><b>Code :</b></label>
                            <input type="text" name="Fabric_Code" value="<?php echo "$row[Fabric_Code]"?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Type :</b></label>
                        <input type="text" name="Fabric_Type" value="<?php echo "$row[Fabric_Type]"?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Quantity (Rolls) :</b></label><br>
                        <input type="text" name="Fabric_Qty" value="<?php echo "$row[Fabric_Qty]"?>"  required>
                    </div>

                    <div class="form">
                        <label><b>Price/Roll (RM) :</b></label><br>
                        <input type="text" name="Fabric_Price" value="<?php echo "$row[Fabric_Price]"?>"  required>
                    </div>

                    <div class="form">
                        <label><b>Image :</b></label><br>
                        <input type="file" id="image" name="Fabric_Image" accept="image/png, image/gif, image/jpeg, image/jpg, application/pdf" onchange="readURL(this);" required>
                        <img id="preview" src="#" style="visibility: hidden;" />
                    </div>

                    <div class="form">
                        <td><input type="hidden" name="Fabric_ID" value=<?php echo $_GET['Fabric_ID'];?>></td>
                    </div>
                

                    <div class="form">
                        <input type="checkbox" name="catatan" value="" checked><strong> I acknowledge that all information are correct.</strong>
                    </div>

                    <br>
                    <div class="feedback-button">
                        <button style="background-color: MediumSeaGreen" onClick="return confirm('Are you sure you want to update this record?')" type="submit" name="Update" value="Update" class="btn">UPDATE</button>
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