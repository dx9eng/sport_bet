<p>
  <h1>Last results</h1>
</p>
<div id="match-result">
  <?php foreach ($matches as $m) : ?>
  <table cellpadding="0" cellspacing="0">
    <tr>
      <td id="td-d"><?php echo $m['match_day']; ?></td>
      <th id="td-m"><?php echo $m['team1'] . " vs. " . $m['team2']; ?></th>
      <td id="td-r"><?php echo $m['score_team1'] . ' - ' . $m['score_team2']; ?></td>
    </tr>
  </table>
<?php endforeach; ?>
</div>