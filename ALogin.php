<!DOCTYPE html>
<html>
<head>
	<title>Saplingo Login</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
	<link href="style.css" rel="stylesheet">
</head>
<body> 
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

		<div class="signup">
			<label for="chk" aria-hidden="true" style="text-align:center;">Saplingo</label>
			<label id="sub" style="font-size: 30px; text-align: center;">Admin</label>
			<img src="images/avatar.png" style="padding-left: 40px; padding-bottom: 40px;">
		</div>

		<div class="login">
		   <form action="Aprocess_login.php" method="post">
				<label for="chk" aria-hidden="true">Login</label>
				<input type="text" name="uname" placeholder="Username" required="">
				<input type="password" name="pswd" placeholder="Password" required="">
				<button type="submit">Log In</button>
			</form> 
		</div>
	</div>

</body>
</html>
