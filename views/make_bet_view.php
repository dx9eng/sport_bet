<?php include 'tpl/top.php'; ?>
<link rel="stylesheet" type="text/css" href="/sport_bet/css/table.css" />
<link rel="stylesheet" type="text/css" href="/sport_bet/javascript/datetime.js" />

<!--	<script type="text/javascript" src="/SportBet/javascript/jquery.js"></script> -->
	<script>




$(document).ready(function() {
  //alert($('select').val("2"));

	$('button[name=Save]').click(function(event){
		//alert($('select').val()==1);
  
			var today=new Date();
			var h=today.getHours();
			var m=today.getMinutes();
			var s=today.getSeconds();
			// add a zero in front of numbers<10
			m=checkTime(m);
			s=checkTime(s);

				alert($('#td-d').html());
			
			  var strDate = today.getDate() + "-" + (today.getMonth()+1) + "-" + today.getYear();
			  alert(strDate); 
			  alert(h+":"+m+":"+s);
			  
      // confirm($('table.#td-d').html());
   
    $('select').each(function() {
   		var currentSelect = $(this);
   		
   		//alert($(this).val());
   		//alert($(this).attr('id'));
  		if($(this).val()!="none") {
	  		$.ajax({
					type: "POST",
					url: "/sport_bet/user/makeBet/"+$(this).attr('id')+"/"+$(this).val(),
					success: function(data) {
						location.reload();
						//confirm("data="+data);
					},
					error: function() { alert("error"); }
				});
			
		} //end if

  });

		//event.preventDefault();
	}); //end click
});//end document


	</script>

<?php
    $format = "d-m-Y H:i:s"; 
	 $now = date($format); 
	?>
   <p>Date and time:<?php echo $now; ?></p>

<div id="match-result">
<h1>Latest bets!</h1>	</br>
	<?php if(!empty($bets)) {
		foreach ($bets as $row) :
	?>		
	 <table cellpadding="0" cellspacing="0" id="show">
	    <tr>
	      <td id="td-d"><?php echo $row['match_day']; ?></td>
	      <th id="td-m"><?php echo $row['team1'] . " vs. " . $row['team2']."  "; ?></th>
	      <td id="td-r"><?php echo "    ".$row['bet_option']; ?></td>
	    </tr>
	 </table>
	<?php endforeach; ?>
	
	<?php
	} 
else {
	 echo "No available bets!";
}?>
</div>



<div id="match-result">
		<h1>Latest matches that you can bet!</h1>	</br>	
	<?php if(!empty($matches)) {
		foreach ($matches as $row) :
			$drop = " <select id='$row[id_match]'>
					<option value='none'></option>
					<option value='1'>1</option>
					<option value='2'>2</option>
					<option value='X'>X</option>
					</select>";
		    ?>
	<?php
	
	 $d = date($format, strtotime($row['match_day']));
	 ?>
	
	 <table cellpadding="0" cellspacing="0">
	    <tr>
	      <td id="td-d"><?php echo $d."   "; ?></td>
	      <th id="td-m"><?php echo $row['team1'] . " vs. " . $row['team2']."   "; ?></th>
	      <td id="td-r"><?php echo $drop."  "; ?></td>
	    </tr>
	 </table>
	<?php endforeach; ?>
	
	<?php
	} 
else {
	 echo "No available bets for now! Please come back later!";
}?>

</br>
<button type="submit" name="Save">Save Bets!</button> 
</div>



<!-- bottom -->
<?php include 'tpl/bottom.php'; ?>
