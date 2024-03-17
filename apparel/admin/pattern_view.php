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
            <h2><b>View Pattern</b></h2><hr>
        </div>

        <div class="form-box">
                <form role="form" action="" method="post">
                    
                    <div class="form">
                            <label><b>Code :</b></label>
                            <input type="text" name="Pattern_Code" value="<?php echo "$row[Pattern_Code]"?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Type :</b></label>
                        <input type="text" name="Pattern_Type" value="<?php echo "$row[Pattern_Type]"?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Meters Needed(m) :</b></label>
                        <input type="text" name="Pattern_Meter" value="<?php echo "$row[Pattern_Meter]"?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Image :</b></label><br>
                        <td><img src="../image/<?php echo $row['Pattern_Image']; ?>" style="width:150px;"></td>
                    </div>

                    <div class="form">
                        <td><input type="hidden" name="Pattern_ID" value=<?php echo $_GET['Pattern_ID'];?>></td>
                    </div>
                

                    <div class="form">
                        <input type="checkbox" name="catatan" value="" checked><strong> I acknowledge that all information are correct.</strong>
                    </div>

                    <br>
                    <div class="feedback-button">
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


</body>

</html>