
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
		<br>
		<center>
			<p><a href="home_user.php"><img src="./image/logo.png" width="180px" class="evehicle"></img></a></p><br>
			<p><b>Apparel <font style="color: #233987">Production</font><font style="color: #233987"> Monitoring</font> Application</b></p>
		</center>
	</div>
	<div align="center">
		<form method="post" action="userlogin.php">
			<div class="input">
				<label> Employee ID :</label>
				<input type="text" name="emp_id" id="emp_id" required>
			</div>
			<div class="input">
				<label> Password :</label>
				<input type="password" name="password" id="password" required>
			</div>
			<div class="input" align="center">
				<button type="submit" class="btn" name="login">Login &nbsp;<i class="fa fa-sign-in" aria-hidden="true"></i></button>
				<br><br>
				<a href="forgot_password.php" class="pull-right">Forgot Password?</a>
    			<a href="register.php" class="pull-left">Register Employee</a>
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