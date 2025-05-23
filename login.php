<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif; 
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        #login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .login-option {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            text-decoration: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .user-login {
            background-color: #3498db;
        }

        .admin-login {
            background-color: #e74c3c;
        }

        .login-option:hover {
            background-color: #2c3e50;
        }
    </style>
</head>
<body>

    <div id="login-container">
        <h2>Who are You???</h2>
        <a href="ULogin.php" class="login-option user-login">I am a User</a>
        <a href="ALogin.php" class="login-option admin-login">I am the Admin</a>
    </div>

</body>
</html>