<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
    <link href="signup.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 style="text-align:center;color:gray;">Sign Up</h1>
        <form id="form1" method="post" action="signup_working.php">
        <?php if(isset($_GET['error'])){?>
                <p class="error" style="color:white;border-radius:5px;background:none;margin-left:50px;"><?php echo $_GET['error'];?></p>
                <?php }?>
            <label for="username">Username:</label>
            <input type="text" name="username" required placeholder="Enter username"><br>

            <label for="name">Name:</label>
            <input type="text" name="name" required placeholder="Enter name"><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required placeholder="New password"><br>

            <label for="email">Email:</label>
            <input type="email" name="email" required placeholder="Enter Email"><br>
           
            <input id="b1" type="submit" value="Submit">
            <br><a id="link2" href="Ulogin.php">Already have an Account?</a>
            
        </form>
     <br>   <form method="get" action="admin.php">
        
</form>
    </div>
</body>
</html>