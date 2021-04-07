<?php require_once("connection.php");?>
<?php

			if(!$conn){
				die('server not connected');
			}
			//echo "<h3>Delete:<br/></h3>";
			$query= "DELETE from rate_system where id='$_GET[id]'";
			$r= mysqli_query($conn,$query);
			if(mysqli_query($conn,$query)){
				header("refresh:1;url=admin_rating_from_receiver.php");
			}
			else{
				echo "Not deleted";
			}





?>