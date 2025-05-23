<?php
// Database connection setup (same as process_post.php)
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'saplingo';

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM sales_items";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Online Sapling Sales</title>
<!--  -->
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
    <link rel="stylesheet" href="new.css">
	<script src="new.js"></script>

	
<!--  -->
    <style>
        #c:hover{
            color:gray;
            font-size: 71px;
        }
        </style>
    
    <!-- Add your JavaScript files here -->
    <script src="js/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="new.js"></script>
</head>
<body class="goto-here">
    <!-- Header section here -->
 
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="saplingo.html" style="text-transform:capitalize;">Saplingo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="product_post.php" class="nav-link">Post A Product</a></li>        
                    <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END Navigation bar -->

    <!-- Hero section -->
    <div class="hero-wrap hero-bread" style="background-image: url('images/img44.jpeg'); height: 700px;border-radius:5px;border:2px solid black;">
    <h2 style="font-weight:700;color:white;text-align:center;font-size:70px;padding-top:120px;"><a id="c"href="" style="color:white;">Shop</h2></a>

        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs" style="font-size: 50px; font-size: 20px;"><span class="mr-2"><a href="index.html" style="font-family: Georgia,'Times New Roman', Times, serif; color: rgb(213, 231, 231);">Home</a></span></p>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero section -->

    <!-- Product categories -->
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 mb-5 text-center">
                    <ul class="product-category">
                        <li><a href="#" class="active">All Products</a></li>
                        
                    </ul>
                </div>
            </div>
            <?php
// Your database connection code
$conn = mysqli_connect("localhost", "root", "", "saplingo");

// Check the database connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assume you have retrieved the product ID, name, price, and quantity from the form
    $productId = mysqli_real_escape_string($conn, $_POST['id']);
    $productName = mysqli_real_escape_string($conn, $_POST['name']);
    $productPrice = mysqli_real_escape_string($conn, $_POST['price']);
    $purchaseQuantity = mysqli_real_escape_string($conn, $_POST['quantity']);

    // Your code to process the purchase and update the quantity in the database
    // Example SQL query:
    $updateQuantityQuery = "UPDATE sales_items SET quantity = quantity - $purchaseQuantity WHERE SI_id = '$productId'";
    
    if (!mysqli_query($conn, $updateQuantityQuery)) {
        die("Error updating quantity: " . mysqli_error($conn));
    }

    // The rest of your checkout logic goes here
}

// Your HTML and form for checkout go here

$sql = "SELECT * FROM sales_items WHERE quantity > 0"; // Filter out items with zero quantity
$result = mysqli_query($conn, $sql);

// Check the query result
if (!$result) {
    die("Error: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    echo '<div class="row">'; // Open the row container

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="col-md-4">'; // Each product takes 4 columns
        echo '<div class="product" style="border-radius: 30px; border: 1px solid rgb(24, 179, 226); text-align: center;">';
        echo '<h2><a href="product.php?id=' . $row['SI_id'] . '">' . $row['item_name'] . '</a></h2>';
        echo '<a href="product.php?id=' . $row['SI_id'] . '"><img src="' . $row['Simage'] . '" alt="' . $row['item_name'] . '" width="300" height="220"></a>';
        
        // Display the product price
        if (isset($row['unit_price'])) {
            echo '<p>Price: Rs. ' . number_format($row['unit_price'], 2) . '</p>';
        } else {
            echo '<p>Price: Not available</p>';
        } 
        
        // Fetch the updated quantity from the database
        $productId = $row['SI_id'];
        $quantityQuery = "SELECT quantity FROM sales_items WHERE SI_id = '$productId'";
        $quantityResult = mysqli_query($conn, $quantityQuery);
        
        if ($quantityResult) {
            $quantityRow = mysqli_fetch_assoc($quantityResult);
            $updatedQuantity = isset($quantityRow['quantity']) ? $quantityRow['quantity'] : 'Not available';
            echo '<p>Quantity: ' . $updatedQuantity . '</p>';
        } else {
            echo '<p>Quantity: Not available</p>';
        }

        echo '</div>';
        echo '</div>';
    }

    echo '</div>'; // Close the row container
} else {
    echo '<div class="col-md-12 text-center">';
    echo '<p>No products found.</p>';
    echo '</div>';
}

// Close the database connection
mysqli_close($conn);
?>


<!--  -->






</div>

            <!-- END Display products -->
        </div>
    </section>
    <!-- END Product categories -->

    <!-- Newsletter subscription section -->
    <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light" style="margin:20px;">
        <div class="container py-4" style="background-color: rgb(171, 218, 235); border-radius: 30px; border: 1px solid black;">
            <div class="row d-flex justify-content-center py-5">
                <div class="col-md-6">
                    <h2 style="font-size: 22px;" class="mb-0">Subscribe to our Newsletter</h2>
                    <span>Get e-mail updates about our latest shops and special offers</span>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <form action="#" class="subscribe-form">
                        <div class="form-group d-flex">
                            <input type="email" class="form-control" placeholder="Enter email address" required >
                            <input type="submit" value="send" class="submit px-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- END Newsletter subscription section -->

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
                <li class="ftco-animate"><a href="https://twitter.com/Twitter"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="https://www.facebook.com/"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="https://www.instagram.com/"><span class="icon-instagram"></span></a></li>
				</ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="shop.php" class="py-2 d-block">Shop</a></li>
                <li><a href="about.html" class="py-2 d-block">About</a></li>
                <li><a href="contact.php" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="my_profile.php" class="py-2 d-block">Orders</a></li>
	                <li><a href="contact.php" class="py-2 d-block">FAQs</a></li>
	                <li><a href="contact.php" class="py-2 d-block">Contact</a></li>
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
    
  </body>
</html>
