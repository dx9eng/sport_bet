
<?php include 'tpl/top.php'; ?>
<script type="text/javascript" src="/sport_bet/javascript/jQuery.encoding.digests.sha1.js"></script>

<script>

$(document).ready(function() {

	$('.error').hide();
	$('.error_pass').hide();
	$('.error_email').hide();

	// confirm($('.error_email').is(":hidden"));
	//alert("a");

	$(':input[name=email]').focusout(function() {
     $(':submit[value=Save]').attr("disabled", false);
		$new_email = $(':input[name=email]').val();
		//confirm($new_email);

		if($new_email != $(':hidden[name=email]').val()) {
			//confirm($new_email);
			$.ajax({
				type: "GET",
				url: "/sport_bet/user/mailExists/" + $new_email,
				success: function(data) {
					// alert(data);
					 if(data == "false") {
             $('.error_email').hide();
             $(':submit[value=Save]').attr("disabled", false);
           }
           else {
           	 $('.error_email').show();
             $(':submit[value=Save]').attr("disabled", true);
           	}
				},
				error: function(data) {
					alert("error");
				} 
			});
		}
    else {
      $('.error_email').hide();
      $(':submit[value=Save]').attr("disabled", false);
    }
	});//  end focusout


  /*password compare with database */

 $(':input[name=password]').focusout(function() {
  //alert("p");
  $acc_pass = $(':input[name=password]').val(); // parola scrisa de mine
  $pass_db = $(':hidden[name=pass]').val();  
  if($acc_pass.length > 0) { 
    $.ajax({
          type: "GET",
          url: "/sport_bet/user/comparePasswords/"+$pass_db+"/"+$acc_pass,
          success: function(data) {
            // confirm("data="+data);
            if(data == "false") {
              $('.error_pass').show();
              $(':submit[value=Save]').attr("disabled", true);
            }
            else {
              $('.error_pass').hide();
              $(':submit[value=Save]').attr("disabled", false);
            }
           
          },
          error: function() { alert("error"); }
        });
  }

});

  /*
  Focus out last password, Compare new passwords
  */

   $('.confpass').focusout(function(event){
    $data = $(':input[name=new_password]').val();
    confirm($data+" "+$(this).val());
   // if($acc_pass.length > 0) 
   { 
      $.ajax({
          type: "GET",
          url: "/sport_bet/user/compareNewPasswords/"+$data+"/"+$(this).val(),
          success: function(data) {
             confirm("data="+data);
            if(data == "false") {
                $('.confpass').next().show();
            }
            else {
                $('.confpass').next().hide();
            }
           
          },
          error: function() { alert("error"); }
        });
  }
  
   });

 /*
    Click save
 */

	$(':submit[value=Save]').click(function(event){
	
	
		 
        $data = $(':input[name=new_password]').val();
	      $id = $(':hidden[name=id_user]').val();
	      alert($id);
				$.ajax({
					type: "GET",
					url: "/sport_bet/user/setPassword/"+$id +"/"+$data,
			   	success: function(data) {
						confirm("data="+data);
					},
					error: function() { alert("error submit"); }
				});
		
	}); //end click

});//end document ready


	</script>
 

	<form action="/sport_bet/user/personalProfile" method="post">
		<fieldset>
		<legend>Update personal profile</legend>
		<label>Name
		<input type="text" name="name" maxlength="75" value="<?php echo $user_data['name'] ?>"/>
		</label>
		<label><div><span>Email</span>
		<input type="text" name="email" value="<?php echo $user_data['email'] ?>"/>
		  <span class="error_email"> Email in use!Please write another email!</span></div>
		</label>
		<label>Adress
		<input type="text" name="address" maxlength="75" value="<?php echo $user_data['address'] ?>"/>
		</label>
		<p> Change password</p>
		<div><span>Password </span><input type="password" name="password" />
			<span class="error_pass"> Wrong account password!Please try again!</span></div>

		<div><span>New Password </span><input name="new_password" class=""/>

		<div><span>Confirm New Password 
		</span><input class="confpass" name="confpass" />
		<span class="error"> Password and Confirm Password dont match</span></div>
		
		<input type="submit" name="submit" value="Save" />
		<input type="submit" name="submit" value="Cancel" />
		<input type="hidden" name="id_user" value="<?php echo $user_data['id_user'] ?>" />
		<input type="hidden" name="pass" value="<?php echo $user_data['password'] ?>" />
		<input type="hidden" name="email" value="<?php echo $_SESSION['user'] ?>" />
		</fieldset>
	 </form>



<!-- bottom -->
<?php include 'tpl/bottom.php'; ?>

