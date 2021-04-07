
<div id="right-col-container">
	<div id="messages-container">
		<?php
			//require_once("connection.php");
			$no_message = false;
			if(isset($_GET['user'])){
				$_GET['user'] =$_GET['user'];
			}else{
				//user variable is not in the url bar
				//so select the last user you have sent message
				$q='SELECT `sender_name`, `receiver_name` FROM `messages` WHERE `sender_name` = "'.$_SESSION['user_name'].'"
				or `receiver_name` = "'.$_SESSION['user_name'].'" ORDER BY `date_time` DESC LIMIT 1 ';
				$r=mysqli_query($conn,$q);
				if($r){
					if(mysqli_num_rows($r)>0){
						while($row=mysqli_fetch_assoc($r)){
								$sender_name=$row['sender_name'];
								$receiver_name=$row['receiver_name'];
								if($_SESSION['user_name']==$sender_name){
									$_GET['user']=$receiver_name;
								}else{
									$_GET['user']=$sender_name;
								}
						}
					}else{
						//This user haven't sent any messages
						echo 'no messages from you';
						$no_message=true;
					}
				}else{
					//query problem
					echo $q;
				}
			}
			if($no_message==false){


			$q='SELECT * FROM `messages` WHERE `sender_name`="'.$_SESSION['user_name'].'" AND `receiver_name` ="'.$_GET['user'].'" 
				OR 
				 `sender_name`="'.$_GET['user'].'" AND `receiver_name`="'.$_SESSION['user_name'].'" '; 
				 $r=mysqli_query($conn,$q);
				 if($r){
				 	//query successfull
				 	while($row=mysqli_fetch_assoc($r)){
				 		$sender_name=$row['sender_name'];
				 		$receiver_name=$row['receiver_name'];
				 		$message=$row['message_text'];
				 		//check who is the sender of the message
				 		if($sender_name==$_SESSION['user_name']){
				 			//show the message with grey back
				 			?>
				 				<div class="grey-message">
									<a href="#">Me</a>
									<p><?php echo $message; ?> </p>
								</div>

				 			<?php
				 		}else{
				 			//show the message with white back
				 			?>
				 				<div class="white-message">
									<a href="#"><?php echo $sender_name; ?> </a>
									<P> <?php echo $message; ?> </P>
								</div>
				 			<?php
				 		}
				 	}
				 }else{
				 	//query problem
				 	echo $q;
				 }
				 //end of new_message
				}
		?>
		
		<!--end of messages container-->
	</div>
	<form method="post" id="message-form">
		<textarea class="textarea" id="message_text" placeholder="Write your message"></textarea>
	</form>
	<!--end of right-col-conatiner-->
	</div>

	<script src="js/jquery-3.1.1.min.js"></script>

	<script>
		$("document").ready(function(event){

			//now if the form is submitted

			$("#right-col-container").on('submit','#message-form', function(){
					//take the data from textarea
					var message_text=$("#message_text").val();
					//send the data to sending_process.php file
					$.post("js/sending_process.php?user=<?php echo $_GET['user'];?>",
					{
						text :message_text;
					},
					//in return we'll get
					function(data,status){
						//alert(data);
						//firts remove the text from
						//message_text so
						$("#message_text").val("");
						//now add the data inside
						//the message container
						document.getElementById("messages-container").innerHTML += data;
					}

					);
			});

			//if any button is click inside
			//right-col-container
			$("#right-col-container").keypress(function(e){
				//as we will submit the form with enter button so
				if(e.KeyCode==13 && !e.shiftkey){
					//it means enter is clicked without shift key
					//so submit the form
					$("#message-form").submit();
				}
			});
		});
	</script>
