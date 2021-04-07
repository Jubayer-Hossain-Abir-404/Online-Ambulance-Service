<?php require_once("connection.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content= "width=device-width">
	<title>Online Ambulane Service | Welcome</title>
	<link rel="stylesheet" href="./CSS/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
	<style>
    	*{margin:0px; padding:0px; }
    	#container{width:300px; margin:0px auto;}
    	.input{width:92%;padding:2%;}
	</style>
<body>
	<header>
		<div class="container">
			<div id="branding">
				<h1><span class="highlight">Online Ambulance Service</span></h1>
			</div>
		</div>
	</header>
	<form method="post">
		<label >Please insert User Name to Accept the trip: </label>
		<input  type="text" placeholder="User Name" name="user_name" class="input" required /><br><br>
		<input type="submit" id ="Accept" name="Accept" value="Accept" />
	</form>
</body>
</html>

<?php 
	if(isset($_POST['Accept'])){
		$user_name=$_POST['user_name'];
		if(isset($_GET['email'])){
			$email=$_GET['email'];
			$query_info1="SELECT * FROM `service_provider`";
			$result_info1=mysqli_query($conn,$query_info1);
			while($row2=mysqli_fetch_array($result_info1)){
				if($row2[1]==$user_name){
					$email_g=$row2[2];
					$phn=$row2[3];
				}
			}
			$to= $email;
			$subject= "Reservation Complete!!!";
			$message="Your reservation has been completed. Within, half an hour the ambulance will arrive 
      				  in the given pickup location.Here, is the service provider details:

      			 	  Service Provider: $user_name
      			      Service Provider Email: $email_g
      			      Service Provider Phone Number: $phn
      	<a href=http://localhost:8010/CSE_411_Project/accept_call.php?email=$email>Click on this link after the trip is completed</a>
      	OR 
      	<a href=http://localhost:8010/CSE_411_Project/cancel_trip.php?email=$email>Click on this link if you want to cancel the trip</a>
      	";
     		$headers="From: abirjubayer487625@gmail.com";
     			mail($to,$subject,$message,$headers);
     			echo '<p style="color:green">A mail has been sent to the service receiver</p>';
		} 			
	}
	
?>
