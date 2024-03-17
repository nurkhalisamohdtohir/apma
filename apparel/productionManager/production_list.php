<!DOCTYPE html>
<html>
<head>
    <title>Production List </title>
    <link rel="stylesheet" href="../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<meta http-equiv='refresh' content='5'>-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--table-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".tbody").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<style>
    .badge {
  background-color: #3366CC;
  color: white;
  padding: 4px 8px;
  text-align: center;
  border-radius: 5px;
}

</style>
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
            <hr>

            <div class="w3-container">

<center>
<content>
  <center>
    <div class="title">
      <h2><b>List of Production</b></h2><hr>
    </div>

    <div class="div-table">
            <table class= "w3-table-all w3-hoverable" style="text-align: left; border: 1">
              <tr><input id="search" style="width: 30%; height: 30px;font-size: 15px;" type="text" placeholder="Search.."></tr><br><br>
                <tr class="w3-light-grey">
                    <th width="2%">No</th>
                    <th width="8%">Production</th>
                    <th width="8%">Apparel</th>
                    <th width="8%">Qty(P)</th>
                    <th width="8%">Qty(RS)</th>
                    <th width="15%">Production Status</th>
                    <th width="8%">Action</th>
                </tr>   

        <?php

        $counter = 1;
        $sql="SELECT * FROM production P LEFT JOIN production_process pp ON p.Process_ID=pp.Process_ID
        LEFT JOIN apparel a ON p.Apparel_ID=a.Apparel_ID";
        $result_set=mysqli_query($conn,$sql);

        if ($result_set-> num_rows == 0)  
        {
          echo "<font size='3'>0 result</font>";
        }

        else {

        
                
            

        While($row1=mysqli_fetch_array($result_set))
        { ?>
                <tr class="tbody" id="MyTable">
                    <td><?php echo $counter; ?></td>

                    <td><?php echo $row1['Production_ID'] ?></td>

                    <td><a href="apparel_view.php?Apparel_ID=<?php echo $row1['Apparel_ID'] ?>" target="_blank"><?php echo $row1['Apparel_Code'] ?></a></td>

                    <td><?php echo $row1['Apparel_Qty'] ?></td>
                    <td><?php echo $row1['Production_Qty'] ?></td>

                    <td><span class="badge"><?php echo $row1['Process_Desc'] ?></span></td>

                    <!--<td>
                        <?php 
                            switch ($row1['Production_Status']) {
                                case '1':
                                    echo "<span class='badge'> FABRIC INSPECTION</span>";
                                    break;
                                case '2':
                                    echo "<span class='badge'> PATTERN MAKING</span>";
                                    break;
                                case '3':
                                    echo "<span class='badge'> CUTTING</span>";
                                    break;
                                case '4':
                                    echo "<span class='badge'> SEWING</span>";
                                    break;
                                case '5':
                                    echo "<span class='badge'> FINISHING</span>";
                                    break;
                                
                                default:
                                    echo "<span class='badge'> PENDING</span>";
                                    
                                    break;
                            }

                            ?>
                    </td>-->


                    <td><a href="production_view.php?Production_ID=<?php echo $row1['Production_ID'] ?>"><button type='button'><i class="fas fa-eye"></i></button></a> 
   

                    </td>
                </tr>
          <?php
            $counter++;
          } 
        }

          ?> 
                
            </table>
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


</body>

</html>