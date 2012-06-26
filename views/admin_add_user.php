<!-- top -->
<?php include 'tpl/top.php'; ?>

<!-- content -->
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<td><form name="form1" method="post" action="/sport_bet/admin/addUser/">
<table width="100%" border="0" cellspacing="1" cellpadding="3">
<tr>
<td colspan="3"><strong>Insert Data Into mySQL Database </strong></td>
</tr>
<tr>
<td width="71">Name</td>
<td width="6">:</td>
<td width="301"><input name="name" type="text" id="name"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input name="password" type="password" id="password"></td>
</tr>
<tr>
<td>Email</td>
<td>:</td>
<td><input name="email" type="text" id="email"></td>
</tr>
<tr>
<td colspan="3" align="center">
	<input type="submit" name="Submit" value="Submit">
	<input type="submit" name="submit" value="Cancel" />
</td>
</tr>
</table>
</form>
</td>
</tr>
	<?php
	if (isset($_SESSION['error'])) {
		echo $_SESSION['error'];
	} else {
		echo "dasfj";
	}
	?>
</table>

<!-- content end -->

<!-- bottom -->
<?php include 'tpl/bottom.php'; ?>