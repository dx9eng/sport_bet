	<script type="text/javascript" src="/sport_bet/javascript/jquery.js"></script>
	<script type="text/javascript" src="/sport_bet/javascript/jquery-calendar.js"></script>
	<link rel="stylesheet" type="text/css" href="/sport_bet/css/jquery-calendar.css" />
	<link rel="stylesheet" type="text/css" href="/sport_bet/css/styles.css" />
	<script type="text/javascript">
	$(document).ready(function () {
		$("#calendar1, #calendar2").calendar();
		$("#calendar1_alert").click(function(){alert(popUpCal.parseDate($('#calendar1').val()))});
	});
	</script>
</head>
<body>
	<div>
		<fieldset>
			<legend>Pick date</legend>
			<input type="text" id="calendar1" class="calendarFocus"/>
		</fieldset>
	</div>
</body>
</html>