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

    $query ="SELECT * FROM `production` P JOIN `production_process` pp ON p.Process_ID=pp.Process_ID 
    JOIN apparel a ON p.Apparel_ID=a.Apparel_ID
    WHERE Production_ID=$Production_ID";
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
            <h2><b>View Production</b></h2><hr>
        </div>

        <div class="form-box">
                <form role="form" action="" method="post">
                    
                    <div class="form">
                            <label><b>Production :</b></label>
                            <input type="text" name="Production_ID" value="<?php echo "$row[Production_ID]"?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Apparel :</b></label>
                        <input type="text" name="Apparel_ID" value="<?php echo "$row[Apparel_Code]"?> - <?php echo "$row[Apparel_Name]"?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Qty (P) :</b></label>
                        <input type="text" name="Apparel_Qty" value="<?php echo "$row[Apparel_Qty]"?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Qty (RS) :</b></label>
                        <input type="text" name="Production_Qty" value="<?php echo "$row[Production_Qty]"?>" readonly>
                    </div>

                    <div class="form">
                        <label><b>Production Status :</b></label>
                        <input type="text" name="Production_Desc" value="<?php echo "$row[Process_Desc]"?>" readonly>
                    </div>

                    <div class="form">
                        <td><input type="hidden" name="Production_ID" value=<?php echo $_GET['Production_ID'];?>></td>
                    </div>
                

                    <div class="form">
                        <input type="checkbox" name="catatan" value="" checked><strong> I acknowledge that all information are correct.</strong>
                    </div>

                    <br>
                    <div class="feedback-button">
                        <a href="production_list.php"><button style="background-color: DodgerBlue" type='button' class="btn">BACK</button></a>
                    </div>
                    
                </form>
            <!-- </div> -->
        </div>


        <div class="div-table">
            <table class= "w3-table-all w3-hoverable" style="text-align: left; border: 1">
                <tr class="w3-light-grey">
                    <th width="2%">No</th>
                    <th width="15%">Production Status</th>
                    <th width="15%">Timestamp</th>
                </tr>   

        <?php

        $counter = 1;
        $sql="SELECT * FROM `log` l LEFT JOIN `production_process` pp ON l.Production_Desc=pp.Process_ID WHERE Production_ID=$Production_ID";
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

                    <td><span class="badge"><?php echo $row1['Process_Desc'] ?></span></td>
                    
                    <td><?php echo $row1['Datetime'] ?></span></td>
                </tr>
          <?php
            $counter++;
          } 
        }

          ?> 
                
            </table>
    </div>

        </center>
            </div>
        </div>
    </div>
    
</div>


</body>

</html>