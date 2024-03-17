<!DOCTYPE html>
<html>
<head>
    <title>New Apparel | Admin</title>
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

<!-- check quantity fabric cukup ke tak -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
</head>
<body>
<?php
  include_once '../connect.php';
    include_once 'sidebar.php';
?>

<div id="main">
<?php
  include_once 'header.php';

$query = "SELECT Apparel_Code FROM apparel ORDER BY Apparel_Code DESC";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
$lastid = $row['Apparel_Code'];
if(empty($lastid))
{
    $number = "A001";
}
else
{
    $idd = str_replace("A", "", $lastid);
    $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
    $number = 'A'.$id;
}
?>

    <div class="w3-container"> 
        <hr>

        <div class="w3-card-4" style="width:100%;">
            <div class="w3-container">
                <center>

        <div class="title">
            <h2><b>Add Apparel</b></h2><hr>
        </div>

        <div class="form-box">
            <!-- <div class="form-left"> -->
                <form role="form"  enctype="multipart/form-data" action="apparel_data.php" method="POST">

                    <div class="form">
                        <label><b>Code : </b></label>
                        <input type="text" name="Apparel_Code" value="<?php echo $number; ?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Name : </b></label><br>
                        <input type="text" name="Apparel_Name" required style="text-transform:uppercase">
                    </div>

                    <div class="form">
                        <label><b>Fabric : </b></label><br>
                            <select class="prefer" name="Fabric_ID" id="Fabric_ID" required>
                            <option disabled selected>-- Select Fabric --</option>
                    <?php
                        $records = mysqli_query($conn, "SELECT Fabric_ID, Fabric_Code, Fabric_Type From fabric");  // Use select query here 

                        while($data = mysqli_fetch_array($records))
                        {
                        echo "<option value='". $data['Fabric_ID'] ."'>" .$data['Fabric_Code']." - ".$data['Fabric_Type'] ."</option>";  // displaying data in option menu
                        }   
                    ?>  

                            </select>  
                    </div>

                    <div class="form">
                        <label><b>Pattern : </b></label><br>
                            <select class="prefer" name="Pattern_ID" required>
                            <option disabled selected>-- Select Pattern --</option>
                    <?php
                        $records = mysqli_query($conn, "SELECT Pattern_ID, Pattern_Code, Pattern_Type From pattern");  // Use select query here 

                        while($data = mysqli_fetch_array($records))
                        {
                        echo "<option value='". $data['Pattern_ID'] ."'>" .$data['Pattern_Code']." - ".$data['Pattern_Type'] ."</option>";  // displaying data in option menu
                        }   
                    ?>  

                            </select>  
                    </div>

                    <div class="form">
                        <label><b>Qty (P): </b></label><span style="color:red;" id="max_quantity"></span><br>
                        <input type="text" name="Apparel_Qty" id="Apparel_Qty"  onkeyup="checkfabric();" required><br>
                        <span id="fabric_status"></span>
                    </div>

                    <div class="form">
                        <td><input type="hidden" name="Apparel_QtyRS" value="0"></td>
                    </div>


                    <div class="form">
                        <label><b>Price : </b></label><br>
                        <input type="text" name="Apparel_Price"  required>
                    </div>

                    <div class="form">
                        <label><b>Image : </b></label><br>
                        <input type="file" id="image" name="Apparel_Image" accept="image/png, image/gif, image/jpeg, image/jpg, application/pdf" onchange="readURL(this);" required>
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

<script>
$(document).ready(function(){
    $('#searchFabric').autocomplete({
      source: "fabric_search.php",
      minLength: 1,
      select: function(event, ui)
      {
        $('#searchFabric').val(ui.item.value);
      }
    }).data('ui-autocomplete')._renderItem = function(ul, item){
      return $("<li class='ui-autocomplete-row'></li>")
        .data("item.autocomplete", item)
        .append(item.label)
        .appendTo(ul);
    };

    $('#searchPattern').autocomplete({
      source: "pattern_search.php",
      minLength: 1,
      select: function(event, ui)
      {
        $('#searchPattern').val(ui.item.value);
      }
    }).data('ui-autocomplete')._renderItem = function(ul, item){
      return $("<li class='ui-autocomplete-row'></li>")
        .data("item.autocomplete", item)
        .append(item.label)
        .appendTo(ul);
    };

});
</script>

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

<!--check fabric cukup tak -->
<script>
function checkfabric()
{
 var Apparel_Qty=document.getElementById( "Apparel_Qty" ).value;
 var Fabric_ID=document.getElementById( "Fabric_ID" ).value;
    
 if(Apparel_Qty)
 {
  $.ajax({
  type: 'post',
  url: 'validate.php',
  data: {
   Fabric_ID:Fabric_ID,Apparel_Qty:Apparel_Qty
  },
  success: function (response) {
   $( '#fabric_status' ).html(response);
   if(response=="")   
   {
    return true;    
   }
   else
   {
    return false;   
   }
  }
  });
 }
 else
 {
  $( '#fabric_status' ).html("");
  return false;
 }
}
</script>

<!--bagi max quantity -->
<script>
function getmaxquantity(Pattern_ID, Fabric_ID) {
       $.ajax({
            type: "POST",
            url: "validate.php",
            data: {
                Pattern_ID : Pattern_ID,
                Fabric_ID : Fabric_ID
            },
            success: function(data){
            $("#max_quantity").html(data);
        }
}

}

$(document).on('change', '#Pattern_ID', function(){
    var Pattern_ID = $(this).val();
    var Fabric_ID = $('#Fabric_ID').val();

    getSubject(Pattern_ID, Fabric_ID);
});


    </script>
</body>

</html>