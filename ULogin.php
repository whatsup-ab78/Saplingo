<!DOCTYPE html>
<html>
<head>
	<title>Saplingo Login</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="style.css" rel="stylesheet">
<style>
	#link1{
		text-decoration:none;
	}
	</style>
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">
			<div class="signup">
					<label for="chk" aria-hidden="true" style="text-align:center;">Saplingo</label>
					<label id="sub" style="font-size: 20px; text-align: center;">User</label>
					<img src="images/Children.png">
			</div>
			<div class="login">
		   <form action="Uprocess_login.php" method="post">
				<label for="chk" aria-hidden="true">Login</label>
				<input type="text" name="uname" placeholder="Username" required="">
				<input type="password" name="pswd" placeholder="Password" required="">
				<button type="submit">Log In</button>
				<center><a  id="link1" href="usersignup.php">New To Saplingo?</a></center>
			</form>
		</div>
	</div>

</body>
</html>
	