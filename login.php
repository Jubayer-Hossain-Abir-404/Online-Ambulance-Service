<!--<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
  
   body {

   background-image: url("rrr.jpg");

   background-repeat: no-repeat;

   background-size: cover;

 }

 
</style>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 10%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<h1 class="button" align="center" style="color: #808000"> Login Form </h1>

<form action="login_connection.php" method="post">
  <div class="imgcontainer">
    <img src="./image/login.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="email" style="color:#7B3F00"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw" style="color:#7B3F00"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
       
       <button type="submit" class="btn btn-primary" id="Login" name= "Login" value= "Login">Login</button>--> 
        <!--<input type="submit" id ="Register" name="Register" value="Register" />-->
    
    <!--<label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>
<br/><br/>Not a user <a href="service_recipient.php">Register Here as a Service Recipient</a>

<br/><br/>Not a user <a href="service_provider.html">Register Here as a Service Provider</a>
</body>
</html>-->
<?php 
session_start();
require_once("connection.php"); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <style type="text/css">
  
   body {

   background-image: url("rrr.jpg");

   background-repeat: no-repeat;

   background-size: cover;

 }

 
</style>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 10%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
  
    <h1 class="button" align="center" style="color: #808000"> Login Form </h1>
    <div class="imgcontainer">
      <img src="./image/login.png" alt="Avatar" class="avatar">
    </div>
    <div id="container">
      <form method="post">
        <label for="user_name" style="color:#7B3F00"><b>User Name</b></label>
        <input type="text" class="input" placeholder="Enter User Name" name="user_name" required>
        <label for="password" style="color:#7B3F00"><b>Password</b></label>
        <input type="password" class="input" placeholder="Enter Password" name="password" required>
        <input type="submit" value="Login" name="Login" />
        <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
      </form>
    </div>

   <div class="container" style="background-color:#f1f1f1">
      <button type="button" class="cancelbtn">Cancel</button>
      <span class="password">Forgot <a href="#">password?</a></span>
    </div>
      
    <br/><br/>Not a user <a href="service_recipient.php">Register Here as a Service Recipient</a>

    <br/><br/>Not a user <a href="service_provider.html">Register Here as a Service Provider</a>

    <?php
      if(isset($_POST['Login'])){
        $user_name = $_POST['user_name'];
        $password=$_POST['password'];
        $user_name=mysqli_real_escape_string($conn, $_POST['user_name']);
        $password=mysqli_real_escape_string($conn,$_POST['password']);
        $password=md5($password);
        //$q='SELECT * FROM `service_recipient` WHERE `user_name`="'.$user_name.'" AND `password`="'.$password.'"';
        $q= "SELECT * FROM service_recipient WHERE user_name='$user_name' AND '$password'";
        $r=mysqli_query($conn,$q);
        $result=mysqli_num_rows($r);
        echo $result;
        if($r){
          if($result>0){
            //
            $_SESSION['user_name']=$user_name;
            //header('Location: admin.php');
            echo "Log in";
          }
        }
        else{
          //
        } 
      }
    ?>

</body>

</html>