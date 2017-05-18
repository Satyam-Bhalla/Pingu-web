<?php
  include('../imports/db_connect.php');
  include('../imports/util.php');
  include('../views/utilities.php');
  //We check if the form has been sent
  $id = 0;
  $username = '';
  $email = '';

  if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {

    // We remove slashes depending on the configuration
    echo "1st check";

    if (get_magic_quotes_gpc()) {
      echo "2nd check";
      $_POST['username'] = stripslashes($_POST['username']);
      $_POST['email'] = stripslashes($_POST['email']);
      $_POST['password'] = stripslashes($_POST['password']);
    }

    if (preg_match($REGEX_MAIL, $_POST['email'])) {
      echo "3rd check";
      // We protect the variables

      $username = mysqli_real_escape_string($con, $_POST['username']);
      $password = sha1(md5(mysqli_real_escape_string($con, $_POST['password'])));
      $email = mysqli_real_escape_string($con, $_POST['email']);

      // We check if there is no other user using the same username

      $dn = mysqli_num_rows(mysqli_query($con, 'select id from users where username="' . $username . '"'));
      $email_check =  mysqli_num_rows(mysqli_query($con, 'select id from users where email="' . $email . '"'));
      if ($dn == 0 && $email_check == 0) {
        echo "4th check";
        // We count the number of users to give an ID to this one

      $dn2 = mysqli_num_rows(mysqli_query($con, 'select id from users'));
      $id = $dn2 + 1;

      // We save the informations to the databse

      if (mysqli_query($con, 'insert into users(id, username,email,password, user_login_date) values (' . $id . ', "' . $username . '", "' . $email . '", "' . $password . '", "' . date('y-m-d') . '")')) {
      echo "5th check";
      // We dont display the form

      $form = false;
      header("Location: ../index.php");
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
  echo $message;
  }
  else {
    $form = true;
    echo "Post is not working";
  }
  // if ($form) {
  //
  //   // We display a message if necessary
  //   if (isset($message)) {
  //     // $jsonmessage = json_encode($arr_m);
  //     echo $message;
  //   }
  // }
  // else {
  //   $message = "Account created successfully";
  //   echo $message;
  // }
?>
