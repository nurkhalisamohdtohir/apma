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
    $query="SELECT * FROM `apparel` 
    JOIN `fabric` ON apparel.Fabric_ID=fabric.Fabric_ID 
    JOIN `pattern` ON  apparel.Pattern_ID=pattern.Pattern_ID  
    WHERE Apparel_ID=$Apparel_ID";
    $result=mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);


if(isset($_POST['Update'])) {

    $Apparel_ID = $_POST['Apparel_ID'];
    $Apparel_Qty= $_POST['Apparel_Qty'];
    $Apparel_QtyRS= $_POST['Apparel_QtyRS'];
    $Apparel_Price= $_POST['Apparel_Price'];

    date_default_timezone_set("Asia/Kuala_Lumpur");
    $date = date("d-m-Y");
    $file = $_FILES["Apparel_Image"];
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
    $sql = "UPDATE apparel SET Apparel_ID='$Apparel_ID', Apparel_Qty='$Apparel_Qty',Apparel_QtyRS='$Apparel_QtyRS', Apparel_Price='$Apparel_Price', Apparel_Image='$fileNameNew' WHERE Apparel_ID=$Apparel_ID";

    // Show message when user added
    if (!mysqli_query($conn, $sql)) 
    {
        die('Error: ' . mysqli_error($conn)); 
    }
    else 
    {
?>

<script type="text/javascript">
            alert('Apparel record is updated!');
            window.location.href='apparel_list.php?success';
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
            <h2><b>Update Apparel</b></h2><hr>
        </div>

        <div class="form-box">
                <form role="form" enctype="multipart/form-data" action="" method="post">

                    <div class="form">
                        <label><b>Name : </b></label><br>
                        <input type="text" name="Apparel_Name" value="<?php echo "$row[Apparel_Code]"?> - <?php echo "$row[Apparel_Name]"?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Fabric : </b></label>
                        <input type="text" name="Fabric_Type" value="<?php echo "$row[Fabric_Code]"?> - <?php echo "$row[Fabric_Type]"?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Pattern : </b></label>
                        <input type="text" name="Pattern_Type" value="<?php echo "$row[Pattern_Code]"?> - <?php echo "$row[Pattern_Type]"?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Qty (P) : </b></label><br>
                        <input type="text" name="Apparel_Qty" value="<?php echo "$row[Apparel_Qty]"?>"  required>
                    </div>

                    <div class="form">
                        <label><b>Qty (RS) : </b></label><br>
                        <input type="text" name="Apparel_QtyRS" value="<?php echo "$row[Apparel_QtyRS]"?>"  required>
                    </div>

                    <div class="form">
                        <label><b>Price :</b></label><br>
                        <input type="text" name="Apparel_Price" value="<?php echo "$row[Apparel_Price]"?>"  required>
                    </div>

                    <div class="form">
                        <label><b>Image :</b></label><br>
                        <input type="file" id="image" name="Apparel_Image" accept="image/png, image/gif, image/jpeg, image/jpg, application/pdf" onchange="readURL(this);" required>
                        <img id="preview" src="#" style="visibility: hidden;" />
                    </div>

                    <div class="form">
                        <td><input type="hidden" name="Apparel_ID" value=<?php echo $_GET['Apparel_ID'];?>></td>
                    </div>
                

                    <div class="form">
                        <input type="checkbox" name="catatan" value="" checked><strong> I acknowledge that all information are correct.</strong>
                    </div>

                    <br>
                    <div class="feedback-button">
                        <button style="background-color: MediumSeaGreen" onClick="return confirm('Are you sure you want to update this record?')" type="submit" name="Update" value="Update" class="btn">UPDATE</button>
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