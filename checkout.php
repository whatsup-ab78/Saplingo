<?php
//Start the session (this should be at the top of every PHP page where you use sessions).
session_start(); 

// Check if the user is not logged in, redirect them to the login page.
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: Ulogin.php"); // Replace 'login.php' with your actual login page URL.
    exit;
 }

// Your checkout.php page content here.
//?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Online sapling sales.org</title>
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
    <link rel="stylesheet" href="new.css">
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

        form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%; /* Make the form take up 100% of the available width */
            max-width: 400px; /* Set a maximum width for the form */
        }

        h3 {
            color: #333;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input, select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .cart-details {
            margin-top: 15px;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }

        .total-price {
            font-weight: bold;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%; /* Make the button full-width */
        }

        button:hover {
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
	          <li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="shop.php">Shop</a>
                <a class="dropdown-item" href="checkout.php">Checkout</a>
              </div>
            </li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
	          <li class="nav-item cta cta-colored"><a href="cart.html" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
      <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Checkout</span></p>
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>
    <br><br>
    <div id="g" style="margin-left:520px;">
    <form action="checkout_process.php" method="post">
    <h3>Billing Details</h3>
    
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" required>
    </div>

    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" required>
    </div>

    <div class="form-group">
        <label for="pickuppoint">Shipping Address:</label><br>
        <textarea name="pickuppoint" rows="4" cols="40" required></textarea><br><br>
        <!--  -->
    </div>

    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" placeholder="Enter your phone number" required>
    </div>

    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" name="email" placeholder="Enter your email address" required>
    </div>

    <!-- Product details -->
    <div class="cart-details">
        <span>Product Name:</span>
        <span><?php echo $_GET['name']; ?></span>
        <br>
        <span>Price:</span>
        <span><?php echo $_GET['price']; ?></span>
        <br><span>Delivery: Rs.20</span>
        <br>
        <span>Quantity:</span>
        <span><?php echo $_GET['quantity']; ?></span>
        <br>
    </div>

   <div class="cart-details total-price">
    <span>Total:</span>
    <?php 
    $price = floatval($_GET['price']);
    $totalPrice = $price + 20;
    $quantity = isset($_GET['quantity']) ? intval($_GET['quantity']) : 1; // Get the quantity entered by the user
    ?>
    <span>Rs.<?php echo number_format($totalPrice, 2); ?></span>
    <input type="hidden" name="totalPrice" value="<?php echo $totalPrice; ?>">
    <input type="hidden" name="productId" value="<?php echo $productId = $_GET['id']; ?>">
    <input type="hidden" name="quantity" value="<?php echo $quantity; ?>"> <!-- Include the quantity entered by the user -->
</div>


   <br> <button type="submit" class="btn btn-primary">Place Order</button><br>
</form>
      </div>
      </div>
      </div>
      </body>
</html>