<?php
$q=$_GET["q"];
//print_r($q); die;
$con = mysql_connect('localhost', 'root', '');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("sportbet", $con);

$sql="SELECT * FROM user WHERE id_user = '".$q."'";

$result = mysql_query($sql);

echo "<table border='1'>
<tr>
<th>Name</th>
<th>Address</th>
<th>Email</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['address'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
  echo "<td>"
  ?>
    <form name="form1" method="post" action="/sport_bet/admin/delUser/">
    <input type="submit" name="Submit" value="Delete User">
  <?php
  echo "</tr>";
  }
echo "</table>";

mysql_close($con);
?>