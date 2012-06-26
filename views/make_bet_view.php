
	<script type="text/javascript" src="/SportBet/javascript/jquery.js"></script>
	<script>




$(document).ready(function() {
  //alert($('select').val("2"));

	$('button[name=Save]').click(function(event){
		//alert($('select').val()==1);

    $('select').each(function() {
   		var currentSelect = $(this);
   		alert($(this).val());
   		//alert($(this).val()!="none");
   		alert($(this).attr('id'));
  		if($(this).val()!="none") {
	  		$.ajax({
					type: "POST",
					url: "/sport_bet/user/makeBet/"+$(this).attr('id')+"/"+$(this).val(),
					success: function(data) {
						confirm("data="+data);
					},
					error: function() { alert("error"); }
				});
			
		} //end if

  });

		//event.preventDefault();
	}); //end click
});//end document


	</script>


	<?php if(!empty($bets)) {
		foreach ($bets as $row) :
	?>		
	 <table cellpadding="0" cellspacing="0">
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




<div id="match-result">
	<?php if(!empty($matches)) {
		foreach ($matches as $row) :
			$drop = " <select id='$row[id_match]'>
					<option value='none'></option>
					<option value='1'>1</option>
					<option value='2'>2</option>
					<option value='X'>X</option>
					</select>";
		    ?>
			
	 <table cellpadding="0" cellspacing="0">
	    <tr>
	      <td id="td-d"><?php echo $row['match_day']; ?></td>
	      <th id="td-m"><?php echo $row['team1'] . " vs. " . $row['team2']; ?></th>
	      <td id="td-r"><?php echo $drop; ?></td>
	    </tr>
	 </table>
	<?php endforeach; ?>
	
	<?php
	} 
else {
	 echo "No available bets for now! Please come back later!";
}?>
</div>

</br>
<button type="submit" name="Save">Save Bets!</button> 
<?php

?>