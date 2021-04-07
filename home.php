<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content= "width=device-width">
	<title>Online Ambulane Service | Welcome</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
	<link rel="stylesheet" href="./CSS/style.css">
	<!--<script type="text/javascript" src="js/googlemap.js"></script>-->
	<!--<style type="text/css">
		.container {
			height: 450px;
		}
		#map {
			width: 100%;
			height: 100%;
			border: 1px solid blue;
		}
	</style>-->
</head>
<body>
	<header>
		<div class="container">
			<div id="branding">
				<h1><span class="highlight">Online Ambulance Service</span></h1>
			</div>
			<nav>
					<ul>
						<li class="current"><a href="home.php">Home</a></li>
						<!--<li><a href="admin.php">Admin</a></li>-->
						<li><a href="request_service.php">Reservation</a></li>
						<li><a href="add_rate.php">System Rating</a></li>
						<li><a href="messages.php">Inbox</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
			</nav>
		</div>
	</header>

	
	<div class="container">
		<center><h1>Map Location</h1></center>
		<div id="map"></div>
	</div>
	<form method="POST">
		<p>
			<input type="text" name="address" placeholder="Enter Address">
		</p>

		 <input type="submit" name="submit_address">
	</form> 

	<!--<form method="POST">
		<p>
			<input type="text" name="latitude" placeholder="Enter latitude">
		</p>

		<p>
			<input type="text" name="longitude" placeholder="Enter longitude">
		</p>

		<input type="submit" name="submit_coordinates">
	</form> -->



</body>
<!--<script async defer
	src="https://maps.googleapis.com/maps/api/
	js?key=callback=loadMap">
</script> -->
</html>

<?php
	if (isset($_POST["submit_address"]))
	{
		$address= $_POST["address"];
		$address = str_replace(" ", "+", $address);
		?>

		<iframe width="100%" height="500" src= "https://maps.google.com/maps?q=<?php echo $address; ?>&output=embed"></iframe>

		<?php 
	}

	/*if(isset($_POST["submit_coordinates"]))
	{
		$latitude= $_POST["latitude"];
		$longitude = $_POST["longitude"];
		?>

		<iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $latitude; ?>,<?php echo $longitude; ?>$output=embed"></iframe>
		<?php
	}*/
?>
