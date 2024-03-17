<!DOCTYPE html>
<html>
<head>
    <title>Pattern | Admin</title>
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
    $Pattern_ID = $_GET['Pattern_ID'];

    $query ="SELECT * FROM `pattern` WHERE Pattern_ID=$Pattern_ID";
    $result=mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);


if(isset($_POST['Update'])) {

    date_default_timezone_set("Asia/Kuala_Lumpur");
    $date = date("d-m-Y");
    $file = $_FILES["Pattern_Image"];
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
    $Pattern_ID = $_POST['Pattern_ID'];
    $Pattern_Type = $_POST['Pattern_Type'];
    $Pattern_Code = $_POST['Pattern_Code'];
    $Pattern_Meter = $_POST['Pattern_Meter'];


    // Insert user data into table
    $sql = "UPDATE pattern SET Pattern_ID='$Pattern_ID',Pattern_Code='$Pattern_Code', Pattern_Type=(UPPER('$Pattern_Type')), Pattern_Meter='$Pattern_Meter', Pattern_Image='$fileNameNew' WHERE Pattern_ID=$Pattern_ID";

    // Show message when user added
    if (!mysqli_query($conn, $sql)) 
    {
        die('Error: ' . mysqli_error($conn)); 
    }
    else 
    {
?>

<script type="text/javascript">
            alert('Pattern record is updated!');
            window.location.href='pattern_list.php?success';
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
            <h2><b>Update Pattern</b></h2><hr>
        </div>

        <div class="form-box">
                <form role="form" enctype="multipart/form-data" action="" method="post">
                    
                    <div class="form">
                            <label><b>Code :</b></label>
                            <input type="text" name="Pattern_Code" value="<?php echo "$row[Pattern_Code]"?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Type :</b></label>
                        <input type="text" name="Pattern_Type" value="<?php echo "$row[Pattern_Type]"?>" required style="text-transform:uppercase">
                    </div>

                    <div class="form">
                        <label><b>Meters Needed (m) :</b></label>
                        <input type="text" name="Pattern_Meter" value="<?php echo "$row[Pattern_Meter]"?>" required>
                    </div>

                    <div class="form">
                        <label><b>Image :</b></label><br>
                        <input type="file" id="image" name="Pattern_Image" accept="image/png, image/gif, image/jpeg, image/jpg, application/pdf" onchange="readURL(this);" required>
                        <img id="preview" src="#" style="visibility: hidden;" />
                    </div>

                    <div class="form">
                        <td><input type="hidden" name="Pattern_ID" value=<?php echo $_GET['Pattern_ID'];?>></td>
                    </div>
                

                    <div class="form">
                        <input type="checkbox" name="catatan" value="" checked><strong> I acknowledge that all information are correct.</strong>
                    </div>

                    <br>
                    <div class="feedback-button">
                        <button style="background-color: MediumSeaGreen" onClick="return confirm('Are you sure you want to update this record?')" type="submit" name="Update" value="Update" class="btn">UPDATE</button>
                        <a href="pattern_list.php"><button style="background-color: DodgerBlue" type='button' class="btn">BACK</button></a>
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