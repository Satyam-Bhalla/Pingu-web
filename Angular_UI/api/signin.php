<?php

// api for user info

include ('imports/db_connect.php');
include ('imports/util.php');

$id = 0;
$username;
$email;

if ($_POST = json_decode(file_get_contents('php://input'),true)) {

if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {

  // We remove slashes depending on the configuration

  if (get_magic_quotes_gpc()) {
    $_POST['username'] = stripslashes($_POST['username']);
    $_POST['email'] = stripslashes($_POST['email']);
    $_POST['password'] = stripslashes($_POST['password']);
  }

  if (preg_match($REGEX_MAIL, $_POST['email'])) {

    // We protect the variables

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = sha1(md5(mysqli_real_escape_string($con, $_POST['password'])));
    $email = mysqli_real_escape_string($con, $_POST['email']);

    // We check if there is no other user using the same username

    $dn = mysqli_num_rows(mysqli_query($con, 'select id from users where username="' . $username . '"'));
    $email_check =  mysqli_num_rows(mysqli_query($con, 'select id from users where email="' . $email . '"'));
    if ($dn == 0 && $email_check == 0) {

      // We count the number of users to give an ID to this one

      $dn2 = mysqli_num_rows(mysqli_query($con, 'select id from users'));
      $id = $dn2 + 1;

      // We save the informations to the databse

      if (mysqli_query($con, 'insert into users(id, username,email,password, user_login_date) values (' . $id . ', "' . $username . '", "' . $email . '", "' . $password . '", "' . date('y-m-d') . '")')) {

        // We dont display the form

        $form = false;
      }
      else {

        // Otherwise, we say that an error occured

        $form = true;
        $message = 'An error occurred while signing up.';
      }
    }
    else if($email_check) {

      // Otherwise, we say the username is not available

      $form = true;
      $message = 'This Email "'.$_POST['email'].'" is not available!';
    }

    else {

      // Otherwise, we say the username is not available

      $form = true;
      $message = 'The username "'.$_POST['username'].'" is already in use!';
    }
  }
  else {

    // Otherwise, we say the email is not valid

    $form = true;
    $message = 'The email you entered is not valid!';
  }
}
else {
  $form = true;
}
}
if ($form) {

  // We display a message if necessary
  $arr_m = array("response" => $message,"status"=>False);

  if (isset($message)) {
    $jsonmessage = json_encode($arr_m);
    echo $jsonmessage;
  }
}
else {
  $message = "Account created successfully";
  $arr_m = array("response"=>$message, 
            "status"=>True, 
            "id"=>$id, 
            "name"=>$username, 
            "email"=>$email);

  $jsonmessage = json_encode($arr_m);
  echo $jsonmessage;
}

?>
