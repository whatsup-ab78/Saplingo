<?php
session_start();

if (isset($_POST['submit'])) {
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
    $item_name = mysqli_real_escape_string($conn, $_POST['item_name']); // Sanitize input
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $unit_price = floatval($_POST['unit_price']); // Ensure it's a float
    $quantity = intval($_POST['quantity']); // Ensure it's an integer

    $uid = $_SESSION['uid']; // Assuming you have a 'uid' key in your session.

    // Check for file upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["Simage"]["name"]);

    if (move_uploaded_file($_FILES["Simage"]["tmp_name"], $target_file)) {
        // Insert product data into the database using prepared statement
        $sql = "INSERT INTO sales_items (Simage, item_name, quantity, description, unit_price, uid) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssssdi", $target_file, $item_name, $quantity, $description, $unit_price, $uid);

            if (mysqli_stmt_execute($stmt)) {
                // Add a header to redirect to shop.php after successful posting
                header("Location: shop.php?product_posted=1");
                exit(); // Ensure that no further code is executed after the redirect
            } else {
                echo "Error: " . mysqli_stmt_error($stmt);
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Error preparing statement: " . mysqli_error($conn);
        }
    } else {
        echo "Error uploading image.";
    }

    mysqli_close($conn);
}
?>
