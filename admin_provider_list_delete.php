<?php require_once("connection.php");?>
<?php

			if(!$conn){
				die('server not connected');
			}
			//echo "<h3>Delete:<br/></h3>";
			$query= "DELETE from service_provider where id='$_GET[id]'";
			$r= mysqli_query($conn,$query);
			if(mysqli_query($conn,$query)){
				header("refresh:1;url=admin_provider_list.php");
			}
			else{
				echo "Not deleted";
			}





?>