
<div class="side_list">
		<div class="user_search  card input-field col m6">
          <i class="material-icons prefix cyan-text accent-4">search</i>
          <input type="text" placeholder="Search" ng-model="search">
        </div>

		 <ul class="collection" >
			 <li class="collection-item avatar pointit" ng-repeat="user in all_users">
		      <img class="circle set_line_height" src="https://dummyimage.com/300/09f/fff.png" alt="">
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
	<form method="post" action="#!/chat/">
	<div class="message-area">
	 	<textarea class="text-box" placeholder="Type a message" id="message" name="message"></textarea>
	 	<i class="material-icons prefix  cyan-text pointit">face</i>
		<i class="material-icons prefix  cyan-text pointit emoji">send</i>
	 </div>
 </form>
</div>