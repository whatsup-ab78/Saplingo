<!Doctype HTML>
	<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="cssforadmin.css" type="text/css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style>
		/* Unvisited link */
#send_mail:link {
    color: blue; /* Change the color to your preferred unvisited color */
}

/* Visited link */
#send_mail:visited {
    color: purple; /* Change the color to your preferred visited color */
}

/* Mouse over link */
#send_mail:hover {
    color: red; /* Change the color to your preferred hover color */
}

/* Selected link */
#send_mail:active {
    color: green; /* Change the color to your preferred active color */
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
	<span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >☰ User Queries</span>
	<span style="font-size:30px;cursor:pointer; color: white;" class="nav2"  >☰ User Queries</span>
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
		
		
		<div class="col-div-8">
			<div class="box-8">
			<div class="content-box">
				<p>All Queries</p>
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
$sql = "SELECT q_id, name, email, mobile_no, queries FROM user_queries";

// Execute the query
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output HTML table headers
    echo '<table>';
    echo '<tr><th>Q_id</th><th>Name</th><th>Queries</th><th>Send Email</th></tr>';

    // Output data from each row
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['q_id'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td style="height: 70px;width:200px;">' . $row['queries'] . '</td>';
		echo '<td><a id="send_mail" href="mailto:' . $row['email'] . '">Send Email</a></td>';

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
<br>
<div id="space" style="margin:100px;"></div>


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