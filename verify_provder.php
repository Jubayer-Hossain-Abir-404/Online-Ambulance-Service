<?php
if(isset($_GET['verification_key'])){
	//process verification
	$verification_key=$_GET['verification_key'];
	$host="localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "ambulance_service";


	//create connection
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
	$SELECT="SELECT verified, verification_key FROM service_provider where verified = 0 AND verification_key='$verification_key' LIMIT 1";
	$resultSet= mysqli_query($conn,$SELECT);
	if($resultSet->num_rows ==1)
	{
		//validate the email
		 $UPDATE= "UPDATE service_provider SET verified = 1 WHERE verification_key = '$verification_key' LIMIT 1";
		 $update=mysqli_query($conn,$UPDATE);
		 if($update){
		 	echo "Your Account has been verified. You may now login.";
		 }
		 else{
		 	echo $mysqli->error;
		 }
	}
	else{
		echo "This account is invalid or already verified";
	}


}

else{
	die("Something Went Wrong");
}

?>