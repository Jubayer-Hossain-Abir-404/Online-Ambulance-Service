<?php
	require_once("../connection.php");
	if(isset($_POST['hospital'])){
		//echo $_POST['user'];
		$q='SELECT * FROM `hospital_list` WHERE `hospital_name`="'.$_POST['hospital'].'"';
		//$q= "SELECT * FROM service_recipient WHERE user_name = "'.$_POST['user'].'"";
		$r=mysqli_query($conn,$q);
		if($r){
			if(mysqli_num_rows($r)>0){
				//user already exist so
				echo '<p style="color:red">Hospital Already Added</p>';
			}else{
				echo '<p style="color:green">You can add this Hospital</p>';
			}
		}
	}

?>