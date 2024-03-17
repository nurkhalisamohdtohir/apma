<?php

include_once 'connect.php';
 
$id = $_POST['id'];
$ic = $_POST['ic'];
$name = $_POST['name'];
$cat = 1;
$email = $_POST['email'];
$phone = $_POST['phone'];
$password1 = $_POST['password1'];
$password2= $_POST['password2'];


if ($password1 != $password2) {
?>
		<script type="text/javascript">
		alert('Your password did not match! Please enter again.');
        window.location.href='register.php';
		</script> 
<?php
}

else {

	$sql1 = "SELECT * FROM employee WHERE Emp_ID = '$id'";
	$result1=mysqli_query($conn, $sql1);
	if ($result1-> num_rows > 0) {
		echo "<script type='text/javascript'>
			alert('Registration Unsuccessful! This is an existing user.');
	        window.location.href='index.php';
			</script>";
	}

	else {
		$sql = "INSERT INTO employee VALUES ('$id', '$ic', (UPPER('$name')), '$email', '$phone', '$cat', '$password1')";

		if (!mysqli_query($conn, $sql)) {
		    die('Error: ' . mysqli_error($conn)); 
		}else {?>
				<script type="text/javascript">
				alert('You are Successfully Registered! Please login again.');
		        window.location.href='index.php?success';
				</script> 
		<?php
		}
	}


	
}



?>
       