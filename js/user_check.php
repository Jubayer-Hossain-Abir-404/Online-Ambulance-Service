<?php
	require_once("../connection.php");
	if(isset($_POST['user'])){
		//echo $_POST['user'];
		$q='SELECT * FROM `service_recipient` WHERE `user_name`="'.$_POST['user'].'"';
		//$q= "SELECT * FROM service_recipient WHERE user_name = "'.$_POST['user'].'"";
		$r=mysqli_query($conn,$q);
		if($r){
			if(mysqli_num_rows($r)>0){
				//user already exist so
				echo '<p style="color:red">User already registered</p>';
			}else{
				echo '<p style="color:green">You can take this name</p>';
			}
		}
	}

?>