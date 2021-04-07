<!--<?php
 /*$error = NULL;

 if(isset($_POST['submit'])){
  //Get form data
  $first_name=$_POST['first_name'];
  $last_name=$_POST['last_name'];
  $email=$_POST['email'];
  $phone_number=$_POST['phone_number'];
  $password=$_POST['password'];
  $repeat_password=$_POST['repeat_password'];
  if($repeat_password!=$password){
    $error= "Your passwords do not match";
  }
  else{
    //Form is valid

    //Connect to the database
    $mysqli= NEW MySQLi ('localhost', 'root', '', 'ambulance_service');

    //Sanitize form data
    $first_name = $mysqli->real_escape_string($first_name);
    $last_name = $mysqli->real_escape_string($last_name);
    $email = $mysqli->real_escape_string($email);
    $phone_number = $mysqli->real_escape_string($phone_number);
    $password = $mysqli->real_escape_string($password);
    $repeat_password = $mysqli->real_escape_string($repeat_password);

    //Generate Verification Key

    $verification_key=md5(time().$last_name);

    //echo $verification_key; 

    //Insert account into the database
    $password = md5($password);
    $insert = $mysqli->query("INSERT INTO service_recipient(first_name,last_name,email,phone_number,password) VALUES(?,?,?,?,?)");
    if($insert){
      echo "Success";
    }
    else{
      echo $mysqli->error;
    }
  }
 }*/
?>-->
<!--<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content= "width=device-width">
  <title> Registration Form </title>
 </head> 
<body> 
<form action="service_recipient_reg.php" method="post">
    <form method="post" action="" > 
<div class="container">
  <br>

    <div class="row">
        <div class="col-sm-6">
      <h1 class="button" align="center" style="color: #808000"> Registrar Here </h1>
      <p align="center" style="color: purple"> Service recipients are cordially requested to fill up the form with correct information. </p>

      <hr class="mb-3">


  <div class="form-group">
      <label for="first_name" style="color:#7B3F00" >First Name:</label>
      <input type="text" placeholder="Enter your first name" class="form-control" id="first_name" name="first_name" required>
    </div>

    <div class="form-group">
    <label for="last_name" style="color:#7B3F00">Last Name:</label>
    <input type="text" placeholder="Enter your last name" class="form-control" id="last_name" name="last_name" required>
    </div>

    <div class="form-group">
    <label for="email" style="color:#7B3F00">Email Address:</label>
    <input type="email" placeholder="Enter your email address" class="form-control" id="email" name="email" required>
    </div>

    <div class="form-group">
    <label for="phone" style="color:#7B3F00">Phone Number:</label>
    <input type="text" placeholder="Enter your phone number" class="form-control" id="phone_number" name="phone_number" required>
    </div>

<div class="form-group">
    <label for="pass" style="color:#7B3F00">Password:</label>
    <input type="password" placeholder="Enter your password" class="form-control" id="password" name="password" required >
  </div>

  
  
  


 <button type="submit" class="btn btn-primary">Submit</button>

 
  
</div>
</div>
</div>

<br>



</form>

  <?php
  //echo $error;
?>

</body>
</html>-->


<?php require_once("connection.php");?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content= "width=device-width">
  <title> Registration Form </title>
 </head> 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
<style>
    *{margin:0px; padding:0px; }
    #container{width:300px; margin:0px auto;}
    .input{width:92%;padding:2%;}
</style>
</head>
<body>
<h1 align="center">Registration Form</h1>
<div id="container">
    <form method="post">
     <input type="text" placeholder="User Name" id="user_name" onkeyup="check_user()" 
            name="user_name" class="input" required /> <br><br>
            <div id="checking"></div> 

     <input type="email" placeholder="Email" name="email" class="input" required /><br><br>
     <input type="text" placeholder="Phone Number"  name="phone_number" class="input" required> <br><br>
     <input type="password" placeholder="Password" name="password" class="input" required /><br><br>
     <input type="submit" id ="Register" name="Register" value="Register" />
    </form>
</div>
<script src="js/jquery-3.1.1.min.js"></script>
<script>
    document.getElementById("Register").disabled=true;
  function check_user(){
    var user_name=document.getElementById("user_name").value;
    //Here we will send the data to user_check.php file
    $.post("js/user_check.php",
    {
      user: user_name
    },

    //in return we will receive data in this fucntion
    function(data,status){
      if(data=='<p style="color:red">User already registered</p>'){
        document.getElementById("Register").disabled=true;
      }else{
        document.getElementById("Register").disabled=false;
      }
      document.getElementById("checking").innerHTML =data;
      //alert(data);

    }


    );

  }
</script>
<?php if(isset($_POST['Register'])){
  $user_name=$_POST['user_name'];
  $email=$_POST['email'];
  $phone_number=$_POST['phone_number'];
  $password=$_POST['password'];
  //$query="INSERT INTO 'service_recipient' ('user_name','email','phone_number',password') VALUES('".$user_name."', '".$email."','".$phone_number.".'".$password."')";
  //$r=mysqli_query($conn,$query);
    $verification_key=md5(time().$user_name);
    //echo $verification_key;
    $password= mysqli_real_escape_string($conn, $_POST["password"]);
    $password = md5($password);
    $SELECT= "SELECT email From service_recipient Where email = ? Limit 1";
    $INSERT= "INSERT Into service_recipient (user_name, email, phone_number, password,verification_key) values(?, ?, ?, ?, ?)";

    //prepare statement
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum= $stmt->num_rows;

    if($rnum==0){
      $stmt->close();

      $stmt=$conn->prepare($INSERT);
      $stmt->bind_param("sssss", $user_name, $email, $phone_number, $password, $verification_key);
      $stmt->execute();
      //echo "New record inserted sucessfully";
      //Send Mail
      $to= $email;
      $subject= "Email Verification";
      $message="<a href=http://localhost:8010/CSE_411_Project/verify.php?verification_key=$verification_key>Register Account</a>";
      $headers="From: abirjubayer487625@gmail.com";
      //$headers= "MIME-Version: 1.0" . "\r\n";
      //$headers .="Content-type:text/html;charset=UTF-8" ."\r\n"; 
      //mail($to,$subject,$message,$headers);
      //mail($to,$subject,$message,$headers);
      mail($to,$subject,$message,$headers);


      header('location:thankyou.php');
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