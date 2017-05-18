<?php
  include('db_connect.php');
  session_start();
	if (!isset($_SESSION['username'])) {
		header("Location: login.php");
		exit;
 }
?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
     <link rel="icon" href="views/favicon.ico" type="image/x-icon">
     <link rel="stylesheet" type="text/css" href="Static/Css/materialize.min.css">
     <link rel="stylesheet" type="text/css" href="./Static/Css/main.css">
     <link href="Static/Css/font-icons.css" rel="stylesheet">
     <script src="Static/Js/jquery-3.1.1.min.js" type="text/javascript"></script>
     <script src="Static/Js/materialize.min.js" type="text/javascript"></script>
     <script src="Static/Js/main.js" type="text/javascript"></script>
   </head>
   <body onload="toast()">
     <?php include('sidelist.php');?>


      <?php if(isset($_GET['id'])){include('chatarea.php');}?>
     <script type="text/javascript">
     function toast(){
       Materialize.toast("Loading",1000)
     }
     </script>
   </body>
 </html>
