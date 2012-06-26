<!-- top -->
<?php include 'tpl/top.php'; ?>

<!-- content -->
	<link rel="stylesheet" type="text/css" href="/sport_bet/css/table.css" />
	<script type="text/javascript" src="/sport_bet/javascript/jquery-calendar.js"></script>
	<link rel="stylesheet" type="text/css" href="/sport_bet/css/jquery-calendar.css" />
	<script type="text/javascript">
	$(document).ready(function () {
		$("#calendar1, #calendar2").calendar();
		$("#calendar1_alert").click(function(){alert(popUpCal.parseDate($('#calendar1').val()))});
	});
	</script>
</head>
	<!-- -->
	<!-- Add match form -->
	<div>
		<form >
			<fieldset id="match">
				<legend>Add match</legend>
				<legend>First Team</legend>
				<input type="text" id="team1" class=""/>
				<legend>Second Team</legend>
				<input type="text" id="team2" class=""/>
				<legend>Pick date</legend>
				<input type="text" id="calendar1" class="calendarFocus"/>
				<input type="submit" name="submit" value="Add Match">
				<input type="submit" name="submit" value="Cancel" />
			</fieldset>
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
				<td id="td-d"><?php echo $l['match_day']; ?></td>
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