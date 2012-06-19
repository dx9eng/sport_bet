

 <?php include_once 'views/tpl/header.php'; ?> 

  <script type="text/javascript" src="/SportBet/javascript/jquery.js"></script>
  <script>
 



$(document).ready(function() {

$('.error').hide();
$('.submit[value=Next]').click(function(event){
      alert("wrong password");
data=$('.password').val();
var len=data.length;
if(len<1) {
  $('.password').next().show();
}
else {
  $('.password').next().hide();
}
if($('.password').val() !=$(".confpass").val()) {
  $('.confpass').next().show();
}else {
  $('.confpass').next().hide();
}
event.preventDefault();
});

});

  </script>

<?php
if(!empty($user_data) ) {
             $_SESSION['s_name'] = $user_data['name'];
        $_SESSION['s_address'] = $user_data['address'];
        $_SESSION['s_password'] = $user_data['password'];
        //die($_SESSION[]);
          }
 ?>

  <form action="/sport_bet/user/personalProfile" method="post" >
    <fieldset>
    <legend>Update personal profile</legend>
    <label>Name
    <input type="text" name="name" maxlength="75" value="<?php echo $_SESSION['s_name'] ?>"/>
    </label>
    <label>Email
    <input type="text" name="email" value="<?php echo $_SESSION['user'] ?>"/>
    </label>
    <label>Adress
    <input type="text" name="address" maxlength="75" value="<?php echo $_SESSION['s_address'] ?>"/>
    </label>
    <p> Change password</p>
    <div><span>Password </span><input name="password" />

    <div><span>New Password </span><input name="password" />

    <div><span>Confirm New Password 
    </span><input class="confpass" /><span class="error"> 
        Password and Confirm Password dont match</span></div>
    
    <input type="submit" name="submit" value="Save" />
    <input type="submit" name="submit" value="Cancel" />
    <input type="hidden" name="id_user" value="<?php echo $user_data['id_user'] ?>" />
    </fieldset>
   </form>



<?php include 'views/tpl/footer.php'; ?> 

