<?php
//Start the session (this should be at the top of every PHP page where you use sessions).
session_start(); 

// Check if the user is not logged in, redirect them to the login page.
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: Ulogin.php"); // Replace 'login.php' with your actual login page URL.
    exit;
 }

// Your product1.php page content here.
//?>
<!DOCTYPE html>
<html>
<head>
    <title>Post Your Product</title>
    <style>
		
	</style>
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
    <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
    <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
        <div class="dropdown-menu" aria-labelledby="profileDropdown">
			<a class="dropdown-item" href="my_profile.php">My Profile</a>
      <a class="dropdown-item" href="ALogin.php">Admin Portal</a>
        </div>
    </li>
</ul>
	  </div>
	</div>
  </nav>
<!-- END nav -->

<!--  -->




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <div class="full" style="margin-left: 560px;">
        <br>
        <div class="contents">

            <h1 class="heading">Edit Product</h1><br>
            <div class="form">
            
            <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection setup (replace with your credentials)
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'saplingo';

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Update Operation
if (isset($_POST['update'])) {
    $SI_id = $_POST['SI_id'];
    $item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $unit_price = floatval($_POST['unit_price']);
    $quantity = intval($_POST['quantity']);

    $update_sql = "UPDATE sales_items SET item_name=?, description=?, unit_price=?, quantity=? WHERE SI_id=?";
    $update_stmt = mysqli_prepare($conn, $update_sql);

    if ($update_stmt) {
        mysqli_stmt_bind_param($update_stmt, "ssdii", $item_name, $description, $unit_price, $quantity, $SI_id);

        if (mysqli_stmt_execute($update_stmt)) {
            // Display a JavaScript alert and redirect after a successful update
            echo "<script>
                    alert('Update successful!');
                    window.location.href = 'shop.php';
                  </script>";
            exit(); // Make sure to exit after the redirection
        } else {
            echo "Error updating product details: " . mysqli_stmt_error($update_stmt);
        }

        mysqli_stmt_close($update_stmt);
    } else {
        echo "Error preparing update statement: " . mysqli_error($conn);
    }
}

// Form for Updating Product
if (isset($_POST['update_product'])) {
    $SI_id = $_POST['update_product'];

    $sql = "SELECT * FROM sales_items WHERE SI_id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $SI_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $product = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);

        if ($product) {
            // Display the form for updating product details
            echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
            echo "<input type='hidden' name='SI_id' value='{$product['SI_id']}'>";
            echo "<label for='item_name'>Item Name:</label>";
            echo "<input type='text' name='item_name' value='{$product['item_name']}' required>";
            echo "<br>";
            echo "<label for='description'>Description:</label>";
            echo "<textarea name='description' required>{$product['description']}</textarea>";
            echo "<br>";
            echo "<label for='unit_price'>Unit Price:</label>";
            echo "<input type='number' name='unit_price' value='{$product['unit_price']}' step='0.01' required>";
            echo "<br>";
            echo "<label for='quantity'>Quantity:</label>";
            echo "<input type='number' name='quantity' value='{$product['quantity']}' required>";
            echo "<br>";
            echo "<input type='submit' name='update' value='Update Product'>";
            echo "</form>";
        } else {
            echo "Product not found.";
        }
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>



            






                <hr>

                

            </div>
        </div>
        <br>
    </div>
    <br>
</body>
</html>



    <!-- footer -->
    <footer class="ftco-footer ftco-section" style="background-color:rgb(128, 133, 132);">
		<div class="container">
			<div class="row">
				<div class="mouse">
						  <a href="#" class="mouse-icon">
							  <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						  </a>
					  </div>
			</div>
		  <div class="row mb-5">
			<div class="col-md">
			  <div class="ftco-footer-widget mb-4">
				<h2 class="ftco-heading-2">saplingo</h2>
				<p>Here you can purchase the saplings you need with high quality</p>
				<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
				  <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
				  <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
				  <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
				</ul>
			  </div>
			</div>
			<div class="col-md">
			  <div class="ftco-footer-widget mb-4 ml-md-5">
				<h2 class="ftco-heading-2">Menu</h2>
				<ul class="list-unstyled">
				  <li><a href="#" class="py-2 d-block">Shop</a></li>
				  <li><a href="#" class="py-2 d-block">About</a></li>
				  <li><a href="#" class="py-2 d-block">Journal</a></li>
				  <li><a href="#" class="py-2 d-block">Contact Us</a></li>
				</ul>
			  </div>
			</div>
			<div class="col-md-4">
			   <div class="ftco-footer-widget mb-4">
				<h2 class="ftco-heading-2">Help</h2>
				<div class="d-flex">
					<ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
					  <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
					  <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
					  <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
					  <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
					</ul>
					<ul class="list-unstyled">
					  <li><a href="#" class="py-2 d-block">FAQs</a></li>
					  <li><a href="#" class="py-2 d-block">Contact</a></li>
					</ul>
				  </div>
			  </div>
			</div>
			<div class="col-md">
			  <div class="ftco-footer-widget mb-4">
				  <h2 class="ftco-heading-2">Have a Questions?</h2>
				  <div class="block-23 mb-3">
					<ul>
					  <li><span class="icon icon-map-marker"></span><span class="text">Changanacherry MC Road, Kottayam, Kerala</span></li>
					  <li><a href="#"><span class="icon icon-phone"></span><span class="text">+91 2233445566</span></a></li>
					  <li><a href="#"><span class="icon icon-envelope"></span><span class="text">saplingo@gmail.com</span></a></li>
					</ul>
				  </div>
			  </div>
			</div>
		  </div>
		  <div class="row">
			<div class="col-md-12 text-center">
  
			  <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  </p>
			</div>
		  </div>
		</div>
	  </footer>
	  <!-- end footer -->
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
    
  </body>
</html>

    