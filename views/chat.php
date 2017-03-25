<?php
	include ('../api/imports/db_connect.php');

	$req = mysqli_query($con,'select  * from users');
?>


	<div class="side_list">
		<div class="user_search  card input-field col m6">
          <i class="material-icons prefix cyan-text accent-4">search</i>
          <input type="text" placeholder="Search" ng-model="search">
        </div>

		 <ul class="collection">
			 <?php
			 while($dnn = mysqli_fetch_array($req))
			 {
			 ?>

			 <li class="collection-item avatar pointit" >
		      <img class="circle set_line_height" src="https://dummyimage.com/300/09f/fff.png" alt="">


					<p class="user_name_list" >
						{{"
						 <?php   echo htmlentities($dnn['username'], ENT_QUOTES, 'UTF-8'); ?>
					  "| uppercase}}
					</p>
		      <p class="list_time">12/12/12</p><br>
		      <p class="message_sample">Hi there</p>
					<?php
					}
					?>
		    </li>
		    <li class="pointit row" style="margin-bottom: auto;">
		    	<h6 class="col m10 cyan-text">Direct Message</h6>
		    	<i class="col-m2 push material-icons prefix  cyan-text pointit">people</i>
		    </li>
		</ul>
	</div>
	<div class="chat_arena">
	<div class="message-area">
	 	<textarea class="text-box" placeholder="Type a message"></textarea>
	 	<i class="material-icons prefix  cyan-text pointit">face</i>
		<i class="material-icons prefix  cyan-text pointit emoji">send</i>
	 </div>
</div>
