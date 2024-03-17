<!DOCTYPE html>
<html>
<head>
    <title>Production | Admin</title>
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
    $Production_ID = $_GET['Production_ID'];

    $query ="SELECT * FROM production p JOIN apparel a ON p.Apparel_ID=a.Apparel_ID WHERE Production_ID=$Production_ID";
    $result=mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);


if(isset($_POST['Update'])) {
    $Production_ID = $_POST['Production_ID'];
    $Production_Qty = $_POST['Production_Qty'];
    $Process_ID = $_POST['Process_ID'];
    $Apparel_ID = $_POST['Apparel_ID'];
    $Emp_ID = $_POST['Emp_ID'];

    // Insert user data into table
    $sql = "UPDATE production SET Production_ID='$Production_ID', Production_Qty='$Production_Qty', Process_ID='$Process_ID' WHERE Production_ID=$Production_ID";

    $sql2 = "INSERT INTO log (Production_ID, Apparel_ID, Production_Desc, Emp_ID) VALUES ('$Production_ID', '$Apparel_ID', '$Process_ID', '$Emp_ID')";

    // Show message when user added
    if (!mysqli_query($conn, $sql2)) 
    {
        die('Error: ' . mysqli_error($conn)); 
    }

    // Show message when user added
    if (!mysqli_query($conn, $sql)) 
    {
        die('Error: ' . mysqli_error($conn)); 
    }
    else 
    {
?>

<script type="text/javascript">
            alert('Production record is updated!');
            window.location.href='production_list.php?success';
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
            <h2><b>Update Production</b></h2><hr>
        </div>

        <div class="form-box">
                <form role="form" action="" method="post">
                    
                    <div class="form">
                            <label><b>Production :</b></label>
                            <input type="text" name="Production_ID" value="<?php echo "$row[Production_ID]"?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Apparel :</b></label><br>
                            <select class="prefer" name="Apparel_ID" readonly>
                                <?php echo "<option disabled selected value='". $row['Apparel_ID'] ."'>" .$row['Apparel_Code'] ."- ".$row['Apparel_Name'] ."</option>"; ?>
                            </select>
                    </div>

                    <div class="form">
                        <label><b>Quantity : </b></label><br>
                        <input type="text" name="Production_Qty" value="<?php echo "$row[Production_Qty]"?>"  required>
                    </div>

                    <div class="form">
                        <label><b>Production Status: </b></label><br>
                            <select class="prefer" name="Process_ID" required>
                                <option disabled selected>-- Select Status --</option>

                    <?php
                        $records = mysqli_query($conn, "SELECT Process_ID, Process_Desc From production_process");  // Use select query here 

                        while($data = mysqli_fetch_array($records))
                        {
                        echo "<option value='". $data['Process_ID'] ."'>" .$data['Process_Desc'] ."</option>";  // displaying data in option menu
                        }   
                    ?>  

                            </select>
                    </div>

                    <div class="form">
                        <td><input type="hidden" name="Production_ID" value=<?php echo $_GET['Production_ID'];?>></td>
                    </div>

                    <div class="form">
                        <td><input type="hidden" name="Emp_ID" value=<?php echo "$row0[Emp_ID]"?>></td>
                    </div>
            

                    <div class="form">
                        <input type="checkbox" name="catatan" value="" checked><strong> I acknowledge that all information are correct.</strong>
                    </div>

                    <br>
                    <div class="feedback-button">
                        <button style="background-color: MediumSeaGreen" onClick="return confirm('Are you sure you want to update this record?')" type="submit" name="Update" value="Update" class="btn">UPDATE</button>
                        <a href="production_list.php"><button style="background-color: DodgerBlue" type='button' class="btn">BACK</button></a>
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