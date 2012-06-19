<?php
	if (isset($_SESSION['admin'])) {
		?>
		<a href="#">Home</a>
		<a href="#">Add Matches</a>
		<a href="#">Edit Results</a>
		<a href="#">Add Users</a>
		<?php
	}
	elseif (isset($_SESSION['user'])) {
		?>
		<a href="#">Home</a>
		<a href="/sport_bet/user/personalProfile">Personal Profile</a>
		<a href="#">Bets</a>
		<?php
	}
	else {
		?>
		<a href="/sport_bet/">Home</a>
		<?php
	}