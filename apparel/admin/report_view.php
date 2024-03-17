
  <!DOCTYPE html>
  <html>
  <head>
  	<title>Report</title>
  	<link rel="stylesheet" type="text/css" href="../style.css">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">

      $(document).ready(function(){

            load_data();

            function load_data(query)
            {

                $.ajax({
                  url:"report_ajax.php",
                  method:"GET",
                  data:{query:query},
                  success:function(data)
                  {
                    $('#report').html(data);
                  }
                });
            }

            $('#year').change(function(){
                var search = $(this).val();
                if(search != '')
                {
                  load_data(search);
                }
                else
                {
                  load_data();
                }
             });

            $('#print').click(function(){
                var year = $('#year').val();
                window.open('print_booking_report.php?year='+year);
              
            });
      });

      </script>
   
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
<hr>
  <center>
  <content>
  	<center>
      <div class="title">
  		<h2><b>Apparel Production Report</b></h2><hr>
  	</div>
    <!--<div style="background-color: black; width: 100%">
      <div class="form-search" style="width: 30%; margin-left: 90px; float: left;">
      <label><b>Year of Report: </b></label>
      <select class="prefer" style="width: 50%" id="year">
        <option value="2022">2022</option>
      </select>
      </div>
      <div style="float: right; margin-right: 110px;margin-top: 10px;">
        <button id = "print" type="button" class="btn" style="width: 100px">Print</button>
      </div>
    </div>
    
    <br><br><br>-->
    <div id="report">
      
    </div>
  	

  </center>
  </content>
  </center>

</div>
  </body>
  <?php
    include("../footer.php");
    ?>
  </html>