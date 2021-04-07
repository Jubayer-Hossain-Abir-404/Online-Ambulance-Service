<?php require_once("connection.php"); ?>
<?php
	$q="SELECT * FROM `hospital_list`";
	$result=mysqli_query($conn,$q);
	$q1="SELECT * FROM `type_of_ambulance`";
	$result1=mysqli_query($conn,$q1);
	if(isset($_POST['Reserve'])){
		$user_name=$_POST['user_name'];
		$Hospital_name=$_POST['Hospital_name'];
		$ambulance_name=$_POST['ambulance_name'];
		$pickup=$_POST['pickup'];
		//$sql=$conn->prepare("INSERT INTO reservation (hospital_name) values(:hospital_name)");
		//$stmt->close();
		$verification_key=md5(time().$user_name);
		$INSERT= "INSERT Into reservation (user_name,Hospital_name,ambulance_name,pickup,verification_key) values(?,?,?,?,?)";
		$stmt=$conn->prepare($INSERT);
		$stmt->bind_param("sssss", $user_name,$Hospital_name,$ambulance_name,$pickup,$verification_key);
		$stmt->execute();
		$query_info1="SELECT * FROM `service_recipient`";
		$result_info1=mysqli_query($conn,$query_info1);
		//$i=0;
		while($row2=mysqli_fetch_array($result_info1)){
			if($row2[1]==$user_name){
				$email_g=$row2[2];
				$phn=$row2[3];
			}
		}
		$query_m="SELECT * FROM `service_provider`";
      	$result_m=mysqli_query($conn,$query_m);
      	while($row2=mysqli_fetch_array($result_m)){
      	$email=$row2[2];
      	$to= $email;
      	$subject= "New Trip";

      	$message="
      			 Service Receiver: $user_name
      			 Service Receiver Email: $email_g
      			 Service Receiver Number: $phn
      			 Hospital: $Hospital_name
      			 Pickup Location: $pickup
      	<a href=http://localhost:8010/CSE_411_Project/reservation_call.php?verification_key=$verification_key>Click on the link if you want to take this trip?</a>";
     	$headers="From: abirjubayer487625@gmail.com";
     	mail($to,$subject,$message,$headers);
     	//$i++;
      }
      //echo '<p style="color:green">Mail has been sent to the service provider</p>';

	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content= "width=device-width">
	<title>Online Ambulance Service | Welcome</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
	<link rel="stylesheet" href="./CSS/style.css">
	<style>
    	*{margin:0px; padding:0px; }
    	#container{width:300px; margin:0px auto;}
    	.input{width:92%;padding:2%;}
	</style>
</head>
<body>
	
	<header>
		<div class="container">
			<div id="branding">
				<h1><span class="highlight">Online Ambulance Service</span></h1>
			</div>
			<nav>
					<ul>
						<li><a href="home.php">Home</a></li>
						<li class="current"><a href="request_service.php">Reservation</a></li>
            <li><a href="messages.php">Inbox</a></li>
						<li><a href="add_rate.php">System Rating</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
			</nav>
		</div>
	</header>
	<body>
		<h1 align="center">Reservation</h1>
		<div id="container">
    		<form method="post">
     			<!--<input type="text" placeholder="Select Hospital" id="user_name" onkeyup="check_user()" 
            	name="user_name" class="input" required /> <br><br>
            	<div id="checking"></div> -->

            	<input type="text" placeholder="User Name" name="user_name" class="input" required /><br><br>
            	<label>Please Select Hospital: </label>
            	<select name="Hospital_name" class="input">
            		<?php while($row=mysqli_fetch_array($result)):;?>
            		<option value="<?php echo $row[1];?>"><?php echo $row[1];?></option>
            		<?php endwhile; ?>

            	</select><br><br>

            	<label>Please Select Ambulance: </label>
            	<select name="ambulance_name" class="input">
            		<?php while($row=mysqli_fetch_array($result1)):;?>
            		<option value="<?php echo $row[1];?>"><?php echo $row[1];?></option>
            		<?php endwhile; ?>

            	</select><br><br>

            	<input type="text" placeholder="Enter Pickup Location" name="pickup" class="input" required /><br><br>
            	
            	
     			<!--<input type="email" placeholder="Email" name="email" class="input" required /><br><br>
     			<input type="text" placeholder="Phone Number"  name="phone_number" class="input" required> <br><br>
     			<input type="password" placeholder="Password" name="password" class="input" required /><br><br>-->
     			<input type="submit" id ="Reserve" name="Reserve" value="Reserve" />
    		</form>
		</div>
	<!--<script src="js/jquery-3.1.1.min.js"></script>
<script>
    document.getElementById("Register").disabled=true;
  	function check_user(){
    var user_name=document.getElementById("user_name").value;
    //Here we will send the data to user_check.php file
    $.post("js/user_check.php",
    {
      user: user_name
    },

    //in return we will receive data in this fucntion
    function(data,status){
      if(data=='<p style="color:red">User already registered</p>'){
        document.getElementById("Register").disabled=true;
      }else{
        document.getElementById("Register").disabled=false;
      }
      document.getElementById("checking").innerHTML =data;
      //alert(data);

    }


    );

  }
</script>-->
<!--<?php /*if(isset($_POST['Register'])){
  $user_name=$_POST['user_name'];
  $email=$_POST['email'];
  $phone_number=$_POST['phone_number'];
  $password=$_POST['password'];

  //$query="INSERT INTO 'service_recipient' ('user_name','email','phone_number',password') VALUES('".$user_name."', '".$email."','".$phone_number.".'".$password."')";
  //$r=mysqli_query($conn,$query);
    $verification_key=md5(time().$user_name);
    //echo $verification_key;
    $password= mysqli_real_escape_string($conn, $_POST["password"]);
    $password = md5($password);
    $SELECT= "SELECT email From service_recipient Where email = ? Limit 1";
    $INSERT= "INSERT Into service_recipient (user_name, email, phone_number, password,verification_key) values(?, ?, ?, ?, ?)";

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
      $stmt->bind_param("sssss", $user_name, $email, $phone_number, $password, $verification_key);
      $stmt->execute();
      //echo "New record inserted sucessfully";*/
      //Send Mail
      /*$query_m="SELECT * FROM `service_provider`";
      $result_m=mysqli_query($conn,$query_m);
      while(mysqli_fetch_array($result_m)){
      	$email=$row[2];
      	$to= $email;
      	$subject= "Email Verification";
      	$message="<a href=http://localhost:8010/CSE_411_Project/reservation_call.php>Do you wish to take this trip?</a>";
     	$headers="From: abirjubayer487625@gmail.com";
     	mail($to,$subject,$message,$headers);
      }*/
      /*$to= $email;
      $subject= "Email Verification";
      $message="<a href=http://localhost:8010/CSE_411_Project/verify.php?verification_key=$verification_key>Register Account</a>";
      $headers="From: abirjubayer487625@gmail.com";
      mail($to,$subject,$message,$headers);
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
  else{
  //echo "All field are required";
  die();
}*/
  
?>-->
	</body>
</html>
<!--<?php
	/*if($i>0)
	{
		echo '<p style="color:green">Mail has been sent to the service provider</p>';
	}
	else{
		echo '<p style="color:red">Something went wrong</p>';
	}*/
	
?>-->


