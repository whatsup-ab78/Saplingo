<?php
// Start the session (this should be at the top of every PHP page where you use sessions).
session_start();

// Replace these with your actual database connection details
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

// Check if the user is not logged in, redirect them to the login page.
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: Ulogin.php"); 
    exit;
} 


// Get the username and UID from the session. 
$username = $_SESSION['username']; // Assuming you have a 'username' key in your session.
$uid = $_SESSION['uid']; // Assuming you have a 'uid' key in your session.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Your Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/new.css">
    <link rel="stylesheet" href="stylem3.css">

	<script src="new.js"></script>

	<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .full {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
            box-sizing: border-box;
        }

        .contents {
            text-align: center;
        }

        .heading {
            color: #333;
            margin-bottom: 20px;
        }

        .form {
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"],
        input[type="button"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #45a049;
        }
    </style>
  </head>
  <body class="goto-here">
<!-- nav above -->
<div class="py-1 bg-primary">
	<div class="container" >
		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
			<div class="col-lg-12 d-block">
				<div class="row d-flex">
					<div class="col-md pr-4 d-flex topper align-items-center">
						<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						<span class="text">+91 2233445566</span>
					</div>
					<div class="col-md pr-4 d-flex topper align-items-center">
						<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						<span class="text" style="text-transform:capitalize;">saplingo@email.com</span>
					</div>
					<div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						<span class="text" style="text-transform:capitalize;">Deliveries From Monday To Friday</span>
					</div>
				</div>
			</div>
		</div>
	  </div>
</div>
<!--nav above  -->
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
<!-- name of the website -->
	  <a class="navbar-brand" href="saplingo.html" style="text-transform:capitalize;">Saplingo</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="oi oi-menu"></span> Menu
	  </button>
<!-- navbar -->
	  <div class="collapse navbar-collapse" id="ftco-nav">
	  <ul class="navbar-nav ml-auto">
    <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="shop.php" class="nav-link">Shop</a></li>
        <li class="nav-item"><a href="product_post.php" class="nav-link">Post A Product</a></li>
    <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
    <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
    <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
    
    
</ul>

	  </div>
	</div>
			<img src="user.jpg" width="50px" height="50px" class="pro-img" style="border-radius:50%;" style="float:right;margin-right:300px;" />

  </nav>
  <!-- profile user display -->
  <div class="col-div-6" style="float:right;margin-top:0px;margin-right:5px;">
		<div class="profile">
			<p><span><?php echo $username; ?></span></p>
	</div>
		<div class="clearfix"></div>
	</div>
    <!--  -->
<!-- END nav -->
<br>
<div class="full" style="margin-left:630px;margin-bottom:60px;">
        <div class="contents">
            <div class="heading">
                <h2>Welcome <?php echo $username; ?> </h2>
            </div>
            <div class="form">
                <label>Username: <?php echo $username; ?></label>
                
                <label>User Id: <?php echo $uid; ?></label>
                
            </div>
        </div>
    </div>



    <?php
// Replace $uid with the actual user ID you want to fetch orders for
$uid = $_SESSION['uid']; // Example user ID

// SQL query to fetch orders and item details for the given user ID
$sql = "SELECT o.o_id, o.totalprice, o.location, s.item_name
        FROM `order` o
        JOIN `sales_items` s ON o.item_id = s.SI_id
        WHERE o.uid = ?";


// Use prepared statement to prevent SQL injection
$stmt = $conn->prepare($sql);

// Check if the statement was prepared successfully
if ($stmt === false) {
    die('Error: ' . $conn->error);
}

$stmt->bind_param("i", $uid); // Assuming $uid is an integer, adjust the type if needed

// Check if the binding was successful
if ($stmt === false) {
    die('Bind Param Error: ' . $stmt->error);
}

// Execute the statement
$stmt->execute();

// Get the result set
$result = $stmt->get_result();

// Close the prepared statement to free up resources
$stmt->close();

// Check if there are any orders
if ($result->num_rows > 0) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }

            th, td {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            th {
                background-color: #f2f2f2;
            }

            .cancel-btn {
                background-color: #ff6666;
                color: #fff;
                padding: 5px 10px;
                border: none;
                cursor: pointer;
            }
        </style>
        <title>Your Orders</title>
    </head>
    <body>
    <table>
        <p><b>Your Orders</b></p>
        <tr>
            <th>Order ID</th>
            <th>Total Price</th>
            <th>Location</th>
            <th>Item Name</th>
            <th>Status</th>
        </tr>
        <?php
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['o_id']}</td>
                    <td>{$row['totalprice']}</td>
                    <td>{$row['location']}</td>
                    <td>{$row['item_name']}</td>
                    <td>Placed</td>
                  </tr>";
        }
        ?>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function cancelOrder(orderId) {
            $.ajax({
                type: 'POST',
                url: 'cancel_order.php',
                data: { cancel_order: orderId },
                success: function (response) {
                    // Optionally, you can update the UI or provide feedback to the user.
                    alert('Order with ID ' + orderId + ' is canceled.');
                    // Reload the page to reflect changes
                    location.reload();
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Error canceling order. Please try again.');
                }
            });
        }
    </script>
    </body>
    </html>
    <?php
} else {
    echo "<br><center>No Orders Yet!</center>";
}

