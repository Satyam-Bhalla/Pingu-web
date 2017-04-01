<?php
 include_once('../api/imports/db_connect.php');
  $query = mysqli_query($con,'select id, username, email from users');

  while($search = (mysqli_fetch_array($query)))
  {
    $status  = false;
    $arr = array(
					  "id"=>$search['id'],
						"name"=>$search['username'],
						"email"=>$search["email"]);
    $json_all_users = json_encode($arr);

  }
?>
