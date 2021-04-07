<?php
require_once("../connection.php");
if(isset($_POST['user'])){
	$q='SELECT * FROM `service_recipient`  WHERE `user_name` = "'.$_POST['user'].'"';
	$q1='SELECT * FROM `service_provider`  WHERE `user_name` = "'.$_POST['user'].'"';
	$r=mysqli_query($conn,$q);
	$r1=mysqli_query($conn,$q1);
	if($r||$r1){
		if(mysqli_num_rows($r)>0||mysqli_num_rows($r1)>0){
			while($row=mysqli_fetch_assoc($r)||$row=mysqli_fetch_assoc($r1)){
				$user_name=$row['user_name'];

				//show users
				echo '<option value="'.$user_name.'">';
			}
		}else{
			echo '<option value="no user">';
		}
	}else{
		echo $q;
	}

}

?>