// Close the database connection
$conn->close();
?>





<!-- next is products that is posted -->
<br>
<?php
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'saplingo';
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Check if the delete button is clicked
if (isset($_POST['delete_product'])) {
    $delete_product_id = mysqli_real_escape_string($conn, $_POST['delete_product']);

    // Perform delete action (you may want to add additional validation and error handling)
    $delete_sql = "DELETE FROM sales_items WHERE SI_id = ?";
    $delete_stmt = mysqli_prepare($conn, $delete_sql);

    if ($delete_stmt) {
        mysqli_stmt_bind_param($delete_stmt, "i", $delete_product_id);
        mysqli_stmt_execute($delete_stmt);
    } else {
        echo "Error preparing delete statement: " . mysqli_error($conn);
    }

    mysqli_stmt_close($delete_stmt);
}

// Fetch product data from the database for the logged-in user
$sql = "SELECT SI_id, Simage, item_name, quantity, description, unit_price FROM sales_items WHERE uid = ?";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    $uid = $_SESSION['uid'];
    mysqli_stmt_bind_param($stmt, "i", $uid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if the user has posted any products
    if (mysqli_num_rows($result) > 0) {
        // Output table with CSS styles
        echo "<style>
                table {
                    width: 95%;
                    border-collapse: collapse;
                    margin-bottom: 20px;
                    margin-left:20px;
                    border-radius:10px;
                    border:1px solid black;
                }

                th, td {
                    border: 1px solid #dddddd;
                    text-align: left;
                    padding: 8px;
                }

                th {
                    background-color: #f2f2f2;
                }
                p{
                    margin-left:30px;
                    font-size:15px;
                }
                button{
                    border:1px solid gray;
                    border-radius:5px;
                    margin-right:20px;
                }
              </style>";

        echo "<form method='post' action='".$_SERVER['PHP_SELF']."'>";
        echo "<table>
                <br><p><b>Your Products</b></p>
                <tr>
                    <th>Image</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Description</th>
                    <th>Unit Price</th>
                    <th>Action</th>
                </tr>";

        // Output data of each row
        // delete and update button when click the button go to process_post.php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td><img src='{$row['Simage']}' alt='Product Image' style='width: 50px; height: 50px;'></td>
                    <td>{$row['item_name']}</td>
                    <td>{$row['quantity']}</td>
                    <td>{$row['description']}</td>
                    <td>{$row['unit_price']}</td>
                    <td><button type='submit' name='delete_product' value='{$row['SI_id']}'>Delete</button>
                    <button type='submit' name='update_product' value='{$row['SI_id']}' formaction='postedit.php'>Update</button></td>
                  </tr>";
        }

        echo "</table>";
        echo "</form>";
    } else {
        echo "<br><center>You haven't posted any products yet!</center>";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Error preparing statement: " . mysqli_error($conn);
}

mysqli_close($conn);
?><br>
