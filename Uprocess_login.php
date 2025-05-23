<?php
// Start a session (this should be at the top of every PHP page where you use sessions).
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saplingo";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the input from the form
$username = $_POST['uname'];
$password = $_POST['pswd'];

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("SELECT uid, username FROM user WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);

if ($stmt->execute()) {
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Login successful
        $row = $result->fetch_assoc();
        $_SESSION['loggedin'] = true;
        $_SESSION['uid'] = $row['uid']; // Save the uid in the session
        $_SESSION['username'] = $row['username']; // Save the username in the session
        header("Location: index.php");
        exit();
    } else {
        // Login failed
        echo "<script>";
        echo "alert('Login failed. Please check your username and password.');";
        echo "window.location.href='ULogin.php';"; // Redirect back to the login page
        echo "</script>";
    }
} else {
    // Database query error
    echo "Error: " . $stmt->error;
}

// Close the database connection
$stmt->close();
$conn->close();
?>

