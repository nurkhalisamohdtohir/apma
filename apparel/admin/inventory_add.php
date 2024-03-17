<!DOCTYPE html>
<html>
<head>
    <title>New Inventory | Admin</title>
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

<!-- check quantity apparel cukup ke tak -->
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
?>

    <div class="w3-container"> 
        <hr>

        <div class="w3-card-4" style="width:100%;">
            <div class="w3-container">
                <center>

        <div class="title">
            <h2><b>Add Inventory</b></h2><hr>
        </div>

        <div class="form-box">
            <!-- <div class="form-left"> -->
                <form role="form"  action="inventory_data.php" method="POST">

                    <div class="form">
                        <label><b>Production : </b></label><br>
                            <select class="prefer" name="Production_ID" id="Production_ID" required>
                            <option disabled selected>-- Select Production --</option>
                    <?php
                        $records = mysqli_query($conn, "SELECT Production_ID From production WHERE Process_ID = 5");  // Use select query here 

                        while($data = mysqli_fetch_array($records))
                        {
                        echo "<option value='". $data['Production_ID'] ."'>" .$data['Production_ID']."</option>";  // displaying data in option menu
                        }   
                    ?>  

                            </select>  
                    </div>

                    <div class="form">
                        <label><b>Apparel : </b></label><br>
                            <select class="prefer" name="Apparel_ID"  id="Apparel_ID" onmouseover="maxquantity();" required>
                            <option value=""></option>
                            </select>  
                    </div>


                    <div class="form">
                        <label><b>Warehouse : </b></label><br>
                            <select class="prefer" name="Warehouse_ID" required>
                                <option disabled selected>-- Select Warehouse --</option>

                    <?php
                        $records = mysqli_query($conn, "SELECT Warehouse_ID, Warehouse_Location From warehouse");  // Use select query here 

                        while($data = mysqli_fetch_array($records))
                        {
                        echo "<option value='". $data['Warehouse_ID'] ."'>" .$data['Warehouse_Location'] ."</option>";  // displaying data in option menu
                        }   
                    ?>  

                            </select>
                    </div>

                    <div class="form">
                        <label><b>Quantity: </b></label><span style="color:red;" id="max_quantity"></span><br>
                        <input type="text" name="Quantity" id="Quantity"  onkeyup="checkapparel();" required><br>
                        <span id="apparel_status"></span>
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
    $('#searchApparel').autocomplete({
      source: "production_apparel_search.php",
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

    $('#searchProduction').autocomplete({
      source: "production_search.php",
      minLength: 1,
      select: function(event, ui)
      {
        $('#searchProduction').val(ui.item.value);
      }
    }).data('ui-autocomplete')._renderItem = function(ul, item){
      return $("<li class='ui-autocomplete-row'></li>")
        .data("item.autocomplete", item)
        .append(item.label)
        .appendTo(ul);
    };

});
</script>

<!--check fabric cukup tak -->
<script>
function checkapparel()
{
var Quantity=document.getElementById( "Quantity" ).value;
 var Apparel_ID=document.getElementById( "Apparel_ID" ).value;
    
 if(Quantity)
 {
  $.ajax({
  type: 'post',
  url: 'validate.php',
  data: {
   Apparel_ID:Apparel_ID,Quantity:Quantity
  },
  success: function (response) {
   $( '#apparel_status' ).html(response);
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
  $( '#apparel_status' ).html("");
  return false;
 }
}
</script>

<!--bagi max quantity apparel-->
<script>
function maxquantity()
{
 var Apparel_ID=document.getElementById( "Apparel_ID" ).value;
    
 if(Apparel_ID)
 {
  $.ajax({
  type: 'post',
  url: 'validate.php',
  data: {
   Apparel_ID:Apparel_ID
  },
  success: function (response) {
   $( '#max_quantity' ).html("**Max quantity:" + response);
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
  $( '#max_quantity' ).html("");
  return false;
 }
}
</script>

<!--show apparel id based on production id-->
<script>
$(document).on('change','#Production_ID', function(){
      var Production_ID = $(this).val();
      if(Production_ID){
          $.ajax({
              type:'POST',
              url:'validate.php',
              data:{'Production_ID':Production_ID},
              success:function(result){
                  $('#Apparel_ID').html(result);
                 
              }
          }); 
      }else{
          $('#Apparel_ID').html('<option value="">Apparel ID</option>'); 
      }
  });
</script>
</body>

</html>