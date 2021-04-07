<?php require_once("connection.php");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content= "width=device-width">
	<title>Online Ambulane Service | Welcome</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
	<link rel="stylesheet" href="./CSS/style.css">
	<style>
    	*{margin:0px; padding:0px; }
    	#container{width:300px; margin:0px auto;}
    	.input{width:92%;padding:2%;}
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
						<li class="current"><a href="home_admin.php">Admin</a></li>
						<li><a href="admin_receiver_list.php">Service Receiver List</a></li>
						<li><a href="admin_provider_list.php">Service Provider List</a></li>
            <li><a href="admin_hospital_list.php">Hospital List</a></li>
            <li><a href="admin_rating_from_receiver.php">Receiver Rating</a></li>
            <!--<li><a href="messages.php">Inbox</a></li>-->
						<li><a href="logout.php">Logout</a></li>
					</ul>
			</nav>
		</div>
	</header>
<h1 align="center">Add Hospital</h1>
<div id="container">
    <form method="post">
     <input type="text" placeholder="Hospital Name" id="hospital_name" onkeyup="check_user()" 
            name="hospital_name" class="input" required /> <br><br>
            <div id="checking"></div> 

     
     <input type="submit" id ="Add" name="Add" value="Add" />
    </form>
</div>
<script src="js/jquery-3.1.1.min.js"></script>
<script>
    document.getElementById("Add").disabled=true;
  function check_user(){
    var hospital_name=document.getElementById("hospital_name").value;
    //Here we will send the data to user_check.php file
    $.post("js/hospital_check.php",
    {
      hospital: hospital_name
    },

    //in return we will receive data in this fucntion
    function(data,status){
      if(data=='<p style="color:red">Hospital Already Added</p>'){
        document.getElementById("Add").disabled=true;
      }else{
        document.getElementById("Add").disabled=false;
      }
      document.getElementById("checking").innerHTML =data;
      //alert(data);

    }


    );

  }
</script>
<?php if(isset($_POST['Add'])){
  $hospital_name=$_POST['hospital_name'];
  //$user_name=mysqli_real_escape_string($conn, $_POST['user_name']);
  $SELECT= "SELECT hospital_name From hospital_list Where hospital_name = ? Limit 1";
  $INSERT= "INSERT Into hospital_list (hospital_name) values(?)";
  $stmt = $conn->prepare($SELECT);
  $stmt->bind_param("s",$hospital_name);
    $stmt->execute();
    $stmt->bind_result($hospital_name);
    $stmt->store_result();
    $rnum= $stmt->num_rows;

    if($rnum==0){
      $stmt->close();

      $stmt=$conn->prepare($INSERT);
      $stmt->bind_param("s", $hospital_name);
      $stmt->execute();
      echo '<p style="color:green">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Succesful</p>';
  	}
  	else{
      	echo "Someone already registered using this mail";
    }
    $stmt->close();
    $conn->close();

  }
  else{
  //echo "All field are required";
  die();
}
  
?>
	
	</body>
</html>