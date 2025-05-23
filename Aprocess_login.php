<?php
// Establish a database connection (Replace with your database credentials)

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
$inputUsername = $_POST['uname'];
$inputPassword = $_POST['pswd'];

// Check if the credentials are correct
$stmt = $conn->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $inputUsername, $inputPassword);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    // Login successful
    session_start();
    $_SESSION['username'] = $inputUsername;
    echo "<script>alert('Login successful!'); window.location.href='admin page/admin.php';</script>";
    // You can redirect the user to the admin panel or perform other actions here
} else {
    // Login failed
    echo "<script>alert('Login failed. Please check your username and password.'); window.location.href='Alogin.php';</script>";
}
// Close the database connection
$stmt->close();
$conn->close();
?>
