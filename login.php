<?php
include('./api/imports/db_connect.php');
//If the user is logged, we log him out
// if(isset($_SESSION['username']))
// {
// 	//We log him out by deleting the username and userid sessions
// 	unset($_SESSION['username'], $_SESSION['userid']);
//  $logout_message = "You have successfully been logged out.";
//  $json_logout_message = json_encode($logout_message);
//  echo $json_logout_message;
// }
// else
// {
// 	$ousername = '';
// 	//We check if the form has been sent
	 if(isset($_POST['username'], $_POST['password']))
	  {
		    //We remove slashes depending on the configuration
		    if(get_magic_quotes_gpc())
		      {
			         $ousername = stripslashes($_POST['username']);
			         $username = mysql_real_escape_string(stripslashes($_POST['username']));
			         $password = stripslashes($_POST['password']);
		      }
		      else
		       {
		        $username = mysqli_real_escape_string($con,$_POST['username']);
	          $password =   $_POST['password'];
            $encrypted_password = sha1(md5($password));
            }
              //We get the password of the user
		    $req = mysqli_query($con,'select password,id from users where username="'.$username.'"');
		    $dn = mysqli_fetch_array($req,MYSQLI_BOTH);
		    //We compare the submited password and the real one, and we check if the user exists
		    if($dn['password']==$encrypted_password and mysqli_num_rows($req)>0)
		      {
			   //If the password is good, we dont show the form
			    $form = false;
			    //We save the user name in the session username and the user Id in the session userid
			    $_SESSION['username'] = $_POST['username'];
			    $_SESSION['userid'] = $dn['id'];
          $login_message = "You have successfuly been logged. You can access to your member area.";
          $json_login_message = json_encode($login_message);
          echo $json_login_message;
          echo '<button><a href="logout.php">Logout</a></button>';
        }
        else
		     {
			     //Otherwise, we say the password is incorrect.
			      $form = true;
			      $message = 'The username or password is incorrect.';
		      }
	  }
	else
	{
		$form = true;
	}
	if($form)
	{
		//We display a message if necessary
	   if(isset($message))
	    {
		      echo json_encode($message);
	     }
   }
//}
 ?>
