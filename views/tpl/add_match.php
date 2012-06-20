<head>
    <script type="text/javascript" src="/sport_bet/inc/calendar.js"></script>
    <script type="text/javascript" src="/sport_bet/inc/calendar-setup.js"></script>
    <script type="text/javascript" src="/sport_bet/inc/calendar-en.js"></script>
    <link rel="stylesheet" href="/sport_bet/css/288433.css" />
    <link rel="stylesheet" href="/sport_bet/css/calendar-win2k-2.css" />
</head>
<body>
	<input name="fromdate" type="text" class="text_box" id="fromdate" value="<?php echo date('Y-m-d');?>" size="18" readonly="readonly" />
	<img src="images/calendar.png" border="0"  id="date_picker_from" title="Date selector" style="cursor:pointer;" >
                                        <script type="text/javascript">
                                            Calendar.setup({
                                                inputField     :    "fromdate",     // id of the input field
                                                ifFormat       :    "%Y-%m-%d",      // format of the input field
                                                button         :    "date_picker_from",  // trigger for the calendar (button ID)
                                                align          :    "Tl",           // alignment (defaults to "Bl")
                                                singleClick    :    true
                                            });
                                        </script> 
</body>