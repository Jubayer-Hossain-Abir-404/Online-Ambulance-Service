<?php

	session_start();
	if(isset($_SESSION['user_name'])){

		//echo 'how are you '.$_SESSION['user_name'];
		//echo '<a href="logout.php">Logout</a>';
	}else{
		header("location:login.php");
	}

?>