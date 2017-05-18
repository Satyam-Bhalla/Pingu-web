<?php
include('db_connect.php');
include('message_send.php');
//We check if the user is logged
if(isset($_SESSION['username']))
{
  // $_GET['id'] = $_SESSION['getid'];
  // echo $_GET['id'] ;
  // $reciever_id = $_SESSION['recieverid'];
   $_GET['id'] = 2;
//We check if the ID of the discussion is defined
if(isset($_GET['id']))
{
$id = intval($_GET['id']);?>
<div class="chat_arena">
  <div class="navbar-fixed  brand-name" id="usernav">
    <nav class="cyan accent-4 ">
      <div class="nav-wrapper">
          <img src="views/profile.jpg" alt="" style="width:50px;height:50px;border-radius:50%;float:left;margin-top:5px;">
           <h5 style="float:left;margin-top:15px;margin-left:10px;"> <?php echo strtoupper($recievername);?><a class="btn cyan accent-4"  id="logout" href="http://localhost/Offline-chat-app/logout.php">Logout</a></h5>
          <!-- <a class="btn cyan accent-4" id="logout"  href="http://localhost/Offline-chat-app/logout.php" style="float:right;margin-top:15px;">Logout</a> -->

      </div>
    </nav>
  </div>
  <?php
//We get the title and the narators of the discussion
$req1 = mysqli_query($con,'select  user1, user2 from pm where id="'.$id.'" and id2="1"');
$dn1 = mysqli_fetch_array($req1);
//We check if the discussion exists
$check = mysqli_num_rows($req1);
if(mysqli_num_rows($req)>=0)
{
//We check if the user have the right to read this discussion
if($dn1['user1']==$_SESSION['id'] or $dn1['user2']==$_SESSION['id'])
{
//The discussion will be placed in read messages
if($dn1['user1']==$_SESSION['id'])
{
	mysqli_query($con,'update pm set user1read="yes" where id="'.$id.'" and id2="1"');
	$user_partic = 2;
}
else
{
	mysqli_query($con,'update pm set user2read="yes" where id="'.$id.'" and id2="1"');
	$user_partic = 1;
}
//We get the list of the messages
$req2 = mysqli_query($con,'select  pm.user1,pm.user2,pm.message, users.id as userid, users.username from pm, users where pm.id="'.$id.'" and users.id=pm.user1 order by pm.id2');
$req3 = mysqli_query($con,'select  pm.user1,pm.user2,pm.message from pm');
//We check if the form has been sent
?>

  <div class="messages">
    <?php
    while($dn2 = mysqli_fetch_array($req3) )
    {
      if($dn2['user1']== $_SESSION['id'] and $dn2['user2'] == $_SESSION['recieverid']){
        ?>
        <div class="message to">
          <p><?php echo $dn2['message']; ?></p>
        </div>
        <?php
      }
      if($dn2['user1']== $_SESSION['recieverid'] and $dn2['user2'] == $_SESSION['id']){
        ?>
        <div class="message from">
          <p><?php echo $dn2['message']; ?></p>
        </div>
        <?php
      }
    }
    ?>
  </div>
</div>

<?php
}

else
{
	echo '<script>Materialize.toast("You dont have the rights to access this page",2000).</script>';
}
}
else
{
	echo 'This discussion does not exists.';
}
}
else
{
	echo 'The discussion ID is not defined.';
}
}
else
{
	echo 'You must be logged to access this page.';
}
?>
