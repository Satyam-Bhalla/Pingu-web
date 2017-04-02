<div class="side_list">
	<div class="navbar brand-name">
		<nav class="cyan accent-4 ">
			<div class="nav-wrapper">
				<img src="views/logo.png" alt="" class="circle" style="width:73px;height:73px;border-radius:50px;">
				<a href="" class="brand-logo left">Pingu</a>
			</div>
		</nav>
	</div>
	<br>
	<div class="user_search  card input-field col m6">
          <i class="material-icons prefix cyan-text accent-4">search</i>
          <input type="text" placeholder="Search" ng-model="search">
  </div>
	<div class="card-tabs card-content">
		 <ul class="tabs  tabs-fixed-width">
			 <li class="tab col s3"><a class="active" href="">All Users</a></li>
			<li class="tab col s3"><a href="">Recent Chats</a></li>
		 </ul>
	</div>
	<ul class="collection" >
			 <li class="collection-item avatar pointit" ng-repeat="user in all_users | filter:search">
		      <img class="circle set_line_height" src="views/profile.jpg" alt="">
					<p class="user_name_list" id={{user.id}}>
						{{user.username | uppercase}}
					</p>
		    </li>
		    <li class="pointit row" style="margin-bottom: auto;">
		    	<h6 class="col m10 cyan-text">Direct Message</h6>
		    	<i class="col-m2 push material-icons prefix  cyan-text pointit">people</i>
		    </li>

	</ul>
</div>
<div class="chat_arena">
	<div class="navbar brand-name">
		<nav class="cyan accent-4 ">
			<div class="nav-wrapper">
				<!-- <a class="btn-floating cyan" style="float:right;padding:0px;margin-top:10px;padding-top:-30px;"> -->
				<!-- <a href="" class="btn cyan accent-4" style="float:right;border-radius:100% !important;width:10px !important;margin-right:10px;margin-top:10px;text-align:center !important;"> -->
					<!-- <button type="file" name="button" class="btn cyan"><i class="material-icons  white-text  pointit" style="border-color:white;float:right;margin-right:10px;">attach_file</i></button> -->

					<a class="btn cyan accent-4"href="http://localhost/Offline-chat-app/api/logout.php" style="float:right;margin-top:15px;">Logout</a>

				<!-- </a> -->
			 <!-- </a> -->

			</div>
		</nav>
	</div>
	<form method="post" action="#!/chat/">
		<div class="messages">
		<div class="message from">
        <p>Hei. Can we meet later this week?</p>
      </div>
      <div class="message to">
        <p>Sure thing. Friday, 4pm, same place?</p>
      </div>
			<br>
			<br>
			<br>
			<div class="message from">
	        <p>Hei. Can we meet later this week?</p>
	      </div>
	      <div class="message to">
	        <p>Sure thing. Friday, 4pm, same place?</p>
	      </div>
		</div>
	<div class="message-area">

	 	<textarea class="text-box" placeholder="Type a message" id="message" name="message"></textarea>
		<i class="material-icons prefix  cyan-text pointit">face</i>
		<i class="material-icons prefix  cyan-text pointit emoji">send</i>
	 </div>
 </form>
</div>
