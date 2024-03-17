
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="login.css">
<head>
	<title>Apparel Production</title>
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
<center>

<div class="container">
	<div class="header">
		
		<center>
			<p><a href="home_user.php"><img src="./image/logo.png" width="180px" class="evehicle"></img></a></p><br>
			<p><b>Apparel <font style="color: #233987">Production</font><font style="color: #233987"> Monitoring</font> Application</b></p>
		</center>
	</div>
	<div align="center">
		<form method="post" action="approvedEmail.php">
			<div class="input">
				<label style="font-weight: normal; font-size: 13px;">Please enter your Employee ID and IC number to get temporary password.</label>
			</div>
			<div class="input">
				<label> Employee Number :</label>
				<input type="text" name="emp_id" id="emp_id" required>
			</div>
			<div class="input">
				<label> IC Number :</label>
				<input type="text" name="emp_ic" id="emp_ic" required>
			</div>
			<div class="input" align="center">
				<button type="submit" class="btn" name="login">Next</button>
				<br><br>
    			<a href="index.php" class="pull-left">Cancel</a>
    		</div>
		</form>
	</div>
</div>
</center>
</body>
</html>
<?php
//include 'footer.php';
?>