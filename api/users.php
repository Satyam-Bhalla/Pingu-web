<?php
 include_once('imports/db_connect.php');
  $query = mysqli_query($con,'select id, username from users');
  $data  = array();
  while($r = mysqli_fetch_assoc($query)) {
    array_push($data, $r);
  };

  echo json_encode($data);
?>
