<?php
// Database connection setup (same as your existing code)
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'saplingo';

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the product ID from the query parameter
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    
    // Retrieve product details based on the ID
    $sql = "SELECT * FROM sales_items WHERE SI_id = $product_id"; // Update column names
    $result = mysqli_query($conn, $sql);
    
    if (!$result) {
        echo 'Error fetching product details: ' . mysqli_error($conn);
    } else {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // You can remove the code that displays product details here
        } else {
            echo 'Product not found';
        }
    }
} else {
    echo 'Invalid product ID';
}
?>

<!DOCTYPE html>
<html lang="en">
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
	          <li class="nav-item dropdown">
              
            </li>
	          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row">	
			<div class="row">
    <div class="col-lg-6 ftco-animate">
	<?php
// Display the product image here
echo '<a href="' . $row['Simage'] . '" class="image-popup"><img src="' . $row['Simage'] . '" class="img-fluid" alt="' . $row['item_name'] . '"></a>';
?>
</div>
<div class="col-lg-6 product-details pl-md-5 ftco-animate">
<?php
// Display product details here with updated column names
echo '<h3 class="mb-4">' . $row['item_name'] . '</h3>';
echo '<p class="price"><span id="displayPrice">Rs.' . number_format($row['unit_price'], 2) . '</span></p>';
echo '<p class="mb-4">' . $row['description'] . '</p>';
?>
<div class="col-md-12">
<?php
    echo '<p style="color: #000;">' . $row['quantity'] . ' Units available</p>';
?>

<!-- Quantity input and buttons -->
<div class="quantity-section">
    <button onclick="decreaseQuantity()" class="quantity-btn">-</button>
    <input  disabled type="number" id="quantityInput" name="quantity_enterd" value="1" min="0" oninput="updatePrice()">
    <button onclick="increaseQuantity()" class="quantity-btn">+</button>
</div>
</div>
<?php
    // Assuming $row is the current product data fetched from the database
    $productId = $row['SI_id'];
    $productName = $row['item_name'];
    $productPrice = $row['unit_price'];
    $productQuantity = $row['quantity'];

    echo '<p class="mt-4"><a id="buyNowBtn" href="#" onclick="checkQuantity(' . $productId . ', \'' . $productName . '\', ' . $productPrice . ', 1);" class="btn btn-black py-3 px-5">Buy Now</a></p>';
?>

<script>
    function checkQuantity(productId, productName, productPrice, quantity) {
        if (<?php echo $productQuantity; ?> > 0) {
            // Redirect to the next page
            window.location.href = 'checkout.php?id=' + productId + '&name=' + productName + '&price=' + productPrice + '&quantity=' + quantity;
        } else {
            // Display an alert if the quantity is zero
            alert('Sorry, ' + productName + ' is out of stock.');
        }
    }
</script>


<script>
    function increaseQuantity() {
        var quantityInput = document.getElementById('quantityInput');
        var currentQuantity = parseInt(quantityInput.value, 10);
        var maxQuantity = <?php echo $row['quantity']; ?>; // Maximum available quantity

        if (currentQuantity < maxQuantity) {
            quantityInput.value = currentQuantity + 1;
            updatePrice();
        }
    }

    function decreaseQuantity() {
        var quantityInput = document.getElementById('quantityInput');
        var currentQuantity = parseInt(quantityInput.value, 10);

        // Optionally, you can update the displayed price based on the new quantity
        updatePrice();

        if (currentQuantity > 1) {
            // Decrease the input value by 1
            quantityInput.value = currentQuantity - 1;
        }
    }

    function updatePrice() {
        var quantity = document.getElementById('quantityInput').value;
        var unitPrice = <?php echo json_encode($row['unit_price']); ?>;
        var totalPrice = quantity * unitPrice;

        document.getElementById('displayPrice').innerText = 'Rs.' + totalPrice.toFixed(2);

        var buyNowBtn = document.getElementById('buyNowBtn');
        buyNowBtn.href = 'checkout.php?id=<?php echo htmlspecialchars($row['SI_id']); ?>&name=<?php echo urlencode($row['item_name']); ?>&price=' + totalPrice + '&quantity=' + quantity;
    }
</script>



	<!--  -->
    </div>
</div>

</div>

                </div>
            </div>
        </div>
    </section>
		<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
          <div class="col-md-6">
          	<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
          	<span>Get e-mail updates about our latest shops and special offers</span>
          </div>
          <div class="col-md-6 d-flex align-items-center">
            <form action="#" class="subscribe-form">
              <div class="form-group d-flex">
                <input type="text" class="form-control" placeholder="Enter email address">
                <input type="submit" value="Subscribe" class="submit px-3">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
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