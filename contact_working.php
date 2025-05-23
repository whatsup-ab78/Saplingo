
<?php

if (isset($_POST['submit1'])) {
    // Database connection setup (replace with your credentials)
    $db_host = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'saplingo';

    $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get user input
    $name = mysqli_real_escape_string($conn, $_POST['name1']); // Sanitize input
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = intval($_POST['mobilenumber']); // Ensure it's an integer
    $queries = mysqli_real_escape_string($conn, $_POST['queries']);
    $sql = "INSERT INTO user_queries (name, email, mobile_no, queries) VALUES (?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssis", $name, $email, $number, $queries);

        if (mysqli_stmt_execute($stmt)) {
            // Display an alert message using JavaScript
            echo '<script>alert("Form submitted successfully!"); window.location.href = "contact.php";</script>';
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
