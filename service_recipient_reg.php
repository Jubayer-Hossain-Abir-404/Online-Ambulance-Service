<?php
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$phone_number=$_POST['phone_number'];
$password=$_POST['password'];

if(!empty($first_name) || !empty($last_name) || !empty($email) || !empty($phone_number) || !empty($password)){
	$host="localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "ambulance_service";


	//create connection
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

	if(mysqli_connect_error()){
		die('Connect Error('.mysqli_connect_errno().')'. mysqli_connect_error());
	}else{
		$verification_key=md5(time().$last_name);
		//echo $verification_key;
		$password= mysqli_real_escape_string($conn, $_POST["password"]);
		$password = md5($password);
		$SELECT= "SELECT email From service_recipient Where email = ? Limit 1";
		$INSERT= "INSERT Into service_recipient (first_name, last_name, email, phone_number, password,verification_key) values(?, ?, ?, ?, ?,?)";

		//prepare statement
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s",$email);
		$stmt->execute();
		$stmt->bind_result($email);
		$stmt->store_result();
		$rnum= $stmt->num_rows;

		if($rnum==0){
			$stmt->close();

			$stmt=$conn->prepare($INSERT);
			$stmt->bind_param("ssssss", $first_name, $last_name, $email, $phone_number, $password,$verification_key);
			$stmt->execute();
			//echo "New record inserted sucessfully";
			//Send Mail
			$to= $email;
			$subject= "Email Verification";
			$message="<a href=http://localhost:8010/CSE_411_Project/verify.php?verification_key=$verification_key>Register Account</a>";
			$headers="From: abirjubayer487625@gmail.com";
			//$headers= "MIME-Version: 1.0" . "\r\n";
			//$headers .="Content-type:text/html;charset=UTF-8" ."\r\n"; 
			//mail($to,$subject,$message,$headers);
			//mail($to,$subject,$message,$headers);
			mail($to,$subject,$message,$headers);


			header('location:thankyou.php');
		}
		else{
			echo "Someone already registered using this mail";
		}
		$stmt->close();
		$conn->close();

	}
}
else{
	echo "All field are required";
	die();
}
?>