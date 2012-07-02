<!-- top -->
<?php include 'tpl/top.php'; ?>

<!-- content -->
<script type="text/javascript">
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","/sport_bet/views/getuser.php?q="+str,true);
xmlhttp.send();
}
</script>
<form>
  <select name="users" onchange="showUser(this.value)">
    <option value="">Select an user</option>
    <?php
      foreach ($users_list as $key => $row) :
    ?>
    <option value="<?php echo $row['id_user'] ?>"><?php echo $row['name']; ?></option>
    <?php
      endforeach;
    ?>
  </select>
</form>
<br />
<div id="txtHint"><b>User info:</b></div>
<!-- content end -->

<!-- bottom -->
<?php include 'tpl/bottom.php'; ?>