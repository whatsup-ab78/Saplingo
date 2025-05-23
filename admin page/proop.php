<!Doctype HTML>
	<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="cssforadmin.css" type="text/css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>


	<body>
	<div id="mySidenav" class="sidenav">
		<p class="logo"><span>Saplingo<br>Admin</br></span></p>
	  <a href="admin.php" class="icon-a"><i class="fa fa-dashboard icons"></i>   Dashboard</a>
	  <a href="userop.php"class="icon-a"><i class="fa fa-users icons"></i>   User Options</a>
	  <a href="proop.php"class="icon-a"><i class="fa fa-shopping-bag icons"></i>  Products Options</a>
	  <a href="#"class="icon-a"><i class="fa fa-tasks icons"></i>   Inventory</a>
	  <a href="#"class="icon-a"><i class="fa fa-user icons"></i>   Accounts</a>
	  <a href="#"class="icon-a"><i class="fa fa-list-alt icons"></i>   Tasks</a>

	</div>
	<div id="main">

		<div class="head">
			<div class="col-div-6">
	<span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >☰ Dashboard</span>
	<span style="font-size:30px;cursor:pointer; color: white;" class="nav2"  >☰ Dashboard</span>
	</div>
		
		<div class="col-div-6">
		<div class="profile">

		<img src="\Mini\final\images\avatar.png" class="pro-img" />
			<p>Admin<span>Saplingo.in</span></p>
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
				<p>Products <span>Sell All</span></p>
				<br/>
		
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