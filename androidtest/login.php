<?php
// Check if Staff_ID and Staff_Password are set
if(isset($_POST['Emp_ID']) && isset($_POST['Emp_Password'])){
 // Include the necessary files
 require_once "conn.php";
 require_once "validate.php";
 // Call validate, pass form data as parameter and store the returned value
 $Emp_ID = validate($_POST['Emp_ID']);
 $Emp_Password = validate($_POST['Emp_Password']);
 // Create the SQL query string
$sql = "select * from employee where Emp_ID='$Emp_ID' and Emp_Password='$Emp_Password'";
 // Execute the query
 $result = $conn->query($sql);
 // If number of rows returned is greater than 0 (that is, if the record is found), we'll print "success", otherwise "failure"
 if($result->num_rows > 0){
 echo "login successfully";
 } else if($result->num_rows <= 0){
 // If no record is found, print "failure"
 echo "failure";
 } 
} else
echo "Not set";
?>