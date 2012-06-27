<!-- top -->
<?php include 'tpl/top.php'; ?>

<!-- content -->
	<link rel="stylesheet" type="text/css" href="/sport_bet/css/table.css" />
	<script type="text/javascript" src="/sport_bet/javascript/jquery-calendar.js"></script>
	<link rel="stylesheet" type="text/css" href="/sport_bet/css/jquery-calendar.css" />
	<script type="text/javascript">
	$(document).ready(function () {
		$("#match_day, #calendar2").calendar();
		//$("#match_day_alert").click(function(){alert(popUpCal.parseDate($('#match_day').val()))});
	});
	</script>
</head>
	<!-- -->
	<!-- Add match form -->
	<div>
		<form name="form2" method="post" action="/sport_bet/admin/addMatch/">
			<table>
				<tr>
					<td>First Team</td>
					<td><input name="team1" type="text" id="team1"></td>
				</tr>
				<tr>
					<td>Second Team</td>
					<td><input name="team2" type="text" id="team2"></td>
				</tr>
				<tr>
					<td>Match Date and Time</td>
					<td><input name="match_day" type="text" id="match_day" class="calendarFocus"></td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="Submit" value="Add Match">
						<input type="reset" name="Cancel" value="Cancel">
					</td>
				</tr>
			</table>
		</form>
	</div>
	<!-- End Add match form-->
	<!-- Display last matches added -->
	<p>
		<h1>Last matches added</h1>
	</p>
	<div id="match-result">
		<?php
			$i = 0;
			foreach ($last as $l) :
				if ($i == 5) {
					break;
				}
			?>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td id="td-d"><?php $format = "d-m-Y H:i"; echo $t = date($format, strtotime($l['match_day'])); ?></td>
				<th id="td-m"><?php echo $l['team1'] . " vs. " . $l['team2']; ?></th>
			</tr>
		</table>
		<?php
			$i++;
			endforeach;
		?>
	</div>
<!-- End Display last matches added -->

<!-- bottom -->
<?php include 'tpl/bottom.php'; ?>