<!DOCTYPE html>
<html>
<head>
    <title>Report| Admin</title>
    <link rel="stylesheet" href="../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- jQuery UI -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Date filter -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script type="text/javascript">
            $(document).ready(function(){

                load_data();

                function load_data(to, from, filter, choice)
                {
                    var to = $('#to').val();
                    var from = $('#from').val();
                    var filter = $('#filter').val();
                    var choice = $('#choice').val();
                    
                    $.ajax({
                      url:"report_ajaxsales.php",
                      method:"GET",
                      data:{to:to, from:from, filter:filter, choice:choice, },
                      success:function(data)
                      {
                        $('#report').html(data);
                      }
                    });
                }

                $('#search').click(function(){
                    var to = $('#to').val();
                    var from = $('#from').val();
                    var filter = $('#filter').val();
                    var choice = $('#choice').val();
                    
                    if(to != '' && from != '' && filter != '' && choice != '')
                    {
                      load_data(to, from, filter, choice);
                    }
                    else
                    {
                      load_data();
                    }
                 });
          });
    </script>
<style>
.form{
    float: left;
    width: 100%; 
    font-size: 12px;
}

select option[disabled] {
    display: none;
}
</style>
</head>
<body>
<?php
  include_once '../connect.php';
  include_once 'sidebar.php';
  $to = '';
  $from = '';
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
<content>
  <center>
    <div class="title">
      <h2><b>Sales Projection Report</b></h2><hr>
    </div>

<!-- Search filter -->
        <div class="form" method='post' action=''>
            <label>From Date : </label>
            <input type="date" name="from" id="from" style="width: 13%" required>
            
            <label> To Date : </label>
            <input type="date" name="to" id="to" style="width: 13%" required>
            
            <label> Filter by : </label>   
            <select class="prefer" name="filter" id="filter" style="width: 12%"><br>
                <option selected value="">  </option>
                <option value="fabric"> FABRIC </option>
                <option value="apparel"> APPAREL </option> 
            </select> 
   
            <select class="prefer" name="choice" id="choice" style="width: 20%" ><br>
                        <option selected value="">  </option>
                        <option class="fabric" value="ALL">ALL</option>  
                <?php
                        $records = mysqli_query($conn, "SELECT Fabric_ID, Fabric_Code, Fabric_Type From fabric");  // Use select query here 

                        while($data = mysqli_fetch_array($records))
                        {
                        echo "<option class='fabric' value='". $data['Fabric_ID'] ."'>".$data['Fabric_Type'] ."</option>";  
                        }   
                    ?>
                    <option class="apparel" value="ALL">ALL</option>
                <?php
                        $records = mysqli_query($conn, "SELECT Apparel_ID, Apparel_Code, Apparel_Name From apparel");  // Use select query here 

                        while($data = mysqli_fetch_array($records))
                        {
                        echo "<option class='apparel' value='". $data['Apparel_ID'] ."'>".$data['Apparel_Name'] ."</option>";  // displaying data in option menu
                        }   
                    ?>   
            </select> 
            
            <button type="submit" class="btn" id="search" style="width: 40px;" title="Search"><i class="fa fa-search w3-large" title="Search"></i></button>

        </div>

<!-- Show result -->
            <div class="div-table" id="report">

            </div>

    <br>
    </center>
</content>
</center>

    <br><br>

            </div>

        </div>
    </div>
    
</div>

<script>
$(document).ready(function() {
   $('#filter').on('change', function(e){
        var className = e.target.value;
        $('#choice option').prop('disabled', true);
        $('#choice').find('option.' + className).prop('disabled', false);

    });
});
      </script>
</body>

</html>