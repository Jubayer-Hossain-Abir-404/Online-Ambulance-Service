<?php require_once("connection.php"); ?>

<?php
	if(isset($_GET['email'])){
		$email=$_GET['email'];
		$query_info1="SELECT * FROM `service_recipient`";
		$result_info1=mysqli_query($conn,$query_info1);
		while($row2=mysqli_fetch_array($result_info1)){
			if($row2[2]==$email){
				$user_name=$row2[1];
			}
		}
		$query_info2="SELECT * FROM `reservation`";
		$result_info2=mysqli_query($conn,$query_info2);
		while($row2=mysqli_fetch_array($result_info2)){
			if($row2[1]==$user_name){
				$verification_key=$row2[5];
			}
		}
		$SELECT="SELECT verified, verification_key FROM reservation where verified = 1 AND verification_key='$verification_key' LIMIT 1";
		$resultSet= mysqli_query($conn,$SELECT);
		if($resultSet->num_rows ==1){
		//validate the email
		 	$UPDATE= "UPDATE reservation SET verified = 2 WHERE verification_key = '$verification_key' LIMIT 1";
			 $update=mysqli_query($conn,$UPDATE);
		 	if($update){

		 		//echo "Your Account has been verified. You may now login.";
		 		/*$query_info1="SELECT * FROM `reservation`";
				$result_info1=mysqli_query($conn,$query_info1);
				while($row2=mysqli_fetch_array($result_info1)){
					if($row2[5]==$verification_key){
						$user_name=$row2[1];
					}
				}
				$query_info2="SELECT * FROM `service_recipient`";
				$result_info2=mysqli_query($conn,$query_info2);
				while($row2=mysqli_fetch_array($result_info2)){
					if($row2[1]==$user_name){
						$email=$row2[2];
					}
				}
				header("location:provider_take_service.php?email=".$email) ;*/
				echo "Thank You For using our service";
				/*header("Location: provider_take_service.php");
				if(isset($_POST['Accept'])){
					$user_name=$_POST['user_name'];
					echo $user_name;
				}*/
				/*$to= $email;
      			$subject= "Reservation Complete!!!";

      			$message="
      					  Your reservation has been completed. Within, half an hour the ambulance will arrive 
      					  in the given pickup location.
      			 
      			<a href=http://localhost:8010/CSE_411_Project/reservation_call.php?verification_key=$verification_key>Click on the link if you want to take this trip?</a>";
     			$headers="From: abirjubayer487625@gmail.com";
     			mail($to,$subject,$message,$headers);*/

		 		
			}
			else{
				echo "This account is invalid or already verified";
			}
		}
		else{
			echo "This trip is already completed";
		}
	}
	else{
		die("Something Went Wrong");
	}

?>