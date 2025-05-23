<!Doctype HTML>
	<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="cssforadmin.css" type="text/css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style>
        #space{
			margin:400px;
		}
    </style>
	</head>


	<body>
	<div id="mySidenav" class="sidenav">
		<p class="logo"><span>Saplingo<br>Admin</br></span></p>
	  <a href="admin.php" class="icon-a"><i class="fa fa-dashboard icons"></i>   Dashboard</a>
	  <a href="userop.php"class="icon-a"><i class="fa fa-users icons"></i>   User Options</a>
	  <a href="orderop.php"class="icon-a"><i class="fa fa-shopping-bag icons"></i>  Order Options</a>
	  <a href="schedule_order.php"class="icon-a"><i class="fa fa-tasks icons"></i>  User Queries</a>
	  <a href="#"class="icon-a"><i class="fa fa-user icons"></i>   All Products</a>
	  <a href="Alogout.php"class="icon-a"><i class="fa fa-user icons"></i>   log out</a>
	  

	</div>
	<div id="main">
 
		<div class="head">
			<div class="col-div-6">
	<span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >☰ Product Details</span>
	<span style="font-size:30px;cursor:pointer; color: white;" class="nav2"  >☰ Product Details</span>
	</div>
		
		<div class="col-div-6">
		<div class="profile">

			<img src="a.png" class="pro-img" style="border-radius:50%;" />
			<p>Admin<span>Saplingo.in</span></p>
			<a href="Alogout.php"><button>Logout</button></a>
			
	</div>
		<div class="clearfix"></div>
	</div>

		<div class="clearfix"></div>
		<br/>
		

		<div class="clearfix"></div>
		<br/><br/>
		<div class="col-div-8">
			<div class="box-8">
			<div class="content-box">
				<p>All products</p>
				<br/>
                

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .delete-btn {
            background-color: blue;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<?php
// Include your authentication mechanism here

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

// Handle delete action if a product ID is provided in the URL
if (isset($_GET['delete_SI_id'])) {
    $deleteSIId = $_GET['delete_SI_id'];

    // SQL query to delete the product with the specified ID
    $deleteSql = "DELETE FROM sales_items WHERE SI_id = $deleteSIId";

    if ($conn->query($deleteSql) === TRUE) {
        echo '<script>alert("Product deleted successfully!");</script>';
    } else {
        echo '<script>alert("Error deleting product: ' . $conn->error . '");</script>';
    }
}

// SQL query to retrieve all product details
$sql = "SELECT * FROM sales_items";

// Execute the query
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .delete-btn {
            background-color: blue;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<?php
if ($result->num_rows > 0) {
    // Output HTML table headers
    echo '<table>';
    echo '<tr><th>Sales Item ID</th><th>Item Name</th><th>Image</th><th>Unit Price</th><th>Quantity</th><th>Action</th></tr>';

    // Output data from each row
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['SI_id'] . '</td>';
        echo '<td>' . $row['item_name'] . '</td>';
        echo '<td><img src="' . $row['Simage'] . '" alt="' . $row['item_name'] . '" width="100" height="80"></td>';
        echo '<td>' . number_format($row['unit_price'], 2) . '</td>';
        echo '<td>' . $row['quantity'] . '</td>';
        echo '<td><button class="delete-btn" onclick="deleteProduct(' . $row['SI_id'] . ')">Delete</button></td>';
        echo '</tr>';
    }

    // Close the table
    echo '</table>';
} else {
    echo '<p>No products found.</p>';
}

// Close the database connection
$conn->close();
?>

<script>
    // JavaScript function to prompt for confirmation before deleting a product
    function deleteProduct(SIId) {
        var confirmDelete = confirm("Are you sure you want to delete this product?");
        if (confirmDelete) {
            // Redirect to the same page with the delete action
            window.location.href = 'all_product.php?delete_SI_id=' + SIId;
        }
    }
</script>

</body>
</html>




<!--  -->
    <!-- Add any additional JavaScript or HTML here -->



<div id="space"></div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>

	  $(".nav").click(function(){
	    $("#mySidenav").css('width','70px');
	    $("#main").css('margin-left','70px');
	    $(".logo").css('visibility', 'hidden');
	    $(".logo span").css('visibility', 'visible');
	     $(".logo span").css('margin-left', '-10px');
	     $(".icon-a").css('visibility', 'hidden');
	     $(".icons").css('visibility', 'visible');
	     $(".icons").css('margin-left', '-8px');
	      $(".nav").css('display','none');
	      $(".nav2").css('display','block');
	  });

	$(".nav2").click(function(){
	    $("#mySidenav").css('width','300px');
	    $("#main").css('margin-left','300px');
	    $(".logo").css('visibility', 'visible');
	     $(".icon-a").css('visibility', 'visible');
	     $(".icons").css('visibility', 'visible');
	     $(".nav").css('display','block');
	      $(".nav2").css('display','none');
	 });

	</script>

	</body>


	</html>