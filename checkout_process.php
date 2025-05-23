<?php
session_start();

// Assuming you have a database connection, replace the placeholders with your actual database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saplingo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$productId = $_POST['productId'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$location = $_POST['pickuppoint'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$totalPrice = $_POST['totalPrice'];

$uid = $_SESSION['uid']; // Assuming you have a 'uid' key in your session.

$productId = $_POST['productId'];
$quantity = $_POST['quantity'];
$sql = "UPDATE sales_items SET quantity = quantity - $quantity WHERE SI_id = '$productId'";
mysqli_query($conn, $sql);

// Insert data into the 'order' table
$sql = "INSERT INTO `order` ( uid, item_id, firstname, lastname, location, phone, email, totalprice, status) 
        VALUES ('$uid', '$productId', '$firstname', '$lastname', '$location', '$phone', '$email', '$totalPrice','placed')";

if ($conn->query($sql) === TRUE) {
    // Redirect to index.php after successful order placement
    header("Location: index.php?order_posted=1");
    exit(); // Ensure that no further code is executed after the redirect
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo '<br><a href="shop.php"><button>Back To Shop</button></a>';
}
// Your database connection code here



    // Your SQL query to update the quantity in the database
    


// Close the database connection
$conn->close();
?>
