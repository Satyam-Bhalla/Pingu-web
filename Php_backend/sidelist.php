<div class="side_list">
	<div class="navbar brand-name pingu-nav">
		<nav class="cyan accent-4 ">
			<div class="nav-wrapper">
				<img src="views/logo.png" alt="" class="circle" style="width:73px;height:73px;border-radius:50px;">
				<a href="http://localhost/Offline-chat-app/" class="brand-logo left">Pingu</a>
			</div>
		</nav>
	</div>
	<br>
	<div class="user_search  card input-field col m6">
          <i class="material-icons prefix cyan-text accent-4">search</i>
          <input type="text" placeholder="Search">
  </div>
	<div class="card-tabs card-content">
		 <ul class="tabs  tabs-fixed-width">
			 <li class="tab col s3"><a class="active" href="">All Users</a></li>
			<li class="tab col s3"><a href="">Recent Chats</a></li>
		 </ul>
	</div>

	<ul class="collection" >
		<?php
	 //We get the IDs, usernames and emails of users
	 $req = mysqli_query($con,'select id,username from users');
	 while($dnn = mysqli_fetch_array($req))
	 {
		 if($_SESSION['username'] != $dnn['username']){
	 ?>
	 <a href="chatarea.php?id=<?php echo $dnn['id'];?>">
		 <div>
			 <li class="collection-item avatar pointit">

		      <img class="circle set_line_height" src="views/profile.jpg" alt="">
					<div class="user_name_list">
						<?php echo strtoupper($dnn['username']);?>
					</div>
					<p style="visibility: hidden;">
						<?php echo $dnn['id'];?>
					</p>

		    </li>
			</div>
			</a>
				<?php
			 		}
				}
				 ?>
	</ul>

</div>
<?php
if(!isset($_GET['id'])){
	include_once('indexsidenav.php');
}
?>
