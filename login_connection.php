<?php 
session_start();
require_once("connection.php"); 
?>
<?php
	//session_start();
	//$user_name=filter_input(INPUT_POST,'user_name');
	//$email=filter_input(INPUT_POST,'email');
	//$password=filter_input(INPUT_POST,'password');
	//if(!empty($email)|| !empty($password)){
		//$host="localhost";
		//$dbusername="root";
		//$dbpassword="";
		//$dbname="ambulance_service";

		//create connection
		//$conn=new mysqli ($host,$dbusername,$dbpassword,$dbname);
			//if(mysqli_connect_error()){
				//die('Connect Error ('.mysqli_connect_errno() .') '
					//. mysqli_connect_error());
			//}
			//else{
				/*$i=0;
				$sql="select * from service_recipient";
				$r= mysqli_query($conn,$sql);
				while($row=mysqli_fetch_array($r)){
					if($row['email']==$email&&$row['password']==$password){
						$i=1;
						header('Location: home.php');
						echo "<br/>";
						
					}*/
					if(isset($_POST['Login'])){
						$User=$_POST['User'];
        				$user_name = $_POST['user_name'];
        				//$email = $_POST['email'];
        				$password=$_POST['password'];
        				if($User=='Admin'&&$user_name='Admin'&&$password=='Admin'){
							$_SESSION['user_name']=$user_name;
							//echo $_SESSION['user_name'];
							header("Location: home_admin.php");
						}
						$user_name=mysqli_real_escape_string($conn, $_POST['user_name']);
						$password=mysqli_real_escape_string($conn,$_POST['password']);
						$password=md5($password);
						$sql= "SELECT * FROM service_recipient WHERE user_name='$user_name' AND '$password'";
						$query=mysqli_query($conn, $sql);
						$result=mysqli_num_rows($query);
						$sql1= "SELECT * FROM service_provider WHERE user_name='$user_name' AND '$password'";
						$query1=mysqli_query($conn, $sql1);
						$result1=mysqli_num_rows($query1);
						$sql2= "SELECT * FROM admin WHERE user_name='$user_name' AND '$password'";
						$query2=mysqli_query($conn, $sql2);
						$result2=mysqli_num_rows($query2);
						if($result>0&&$User=='Service_Receiver'){
							$_SESSION['user_name']=$user_name;
							//echo $_SESSION['user_name'];
							header("Location: home.php");
						}
						elseif($result1>0&&$User=='Service_Provider'){
							$_SESSION['user_name']=$user_name;
							//echo $_SESSION['user_name'];
							header("Location: home_provider.php");
						}
						else{
							echo '<a href="service_recipient.php">Register as a Service Recipient</a>';
							echo "<br/>";
							echo "<br/>";
							echo '<a href="service_provider.html">Register as a Service Provider</a>';
						}
				}
				/*if($i==0){
					$sql="select * from service_provider";
					$r=mysqli_query($conn,$sql);
					while($row=mysqli_fetch_array($r)){
						if($row['email']==$email&&$row['password']==$password){
							$i=1;
							header('Location: home.php');
							echo "<br/>";
						}
					}
				}
				if($i==0){
					//echo "You must register first<br/>";
					//echo '<a href="register.php"'</a>';
					echo '<a href="service_recipient.php">Register as a Service Recipient</a>';
					echo "<br/>";
					echo "<br/>";
					echo '<a href="service_provider.html">Register as a Service Provider</a>';
				}*/
				//$conn->close();
			
			
	
		


?>

