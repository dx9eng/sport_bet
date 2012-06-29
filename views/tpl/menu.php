<div class='cssmenu'>
	<ul>
		<li><a href='/sport_bet/home/'><span>Home</span></a></li>
		<?php
		if (isset($_SESSION['admin'])) {
			?>
			<li><a href='/sport_bet/admin/addMatch/'><span>Add Matches</span></a></li>
			<li><a href='/sport_bet/admin/editResult/'><span>Edit Results</span></a></li>
			<li><a href='/sport_bet/admin/addUser/'><span>Add Users</span></a></li>
      <li><a href='/sport_bet/admin/delUser/'><span>Delete User</span></a></li>
			<?php
		}
		elseif (isset($_SESSION['user'])) {
			?>
			<li><a href='/sport_bet/user/personalProfile'><span>Personal Profile</span></a></li>
			<li><a href='/sport_bet/user/takeAvailableBets'><span>Bets</span></a></li>
			<?php
		} ?>
	</ul>
</div>
