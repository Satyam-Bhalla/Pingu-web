<?php
	include ('../api/imports/db_connect.php');
	include('users.php');
	$req = mysqli_query($con,'select  * from users');
?>


	<div class="side_list">
		<div class="user_search  card input-field col m6">
          <i class="material-icons prefix cyan-text accent-4">search</i>
          <input type="text" placeholder="Search" ng-model="search">
        </div>

		 <ul class="collection" >
			 <?php
			 $query = mysqli_query($con,'select id, username, email from users');
			  while($search = (mysqli_fetch_array($query)))
			  {
			?>

			 <li class="collection-item avatar pointit" >
		      <img class="circle set_line_height" src="https://dummyimage.com/300/09f/fff.png" alt="">

					<!-- <a href="users.php"> -->
					<p class="user_name_list" >
						{{"
						 <?php echo htmlentities($search['username'], ENT_QUOTES, 'UTF-8'); ?>
					  "| uppercase}}
					</p>

		      <p class="list_time">12/12/12</p><br>
		      <p class="message_sample">Hi there</p>
					<!-- </a> -->
					<?php
				 	}
					?>
		    </li>
		    <li class="pointit row" style="margin-bottom: auto;">
		    	<h6 class="col m10 cyan-text">Direct Message</h6>
		    	<i class="col-m2 push material-icons prefix  cyan-text pointit">people</i>
		    </li>
		</ul>
	</div>
<div class="chat_arena">
	<form method="post" action="#!/chat/">
	<div class="message-area">
	 	<textarea class="text-box" placeholder="Type a message" id="message" name="message"></textarea>
	 	<i class="material-icons prefix  cyan-text pointit">face</i>
		<!-- <i class="material-icons prefix  cyan-text pointit emoji">send</i> -->
		<input type="submit" name="submit" value="Send">
	 </div>
 </form>
</div>
<!-- <?php
// if(isset($_SESSION['username']))
// {
// $form = true;
// $orecip = '';
// $omessage = '';
// //We check if the form has been sent
// if(isset($_POST['recip'], $_POST['message']))
// {
// 	$orecip = $_POST['recip'];
// 	$omessage = $_POST['message'];
// 	//We remove slashes depending on the configuration
// 	if(get_magic_quotes_gpc())
// 	{
// 		$orecip = stripslashes($orecip);
// 		$omessage = stripslashes($omessage);
// 	}
// 	//We check if all the fields are filled
// 	if($_POST['recip']!='' and $_POST['message']!='')
// 	{
// 		//We protect the variables
// 		$recip = mysqli_real_escape_string($con,$orecip);
// 		$message = mysqli_real_escape_string($con,nl2br(htmlentities($omessage, ENT_QUOTES, 'UTF-8')));
// 		//We check if the recipient exists
// 		$dn1 = mysqli_fetch_array(mysqli_query($con,'select count(id) as recip, id as recipid, (select count(*) from pm) as npm from users where username="'.$recip.'"'));
// 		if($dn1['recip']==1)
// 		{
// 			//We check if the recipient is not the actual user
// 			if($dn1['recipid']!=$_SESSION['userid'])
// 			{
// 				$id = $dn1['npm']+1;
// 				//We send the message
// 				if(mysqli_query($con,'insert into pm (id, id2, user1, user2, message, timestamp, user1read, user2read)values("'.$id.'", "1", "'.$_SESSION['userid'].'", "'.$dn1['recipid'].'", "'.$message.'", "'.time().'", "yes", "no")'))
// 				{
// 					$form = false;
// 				}
// 				else
// 				{
// 					//Otherwise, we say that an error occured
// 					$error = 'An error occurred while sending the message';
// 				}
// 			}
// 			else
// 			{
// 				//Otherwise, we say the user cannot send a message to himself
// 				$error = 'You cannot send a message to yourself.';
// 			}
// 		}
// 		else
// 		{
// 			//Otherwise, we say the recipient does not exists
// 			$error = 'The recipient does not exists.';
// 		}
// 	}
// 	else
// 	{
// 		//Otherwise, we say a field is empty
// 		$error = 'A field is empty. Please fill of the fields.';
// 	}
// }
// elseif(isset($_GET['recip']))
// {
// 	//We get the username for the recipient if available
// 	$orecip = $_GET['recip'];
// }
// if($form)
// {
// //We display a message if necessary
// if(isset($error))
// {
// 	echo '<div class="message">'.$error.'</div>';
// }
// }
// }
// else
// {
// 	echo '<div class="message">You must be logged to access this page.</div>';
// }
?> -->
