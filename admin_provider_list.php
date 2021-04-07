<?php require_once("connection.php");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content= "width=device-width">
	<title>Online Ambulance Service | Welcome</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
	<link rel="stylesheet" href="./CSS/style.css">
	<style type="text/css">
		table{
			border-collapse: collapse;
			width:100%;
			color:#d96459;
			font-family: monospace;
			font-size: 25px;
			text-align:left;
		}
		th{
			background-color:#d96459;
			color:white;
		}
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
						<!--<li><a href="home.php">Home</a></li>-->
						<li><a href="home_admin.php">Admin</a></li>
						<li><a href="admin_receiver_list.php">Service Receiver List</a></li>
						<li class="current"><a href="admin_provider_list.php">Service Provider List</a></li>
						<li><a href="admin_hospital_list.php">Hospital List</a></li>
						<li><a href="admin_rating_from_receiver.php">Receiver Rating</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
			</nav>
		</div>
	</header>
	<table>
		<tr>
			<th>Id</th>
			<th>UserName</th>
			<th>Email</th>
			<th>Phone Number</th>
			<th>Delete</th>
		</tr>
		<?php
			echo "<br/><br/>";
			//$conn=mysqli_connect('localhost','root','','audiolibdb');
			if(!$conn){
				die('server not connected');
			}
			echo "<h3>Service Receiver List:<br/></h3>";
			$query= "select * from service_provider";
			$r= mysqli_query($conn,$query);
			$a=mysqli_num_rows($r);
			if($a>0){
				while($row=mysqli_fetch_array($r)){
					//echo $row['id'];
					echo "<tr><td>".$row['id']."</td><td>".$row['user_name']."</td><td>".$row['email']."</td><td>".$row['phone_number']."</td><td><a href=admin_provider_list_delete.php?id=".$row['id'].">Delete</a></td></tr>";
					//echo "<td><a href=admin_provider_list_delete.php?id=".$row['id'].">Delete</a></td>";

					//echo "<br/>";
				}
				echo "</table>";
			}
			else{
				echo "0 result";
			}

			mysqli_close($conn);

		?>
	</table>