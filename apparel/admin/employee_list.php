<!DOCTYPE html>
<html>
<head>
    <title>Employee List | Admin</title>
    <link rel="stylesheet" href="../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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



        <div class="w3-card-4" style="width:100%;">
            <hr>
            <a href="employee_add.php" class="w3-button w3-circle w3-gray" style="font-size: 20px; float:right; margin-right: 50px;"><i class="fa fa-plus"></i></a><br><br><br>

            <div class="w3-container">

<center>
<content>
  <center>
    <div class="title">
      <h2><b>List of Employees</b></h2><hr>
    </div>

    <div class="div-table">
            <table class= "w3-table-all w3-hoverable" style="text-align: left; border: 1">
              <tr><input id="search" style="width: 30%; height: 30px;font-size: 15px;" type="text" placeholder="Search.."></tr><br><br>
                <tr class="w3-light-grey">
                    <th width="2%">No</th>
                    <th width="4%">ID</th>
                    <th width="6%">IC</th>
                    <th width="20%">Name</th>
                    <th width="10%">Department</th>
                    <th width="8%">Email</th>
                    <th width="5%">Phone</th>
                    <th width="5%">Status</th>
                    <th width="5%">Action</th>
                </tr>   

        <?php

    // How many records will be displayed in one page
    $num_per_page=5;


    if(isset($_GET["page"]))
    {
        $page=$_GET["page"];
    }
    else
    {
        $page=1;
    }

    $start_from=($page-1)*5;

    $counter = 1;
    $sql="select * from employee limit $start_from,$num_per_page";
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

                    <td><?php echo $row1['Emp_ID'] ?></td>

                    <td><?php echo $row1['Emp_IC'] ?></td>

                    <td><?php echo $row1['Emp_Name'] ?></td>

                    <td><?php echo $row1['Emp_Dept'] ?></td>
          
                    <td><?php echo $row1['Emp_Email'] ?></td>

                    <td><?php echo $row1['Emp_Phone'] ?></td>

                    <td><?php echo $row1['Emp_Status'] ?></td>

                    <td><a href="employee_view.php?Emp_IC=<?php echo $row1['Emp_IC'] ?>"><button type='button'><i class="fas fa-eye"></i></button></a>

                    </td>
                </tr>
          <?php
            $counter++;
          } 
        }

          ?> 
                
            </table><br>

    <?php 
    
    
    $sql="select * from employee";
    $rs_result=mysqli_query($conn,$sql);
    $total_records=mysqli_num_rows($rs_result);
    $total_pages=ceil($total_records/$num_per_page);
    
    echo "<div class='pagination'>";
    for($i=1;$i<=$total_pages;$i++)
    {
        echo "<a href='employee_list.php?page=".$i."'>".$i."</a>" ;
    }
    echo "</div>";
    ?>
    </div>
    <br>
    </center>
</content>
</center>

    <br><br>

            </div>

        </div>

    
</div>


</body>

</html>