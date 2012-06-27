<!-- top -->
<?php include 'tpl/top.php'; ?>

<!-- content -->
<p><h1>Edit Match Results</h1></p>
<!-- Edit Match form-->
<link rel="stylesheet" type="text/css" href="/sport_bet/css/table.css" />

<div id="match-result">
  <?php
    if (!empty($matches)) {
      foreach ($matches as $m) :
    ?>
  <form name="form1" method="post" action="/sport_bet/admin/editResult/">
  <table>
    <tr>
      <td id="td-d">
        <?php $format = "d-m-Y H:i"; echo $t = date($format, strtotime($m['match_day'])); ?>
      </td>
      <th id="td-m">
        <?php echo $m['team1'] . " vs. " . $m['team2']; ?>
      </th>
      <td id="td-r">
        <input name="score_team1" type="text" id="res">
        <?php echo ' - '; ?>
        <input name="score_team2" type="text" id="res">
      </td>
    </tr>
  </table>
<?php
  endforeach;
}
?>
<table>
  <tr>
    
    <td>
      <?php
        if (isset($_SESSION['error'])) {
          echo $_SESSION['error'];
        }
        else {
          echo "...";
        }
        ?>
    </td>
    <td></td>
    <td><input type="reset" name="Reset" value="Clear Results"></td>
    <td></td>
    <td><input type="submit" name="SubmitResults" value="Save Results"></td>
  </tr>
</table>
</form>

</div>


<!-- content end -->

<!-- bottom -->
<?php include 'tpl/bottom.php'; ?>