<?php
// Include your database connection file if not already included
// include 'db_connection.php';

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

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

    // Update the order status to 'placed'
    $sql = "UPDATE `order` SET status = 'placed' WHERE o_id = $order_id";
    $conn->query($sql);

    // Close the database connection
    $conn->close();
}
?>
