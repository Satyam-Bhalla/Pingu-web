<?php
  include_once('../views/utilities.php');
 include ('../imports/db_connect.php');
 if ($_POST = json_decode(file_get_contents('php://input'),true)) {

 if (isset($_POST['username'], $_POST['password'])) {
   // We remove slashes depending on the configuration

   if (get_magic_quotes_gpc()) {
     $ousername = stripslashes($_POST['username']);
     $username = mysql_real_escape_string(stripslashes($_POST['username']));
     $password = stripslashes($_POST['password']);
   }
   else {
     $username = mysqli_real_escape_string($con, $_POST['username']);
     $password = $_POST['password'];
     $encrypted_password = sha1(md5($password));
   }

   // We get the password of the user

   $req = mysqli_query($con, 'select * from users where username="' . $username . '"');
   $dn = mysqli_fetch_array($req, MYSQLI_BOTH);

   // We compare the submited password and the real one, and we check if the user exists

   if ($dn['password'] == $encrypted_password and mysqli_num_rows($req) > 0) {

     // If the password is good, we dont show the form

     $form = false;

     // We save the user name in the session username and the user Id in the session userid

     $uid = $dn['id'];
     $login_message = "You have successfuly been logged in";
     $arr_m = array("response"=>$login_message,
             "status"=>True,
             "id"=>$uid,
             "name"=>$dn['username'],
             "email"=>$dn["email"]);

     $json_login_message = json_encode($arr_m);
     echo $json_login_message;
   }
   else {

     // Otherwise, we say the password is incorrect.

     $form = true;
     $message = 'The username or password is incorrect.';
   }
 }
 }
 else {
   $form = true;
 }


 if ($form) {

   // We display a message if necessary
   if (isset($message)) {
     $arr_m = array("response"=>$message, "status"=>False);
      echo json_encode($arr_m["response"]);

   }

   else {
     $message = "Bad Request";
     $arr_m = array("response"=>$message, "status"=>False);
     $jsonMessage = json_encode($arr_m["response"]);
      //echo "<script>function loginToast(){Materialize.toast(".$message.",2000)}</script>";
   }
 }

?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="icon" href="../views/favicon.ico" type="image/x-icon">
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
                <li class="tab col s3" ><a class="active" href="login.php">Log In</a></li>
                <li class="tab col s3" onclick="signup()" id="sign"><a href="signup.php">Sign Up</a></li>
              </ul>
            </div>
            <div id="login">
              <form class="col s12" method="post"  action="login.php" >
                <div class="row">
                  <div class="input-field col s12">
                    <input id="username"  type="text" class="validate" autofocus="on" autocomplete="off" required >
                    <label for="username">User Name</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="password" type="password" class="validate" required>
                    <label for="password">Password</label>
                  </div>
                </div>
                <p>or
                <a class="pointit" href="signup.php">Sign Up</a><br><br></p>
                <div class="row center">
                  <input type="submit" name="submit" value="Login" class="btn-large waves-effect waves-light cyan accent-4" id="login" onclick="loginToast()">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      function signup(){
        location.href = 'http://localhost/Offline-chat-app/Login-Signup/signup.php';
      }
      function loginToast(){
        Materialize.toast("wait",2000)
      }
    </script>
    </body>
</html>
