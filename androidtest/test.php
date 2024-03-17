<?php
    require_once "conn.php";	
?>

<div class="div-table">
            <table class= "w3-table-all w3-hoverable" style="text-align: left; border: 1">
              <tr><input id="search" style="width: 30%; height: 30px;font-size: 15px;" type="text" placeholder="Search.."></tr><br><br>
                <tr class="w3-light-grey">
                    <th width="2%">No</th>
                    <th width="40%">Location</th>
                    <th width="8%">Action</th>
                </tr>   

        <?php

        $counter = 1;
        $sql="SELECT * FROM production 
				INNER JOIN apparel ON production.Apparel_ID = apparel.Apparel_ID
				INNER JOIN fabric ON apparel.Fabric_ID = fabric.Fabric_ID
				INNER JOIN pattern ON apparel.Pattern_ID = pattern.Pattern_ID
				INNER JOIN production_process ON production.Process_ID = production_process.Process_ID
				INNER JOIN log ON production.Production_ID = log.Production_ID
				INNER JOIN employee ON log.Emp_ID = employee.Emp_ID
				WHERE log.Emp_ID = '20015' AND employee.Emp_Dept='FABRIC INSPECTION' ";
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

                    <td><?php echo $row1['Apparel_ID'] ?></td>

                    <td><?php echo $row1['Production_ID'] ?></td>

                    <td><?php echo $row1['Pattern_Code'] ?></td>

                    <td><?php echo $row1['Fabric_Code'] ?></td>
                    <td><?php echo $row1['Fabric_Type'] ?></td>
                    <td><?php echo $row1['Apparel_Code'] ?></td>
                    <td><?php echo $row1['Apparel_Name'] ?></td>
                    <td><?php echo $row1['Apparel_Qty'] ?></td>

                   <td><?php echo $row1['Production_Qty'] ?></td>
                   <td><?php echo $row1['Process_Desc'] ?></td>

                  
                </tr>
          <?php
            $counter++;
          } 
        }

          ?> 
                
            </table>
    </div>