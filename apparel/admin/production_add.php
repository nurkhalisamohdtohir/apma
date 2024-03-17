<!DOCTYPE html>
<html>
<head>
    <title>New Production | Admin</title>
    <link rel="stylesheet" href="../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- autocomplete search -->
    <!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 
<!-- jQuery UI -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

</head>
<body>
<?php
  include_once '../connect.php';
    include_once 'sidebar.php';
?>

<div id="main">
<?php
  include_once 'header.php';

$query = "SELECT Production_ID FROM production ORDER BY Production_ID DESC";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
$lastid = $row['Production_ID'];
if(empty($lastid))
{
    $number = "1";
}
else
{
    $idd = str_replace("", "", $lastid);
    $id = str_pad($idd + 1, 1, 0, STR_PAD_LEFT);
    $number = $id;
}
?>

    <div class="w3-container"> 
        <hr>

        <div class="w3-card-4" style="width:100%;">
            <div class="w3-container">
                <center>

        <div class="title">
            <h2><b>Add Production</b></h2><hr>
        </div>

        <div class="form-box">
            <!-- <div class="form-left"> -->
                <form role="form"  action="production_data.php" method="POST">

                    <div class="form">
                        <td><input type="hidden" name="Production_ID" value="<?php echo $number; ?>" ></td>
                    </div>

                    <div class="form">
                        <label><b>Apparel : </b></label><br>
                            <select class="prefer" name="Apparel_ID" required>
                            <option disabled selected>-- Select Apparel --</option>
                    <?php
                        $records = mysqli_query($conn, "SELECT * 
                            FROM apparel WHERE Apparel_ID NOT IN (SELECT Apparel_ID FROM production);");   

                        while($data = mysqli_fetch_array($records))
                        {
                        echo "<option value='". $data['Apparel_ID'] ."'>" .$data['Apparel_Code']." - ".$data['Apparel_Name'] ."</option>";  // displaying data in option menu
                        }   
                    ?>  

                            </select>  

        
                    </div>

                    

                    <!--<div class="form">
                        <label><b>Quantity : </b></label><br>
                        <input type="number" name="Production_Qty" required>
                    </div>

                    <div class="form">
                        <label><b>Employee ID : </b></label><br>
                            <select class="prefer" name="Emp_ID" required>
                            <option disabled selected>-- Select Employee --</option>
                    <?php
                        $records = mysqli_query($conn, "SELECT Emp_ID, Emp_Name From employee");  // Use select query here 

                        while($data = mysqli_fetch_array($records))
                        {
                        echo "<option value='". $data['Emp_ID'] ."'>" .$data['Emp_ID']." - ".$data['Emp_Name'] ."</option>";  // displaying data in option menu
                        }   
                    ?>  

                            </select>  
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
                    </div>-->


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

<script>
$(document).ready(function(){
    $('#searchApparel').autocomplete({
      source: "apparel_search.php",
      minLength: 1,
      select: function(event, ui)
      {
        $('#searchApparel').val(ui.item.value);
      }
    }).data('ui-autocomplete')._renderItem = function(ul, item){
      return $("<li class='ui-autocomplete-row'></li>")
        .data("item.autocomplete", item)
        .append(item.label)
        .appendTo(ul);
    };

    $('#searchEmployee').autocomplete({
      source: "employee_search.php",
      minLength: 1,
      select: function(event, ui)
      {
        $('#searchEmployee').val(ui.item.value);
      }
    }).data('ui-autocomplete')._renderItem = function(ul, item){
      return $("<li class='ui-autocomplete-row'></li>")
        .data("item.autocomplete", item)
        .append(item.label)
        .appendTo(ul);
    };

});
</script>

</body>

</html>