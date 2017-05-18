<?php
  include_once('../views/utilities.php');


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
              <form class="col s12" action="check_signup.php" method="post">
                <div class="row">
                  <div class="input-field col s12">
                    <input id="username" type="text"  class="validate" autofocus="on" autocomplete="off" required>
                    <label for="username">User Name</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="email" type="email" class="validate" required>
                    <label for="email">Email</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="password" type="password" class="validate" required>
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
         location.href = 'http://localhost/Offline-chat-app/Login-Signup/login.php';
       }
    </script>
    </body>
</html>
