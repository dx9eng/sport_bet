<!-- top -->
<?php include 'tpl/top.php'; ?>

<!-- content -->
	<script type="text/javascript" src="/sport_bet/javascript/jquery.js"></script>
	<script type="text/javascript" src="/sport_bet/javascript/jquery-calendar.js"></script>
	<link rel="stylesheet" type="text/css" href="/sport_bet/css/jquery-calendar.css" />
	<script type="text/javascript">
	$(document).ready(function () {
		$("#calendar1, #calendar2").calendar();
		$("#calendar1_alert").click(function(){alert(popUpCal.parseDate($('#calendar1').val()))});
	});
	</script>
</head>
<body>
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
</body>
</html>

<!-- bottom -->
<?php include 'tpl/bottom.php'; ?>