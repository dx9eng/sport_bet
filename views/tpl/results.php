<link rel="stylesheet" type="text/css" href="/sport_bet/css/table.css" />
<p>
  <h1>Last results</h1>
</p>
<div id="match-result">
  <?php
  	if (!empty($matches)) {
  	foreach ($matches as $m) :
  ?>
  <table cellpadding="0" cellspacing="0">
    <tr>
      <td id="td-d"><?php $format = "d-m-Y H:i"; echo $t = date($format, strtotime($m['match_day'])); ?></td>
      <th id="td-m"><?php echo $m['team1'] . " vs. " . $m['team2']; ?></th>
      <td id="td-r"><?php echo $m['score_team1'] . ' - ' . $m['score_team2']; ?></td>
    </tr>
  </table>
<?php
	endforeach;
}
?>
</div>