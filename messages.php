<?php require_once("connection.php");?>
<?php
	session_start();
	if(isset($_SESSION['user_name'])){
		//
	}
?>

<!DOCTYPE html>
<html>
<style>
	<?php require_once("js/style.php");?>
	
</style>

<body>
	<?php require_once("js/new-message.php"); ?>
	<div id="container">
		<div id="menu">
			<?php 
				echo $_SESSION['user_name'];
			?>
		</div>
		<div id="left-col">
			
			<?php require_once("js/left-col.php"); ?>

		<!--end of left column-->
		</div>
		<div id="right-col">
			<?php require_once("js/right-col.php"); ?>
			<!--end of right column-->
		</div>
	</div>
</body>
</html>
			<!--<?php 
			//require_once("connection.php");
			//echo $_SESSION['user_name'];
			/*$host="localhost";
			$dbUsername = "root";
			$dbPassword = "";
			$dbname = "ambulance_service";


			//create connection
			$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
			$sql="select * from service_recipient";
			if(isset($_POST['Login'])){
  				
  				$email=$_POST['email'];
 				$password=$_POST['password'];
				$r= mysqli_query($conn,$sql);
				while($row=mysqli_fetch_array($r)){
					if($row['email']==$email){
						//echo "Log In Successfull";
						//echo '<a href="home.php">Log In Successfull</a>';
						echo $row['user_name'];
					}
				}
			}*/
			?>-->
			<!--<?php
				/*require_once("connection.php");

				/*if(isset($_POST['gmail'])){
				//echo $_POST['user'];
				$q='SELECT * FROM `service_recipient` WHERE `email`="'.$_POST['email'].'"';
				//$q= "SELECT * FROM service_recipient WHERE user_name = "'.$_POST['user'].'"";
				$r=mysqli_query($conn,$q);
				if($r){
					if(mysqli_num_rows($r)>0){
						//user already exist so
						//echo '<p style="color:red">User already registered</p>';
						echo $row['user_name'];
						echo "Hello";
					}else{
						//echo '<p style="color:green">You can take this name</p>';
			}
		}
	}*/
	/*$email=filter_input(INPUT_POST,'email');
	$password=filter_input(INPUT_POST,'password');
	$email=mysqli_real_escape_string($conn, $_POST['email']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	$password=md5($password);
	$sql= "SELECT * FROM service_recipient WHERE email='$email' AND '$password'";
	$query=mysqli_query($conn, $sql);
	$result=mysqli_num_rows($query);
	if($result== 1 ){
		//header("Location: home.php");
		echo $email;
	}*/

?>
		</div>
	</div>
</body>
</html>


<?php
	//else{
		//header("location:login.php");
	//}

?>-->