<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content= "width=device-width">
	<title>Online Ambulane Service | Welcome</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
	<link rel="stylesheet" href="./CSS/style.css">
</head>
<body>
	<header>
		<div class="container">
			<div id="branding">
				<h1><span class="highlight">Online Ambulance Service</span></h1>
			</div>
			<nav>
					<ul>
						<li class="current"><a href="home_provider.php">Home</a></li>
						<li><a href="messages.php">Inbox</a></li>
						<!--<li><a href="admin.php">Admin</a></li>-->
						<!--<li><a href="provider_take_service.php">Accept</a></li>-->
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
	</body>
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
?>
