

 <?php include_once 'views/tpl/header.php'; 

 ?> 

  <script type="text/javascript" src="/SportBet/javascript/jquery.js"></script>
  <script>
 



$(document).ready(function() {

$('.error').hide();
$('.error_pass').hide();

$(':submit[value=Save]').click(function(event){
      //confirm("wrong password");
  $data = $(':input[name=new_password]').val();
  $acc_pass = $(':input[name=password]').val(); // parola scrisa de mine
  $pass_db = $(':hidden[name=pass]').val();     // parola din baza de date
  //confirm($pass_db);
  //confirm($data);
  //confirm($(".confpass").val());
  var len=$data.length;
  if(len<1) {
   // $(':input[name=new_password]').next().show();
  }
  else {
   // $(':input[name=new_password]').next().hide();
  }
  if($acc_pass != $pass_db && $acc_pass.length>0) {
     $('.error_pass').show();
  }
  if($data != $(".confpass").val()) {
   // $('.error').hide();
    $('.confpass').next().show();
     confirm("diff");
  }else {
    $('.confpass').next().hide();
    confirm("eq");
  }
  event.preventDefault();
/*
$.ajax({
        type: "POST",
        url: "/simple_forum/inc/update.inc.php",
        data: "action=comment_delete&id="+id+"&confirm=Yes",
        success: function(data) {
          $myLink.parent().remove();
          //alert("comm del");
          // $(this).parent().remove();
          //$('#res').html(data);
        }
      });*/

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
    <div><span>Password </span><input type="password" name="password" />
      <span class="error_pass"> Wrong account password!Please try again!</span></div>

    <div><span>New Password </span><input name="new_password" class=""/>

    <div><span>Confirm New Password 
    </span><input class="confpass" />
    <span class="error"> Password and Confirm Password dont match</span></div>
    
    <input type="submit" name="submit" value="Save" />
    <input type="submit" name="submit" value="Cancel" />
    <input type="hidden" name="id_user" value="<?php echo $user_data['id_user'] ?>" />
    <input type="hidden" name="pass" value="<?php echo $user_data['password'] ?>" />
    </fieldset>
   </form>



<?php include 'views/tpl/footer.php'; ?> 

