<?php
include('db_connect.php');
include_once('index.php');
// $_SESSION['recieverid'] = $_GET['id'];
include_once('read_message.php');
// $_SESSION['recieverid'] = $_GET['id'];
// include('utilities.php');
//We check if the user is logged
if(isset($_SESSION['username']))
{
$form = true;
$orecip = '';
$omessage = '';
//We check if the form has been sent
if(isset($_POST['recip'], $_POST['message']))
{
	$orecip = $_POST['recip'];
	$omessage = $_POST['message'];
	//We remove slashes depending on the configuration
	if(get_magic_quotes_gpc())
	{
		$orecip = stripslashes($orecip);
		$omessage = stripslashes($omessage);
	}
	//We check if all the fields are filled
	if($_POST['recip']!='' and $_POST['message']!='')
	{
		//We protect the variables
		$recip = mysqli_real_escape_string($con,$orecip);
		$message = mysqli_real_escape_string($con,nl2br(htmlentities($omessage, ENT_QUOTES, 'UTF-8')));
		//We check if the recipient exists
		$dn1 = mysqli_fetch_array(mysqli_query($con,'select count(id) as recip, id as recipid, (select count(*) from pm) as npm from users where username="'.$recip.'"'));
		if($dn1['recip']==1)
		{
			//We check if the recipient is not the actual user
			if($dn1['recipid'] !=$_SESSION['id'])
			{
				$id = $dn1['npm']+1;
				//We send the message
				if(mysqli_query($con,'insert into pm (id, id2, user1, user2, message, user1read, user2read)values("'.$_SESSION['id'].'", "1", "'.$_SESSION['id'].'", "'.$_SESSION['recieverid'].'", "'.$message.'", "yes", "no")'))
				{
					$form = false;
          $toast = "sent";
          echo "<script>Materialize.toast(".$toast.",2000)</script>";
          echo $toast;
				}
				else
				{
					//Otherwise, we say that an error occured
					$error = 'An error occurred while sending the message';
				}
			}
			else
			{
				//Otherwise, we say the user cannot send a message to himself
				$error = 'You cannot send a message to yourself.';
			}
		}
		else
		{
			//Otherwise, we say the recipient does not exists
			$error = 'The recipient does not exists.';
		}
	}
	else
	{
		//Otherwise, we say a field is empty
		$error = 'A field is empty. Please fill of the fields.';
	}
}
elseif(isset($_GET['recip']))
{
	//We get the username for the recipient if available
	$orecip = $_GET['recip'];
}
if($form)
{
//We display a message if necessary
if(isset($error))
{
	echo "<script>Materialize.toast(".$error.",2000)</script>";
  echo $error;
}
}
}
else
{
  $toast  = 'You must be logged in to access this page';
	echo "<script>Materialize.toast(".$toast.",2000)</script>";
  echo $toast;
}
?>
<form method="post" action="newmessage.php?id=<?php echo $_SESSION['recieverid']; ?>">
    <div class="message-area">
      <!-- <textarea class="text-box" placeholder="Type a message" id="message" name="message"></textarea>
         <i class="material-icons prefix  cyan-text pointit">face</i>
         <a href="newmessage.php?id=<?//php echo $_SESSION['recieverid']; ?>"><i class="material-icons prefix  cyan-text pointit emoji">send</i></a> -->
				 <input type="text" class="text-box" placeholder="Type a message" name="message">
				 <button type="submit" name="button" id="sendButton"><i class="material-icons   cyan-text pointit emoji">send</i></button>
    </div>
</form>
