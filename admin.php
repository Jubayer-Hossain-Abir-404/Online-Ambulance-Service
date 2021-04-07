

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content= "width=device-width">
	<title>Online Ambulane Service | Welcome</title>
	<link rel="stylesheet" href="./CSS/style.css">
	<!--<script type="text/javascript" src="js/googlemap.js"></script>-->
	<!--<style type="text/css">
		.container {
			height: 450px;
		}
		#map {
			width: 100%;
			height: 100%;
			border: 1px solid blue;
		}
	</style>-->
</head>
<body>
	
	<header>
		<div class="container">
			<div id="branding">
				<h1><span class="highlight">Online Ambulance Service</span></h1>
			</div>
			<nav>
					<ul>
						<li><a href="home.php">Home</a></li>
						<li class="current"><a href="admin.php">Admin</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
			</nav>
		</div>
	</header>
	<!--<script src="js/jquery-3.1.1.min.js"></script>
	<script>
    //document.getElementById("Register").disabled=true;
  	function check(){
    var user_name=document.getElementById("user_name").value;
    //Here we will send the data to user_check.php file
    $.post("messages.php",
    {
      gmail: email
    },

    //in return we will receive data in this fucntion
    function(data,status){
      //if(data=='<p style="color:red">User already registered</p>'){
        //document.getElementById("Register").disabled=true;
      //}else{
        //document.getElementById("Register").disabled=false;
      //}
      document.getElementById("checking").innerHTML =data;
      //alert(data);

    }


    );

  }
</script>-->

	<section>
		<div>
			<ul>
				<li class="current"><a href="messages.php">Inbox</a></li>
			</ul>	
		</div>
	</section>

</body>
</html>