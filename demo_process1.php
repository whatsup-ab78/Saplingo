<?php

if (isset($_POST['submit'])) {
  // Connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "saplingo";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare and execute the SQL query to insert the data
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $quantity = intval($_POST['count']);
  $location = $_POST['pickuppoint'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $totalPrice = $_POST['totalPrice'];
  $productId = $_POST['id'];


  $sql = "INSERT INTO orders (SI_id,firstname, lastname, quantity, location, phone, email, totalprice) VALUES ('$productId', '$firstname', '$lastname', $quantity, '$location', '$phone', '$email', $totalPrice)";

  if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
  } else {
    echo "Error inserting data: " . $conn->error;
  }

  // Close the database connection
  $conn->close();
}
?>