<?php require_once("connection.php");?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content= "width=device-width">
    <title>Online Ambulane Service | Welcome</title>
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
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
                        <!--<li><a href="admin.php">Admin</a></li>-->
                        <li><a href="request_service.php">Reservation</a></li>
                        <li class="current"><a href="add_rate.php">System Rating</a></li>
                        <!--<li><a href="messages.php">Inbox</a></li>-->
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
            </nav>
        </div>
    </header>
<div class="container">
    <div class="row">
 
<form action="add_rate.php" method="post">
 
    <div>
        <h3>Rate the system</h3>
    </div>
 
    <div>
         <label>Enter your User Name</label>
        <input type="text" name="user_name" required>
    </div>
 
         <div class="rateyo" id= "rating"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
         </div>
 
    <span class='result'>0</span>
    <input type="hidden" name="rating">
 
    </div>
 
    <div><input type="submit" name="add"> </div>
 
</form>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
 
<script>
 
 
    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });
 
</script>
</body>
 
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $user_name = $_POST["user_name"];
    $rating = $_POST["rating"];
 
    $sql = "INSERT INTO rate_system (user_name,rate) VALUES ('$user_name','$rating')";
    if (mysqli_query($conn, $sql))
    {
        echo "New Rate addedddd successfully";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>