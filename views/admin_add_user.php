<!-- top -->
<?php include 'tpl/top.php'; ?>

<!-- content -->
<p>
	<h1>Add users</h1>
</p>

<table>
	<tr>
		<td>
			<form name="form1" method="post" action="/sport_bet/admin/addUser/">
				<table>
					<tr>
						<td>
							<strong>
								<?php
									if (isset($_SESSION['error'])) {
										echo $_SESSION['error'];
									}
									else {
										echo "User added";
									}
								?>
							</strong>
						</td>
					</tr>
					<tr>
						<td>Name</td>
						<td><input name="name" type="text" id="name"></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input name="email" type="text" id="email"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input name="password" type="password" id="password"></td>
					</tr>
					<tr>
						<td>
							<td>
								<input type="submit" name="Submit" value="Add User">
								<input type="reset" name="Cancel" value="Cancel">
							</td>
						</td>
					</tr>
				</table>
		</td>
	</tr>
</table>
<!-- content end -->

<!-- bottom -->
<?php include 'tpl/bottom.php'; ?>