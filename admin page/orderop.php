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
		#noorder{
			color:white;
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
	  <a href="all_product.php"class="icon-a"><i class="fa fa-user icons"></i>   All Products</a>
	  <a href="Alogout.php"class="icon-a"><i class="fa fa-user icons"></i>   log out</a>

	  

	</div>
	<div id="main">
 
		<div class="head">
			<div class="col-div-6">
	<span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >☰ Order Options</span>
	<span style="font-size:30px;cursor:pointer; color: white;" class="nav2"  >☰ Order Options</span>
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
				<p>Orders</p>
				<br/>
                <?php
// Include your database connection file if not already included
// include 'db_connection.php';

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
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['order_id']) && isset($_GET['item_id'])) {
    $orderId = $_GET['order_id'];
    $itemId = $_GET['item_id'];

    // Update order status to 'confirmed' in the `order` table
    $updateOrderStatusSql = "UPDATE `order` SET status = 'placed' WHERE o_id = $orderId";
    $conn->query($updateOrderStatusSql);

    // Decrement quantity in the `sales_items` table
    $decrementQuantitySql = "UPDATE `sales_items` SET quantity = quantity - 1 WHERE SI_id = $itemId";
    $conn->query($decrementQuantitySql);

    // You can add more error handling and response if needed

    // Close the database connection
    $conn->close();

    // Redirect back to the original page or do any other necessary action
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit;
}

// Fetch orders from the 'order' table
$sql = "SELECT o_id, item_id, location, firstname, lastname, status FROM `order`";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo '<table>';
    echo '<tr><th>Order ID</th><th>Item ID</th><th>Location</th><th>First Name</th><th>Last Name</th><th>Action</th></tr>';

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["o_id"] . '</td>';
        echo '<td>' . $row["item_id"] . '</td>';
        echo '<td>' . $row["location"] . '</td>';
        echo '<td>' . $row["firstname"] . '</td>';
        echo '<td>' . $row["lastname"] . '</td>';
        echo '<td>';
        
        // Check if the order is not yet confirmed
        if ($row["status"] == 'pending') {
            echo '<button onclick="confirmOrder(' . $row["o_id"] . ', this, ' . $row["item_id"] . ')">Confirm Order</button>';
        } else {
            echo 'Order Placed';
        }
        
        echo '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo '<p5 id="noorder">No orders found</p>';
}

// Close the database connection
$conn->close();
?>
<div id="space"></div>
<script>
function confirmOrder(orderId, button, itemId) {
    // Send an AJAX request to update the order status and decrement quantity
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Disable the button and update its text
            button.disabled = true;
            button.innerText = 'Order Placed';
        }
    };
    xhr.open("GET", "orderop.php?order_id=" + orderId + "&item_id=" + itemId, true);
    xhr.send();
}
</script>

			</div>
		</div>
		</div>

			
		<div class="clearfix"></div>
	</div>


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