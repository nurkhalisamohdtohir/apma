<?php
include_once 'connect.php';
session_start();
$error='';

if (empty($_POST['emp_id']) || empty($_POST['password'])) 
{
	$error = "Invalid Employee ID / Password. Please try again. You can also register as new employee or reset password.";
}

else
{
	$emp_id=$_POST['emp_id'];
	$password=$_POST['password'];

	$query ="SELECT * FROM employee where Emp_ID = '$emp_id'";
	$result=mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);

	if ($result-> num_rows > 0)  
	{
		if ($row['Emp_ID'] == $emp_id && $row['Emp_Password'] == $password && $row['Emp_Category'] == 1 && $row['Emp_Status'] == 'ACTIVE') 
		{
			$_SESSION['login_user']=$row['Emp_ID'];

			echo "<script type='text/javascript'>alert('Welcome to Apparel Production Monitoring Application!');
				window.location.href='admin/home_user.php';
				</script>";
		} 

		else if ($row['Emp_ID'] == $emp_id && $row['Emp_Password'] == $password && $row['Emp_Category'] == 2 && $row['Emp_Status'] == 'ACTIVE') 
		{
			$_SESSION['login_user']=$row['Emp_ID'];

			echo "<script type='text/javascript'>alert('Welcome to Apparel Production Monitoring Application!');
				window.location.href='productionManager/home_user.php';
				</script>";
		} 
 

		else {
			echo "<script type='text/javascript'>alert('Invalid Data! Please try again.');
				window.location.href='index.php';
				</script>";
		}
	}

	else 
	{
		echo "<script type='text/javascript'>alert('Invalid Data! Please try again.');
			window.location.href='index.php';
			</script>";
	}

	mysqli_close($conn); 
}

?>

