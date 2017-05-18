<?php
  include('db_connect.php');
  session_start();
   if(isset($_SESSION['username'])) {
       header("Location: http://localhost/Offline-chat-app/");
       exit;
    }
  include('util.php');
  include('utilities.php');
  //We check if the form has been sent
  $id = 0;
  $username = '';
  $email = '';
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
            header("Location: http://localhost/Offline-chat-app/login.php");
          }
          else {

            // Otherwise, we say that an error occured
            $form = true;
            $message = 'An error occurred while signing up.';
            $jsonMessage = json_encode($message);
            echo "<script>Materialize.toast(".$jsonMessage.",2000)</script>";
          }
        }
        else {

          // Otherwise, we say the username is not available
          if($email_check != 0){
            $form = true;
            $message = 'This Email '.$_POST['email'].' is not available!';
            $jsonMessage = json_encode($message);
            echo "<script>Materialize.toast(".$jsonMessage.",2000)</script>";
          }
          else if($dn != 0){
            $form = true;
            $message = 'The username '.$_POST['username'].' is already in use!';
            $jsonMessage = json_encode($message);
            echo "<script>Materialize.toast(".$jsonMessage.",2000)</script>";
          }

        }
      }else {

        // Otherwise, we say the email is not valid

        $form = true;
          $message = 'The email you entered is not valid!';
          $jsonMessage = json_encode($message);
          echo "<script>Materialize.toast(".$jsonMessage.",2000)</script>";
      }
    }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pingu-Login</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <br><br><br>
        <div class="col s12"></div>
        <div class="col s12 m12 l3"></div>
        <div class="col s12 m12 l6">
          <div class="row card trans">
            <div class="card-tabs card-content">
              <ul class="tabs  tabs-fixed-width">
                <li class="tab col s3" onclick="login()"><a  href="login.php">Log In</a></li>
                <li class="tab col s3"><a class="active" href="signup.php">Sign Up</a></li>
              </ul>
            </div>
            <div id="signup" >
              <form class="col s12" action="signup.php" method="post">
                <div class="row">
                  <div class="input-field col s12">
                    <input id="username" name="username" type="text"  class="validate" autofocus="on" autocomplete="off" required>
                     <label for="username">User Name</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="email" type="email" class="validate" name="email" required>
                    <label for="email">Email</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="password" type="password" class="validate" name="password" required>
                    <label for="password">Password</label>
                  </div>
                </div>
                <a class="pointit" href="login.php">Already have an Account?</a><br><br>
                <div class="row center">
                  <input type="submit" name="submit" value="Signup" class="btn-large waves-effect waves-light cyan accent-4" id="signup">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
       function login(){
         location.href = 'http://localhost/Offline-chat-app/login.php';
       }
    </script>
    </body>
</html>
