<?php
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$phone_number=$_POST['phone_number'];
$bkash_number=$_POST['bkash_number'];
$nid_number=$_POST['nid_number'];
$profession=$_POST['profession'];
$gender=$_POST['gender'];
$password=$_POST['password'];

if(!empty($first_name) || !empty($last_name) || !empty($email) || !empty($phone_number) || !empty($bkash_number) || !empty($nid_number) || !empty($profession) || !empty($gender) || !empty($password)){
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
		
		$SELECT= "SELECT email From service_provider Where email = ? Limit 1";
		$INSERT= "INSERT Into service_provider (first_name, last_name, email, phone_number, bkash_number, nid_number, profession, gender, password) values(?, ?, ?, ?, ?, ?, ?, ?, ?)";

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
			$stmt->bind_param("sssssssss", $first_name, $last_name, $email, $phone_number, $bkash_number, $nid_number, $profession, $gender, $password);
			$stmt->execute();
			echo "New record inserted sucessfully";
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