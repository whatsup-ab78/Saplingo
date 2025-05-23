<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection information
    $servername = "localhost"; // Change to your database server
    $username = "root"; // Change to your database username
    $password = ""; // Change to your database password
    $dbname = "saplingo"; // Change to your database name

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve user data from the form
    $newUsername = mysqli_real_escape_string($conn, $_POST['username']);
    $newPassword = mysqli_real_escape_string($conn, $_POST['password']);
    $newName = mysqli_real_escape_string($conn, $_POST['name']);
    $newEmail = mysqli_real_escape_string($conn, $_POST['email']);

    // Check for duplicate username or email
    $check_duplicate_sql = "SELECT * FROM user WHERE username = '$newUsername' OR email = '$newEmail'";
    $duplicate_result = $conn->query($check_duplicate_sql);

    if ($duplicate_result->num_rows > 0) {
        echo '<script>alert("Username or email already exists.");window.location.href = "adminuseradd.php";</script>';
    } else {
        // SQL query to insert a new user record using prepared statements
        $insert_sql = $conn->prepare("INSERT INTO user (username, password, status, email, name)
                       VALUES (?, ?, 1, ?, ?)");

        // Bind parameters
        $insert_sql->bind_param("ssss", $newUsername, $newPassword, $newEmail, $newName);

        if ($insert_sql->execute()) {
            $account_created = true; // Variable to track successful account creation
        } else {
            echo "Error adding user record: " . $insert_sql->error;
        }

        // Close the prepared statement
        $insert_sql->close();
    }

    // Close the database connection
    $conn->close();
}

// Print success message outside the form submission block
if (isset($account_created) && $account_created) {
    echo '<script>alert("Account created successfully.");
    window.location.href = "Ulogin.php"; // Redirect to the sign-in page
    </script>';
    header("location: sign.html");
         exit();
}
?>

