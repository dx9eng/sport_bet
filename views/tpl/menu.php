<div class='cssmenu'>
	<ul>
		<li><a href='/sport_bet/home/'><span>Home</span></a></li>
		<?php
		if (isset($_SESSION['admin'])) {
			?>
			<li><a href='/sport_bet/views/tpl/add_match.php'><span>Add Matches</span></a></li>
			<li><a href='#'><span>Edit Results</span></a></li>
			<li><a href='#'><span>Add Users</span></a></li>
			<?php
		}
		elseif (isset($_SESSION['user'])) {
			?>
			<li><a href='#'><span>Personal Profile</span></a></li>
			<li><a href='#'><span>Bets</span></a></li>
			<?php
		} ?>
	</ul>
</div>
