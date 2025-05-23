<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $pickupPoint = $_POST['pickuppoint'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    if (isset($_GET['totalPrice'])) {
        $totalPrice = floatval($_GET['totalPrice']);
        // Now, you can use $totalPrice in your process_order.php script.
        echo 'Total Price: $' . number_format($totalPrice, 2);
    } else {
        echo 'Total Price not found in the URL.';
    }
    $quantity = isset($_POST['count']) ? intval($_POST['count']) : 1;

    // Calculate total price
    //$totalPrice = ($productPrice * $quantity) + 20.00; // Assuming $0 discount

    // Replace these with your actual database connection details
    $db_host = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'saplingo';


    // Create a database connection
    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO `order` (firstname, lastname, quantity, location, phone, email,totalprice) 
            VALUES ('$firstname', '$lastname','$quantity','$pickupPoint','$phone', '$email','$totalPrice')";

    if ($conn->query($sql) === TRUE) {
        echo "Order placed successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>

