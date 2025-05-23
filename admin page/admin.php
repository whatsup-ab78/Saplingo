<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="cssforadmin.css" type="text/css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    /* Your CSS styles go here */
    /* ... */
	#space{
		padding-bottom:70px;
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
	<span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >☰ Dashboard</span>
	<span style="font-size:30px;cursor:pointer; color: white;" class="nav2"  >☰ Dashboard</span>
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
		
		<div class="col-div-3">
			<div class="box">
			<?php
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

// SQL query to get the total number of users
$sql = "SELECT COUNT(*) as total_users FROM user";

// Execute the query
$result = $conn->query($sql);

// Check for query execution errors
if (!$result) {
    die("Query failed: " . $conn->error);
}

if ($result->num_rows > 0) {
    // Fetch the total number of users
    $row = $result->fetch_assoc();
    $totalUsers = $row['total_users'];
} else {
    $totalUsers = 0;
}

// Close the database connection
$conn->close();
?>



        <p><?php echo $totalUsers;?><br><span>Users</span></p>
        
    

				<i class="fa fa-users box-icon"></i>
			</div>
		</div>
		<div class="col-div-3">
		<?php
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

// SQL query to count rows in the "sales_items" table
$count_sql = "SELECT COUNT(*) AS item_count FROM sales_items";

$result = $conn->query($count_sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $itemCount = $row['item_count'];
} else {
    $itemCount = 0;
}

// Close the database connection
$conn->close();
?>

<div class="box">
    <p><?php echo $itemCount; ?><br/><span>Products</span></p>
    <i class="fa fa-shopping-bag box-icon"></i>
</div>

		</div>
		<div class="col-div-3">
		<?php
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

// SQL query to count rows in the "order" table
$count_sql = "SELECT COUNT(*) AS order_count FROM `order`"; // Use backticks around table name `order`

$result = $conn->query($count_sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $orderCount = $row['order_count'];
} else {
    $orderCount = 0;
}

// Close the database connection
$conn->close();
?>

<div class="box">
    <p><?php echo $orderCount; ?><br><span>Orders</span></p>
    <i class="fa fa-list box-icon"></i>
</div>

		</div>
		
		<div class="clearfix"></div>
		<br/><br/>
		<div class="col-div-8">
			<div class="box-8">
			<div class="content-box">
				<p>All Users </p>
				<br/>
				<?php
// Database connection information
$servername = "localhost"; // Change to your database server
$hostname = "root"; // Change to your database username
$password = ""; // Change to your database password
$dbname = "saplingo"; // Change to your database name

// Create a connection to the database
$conn = new mysqli($servername, $hostname, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve data from the "user" table
$sql = "SELECT uid, username, status FROM user";

// Execute the query
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output HTML table headers
    echo '<table>';
    echo '<tr><th>User ID</th><th>Username</th><th>User Status</th></tr>';

    // Output data from each row
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['uid'] . '</td>';
        echo '<td>' . $row['username'] . '</td>';
        echo '<td>' . $row['status'] . '</td>';
        echo '</tr>';
    }

    // Close the table
    echo '</table>';
} else {
    echo "No data found in the 'user' table.";
}

// Close the database connection
$conn->close();
?>
<div id="space"></div>

			</div>
		</div>
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
	