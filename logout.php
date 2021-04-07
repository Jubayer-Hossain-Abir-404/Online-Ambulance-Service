<?php
	session_start();
	if(isset($_SESSION['user_name'])){
		//session is active let it destroy
		unset($_SESSION['user_name']);
		header('location:login.html');
	}
	else{
		header('location:login.html');
	}
	header('location:login.html');

?>