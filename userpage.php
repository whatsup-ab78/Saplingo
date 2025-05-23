<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #4CAF50, #45a049);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        #dashboard-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        #logout-btn {
            padding: 10px 20px;
            background-color: #fff;
            color: #4CAF50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        #logout-btn:hover {
            background-color: #4CAF50;
            color: #fff;
        }
    </style>
</head>
<body>

    <div id="dashboard-container">
        <h2>Welcome, <?php echo $userInfo['username']; ?>!</h2>
        
        <h3>Your Orders:</h3>
        <ul>
            <?php foreach ($userInfo['orders'] as $order) : ?>
                <li><?php echo $order; ?></li>
            <?php endforeach; ?>
        </ul>
        
        <form action="logout.php" method="post">
            <input type="submit" id="logout-btn" value="Logout">
        </form>
    </div>

</body>
</html>