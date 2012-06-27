
<?php include 'tpl/top.php'; ?>

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
	//			data: $new_email,                    //data nu se trimite bine
	//			dataType: 'text',
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

	$(':submit[value=Save]').click(function(event){
			//confirm("wrong password");
		$data = $(':input[name=new_password]').val();
		$acc_pass = $(':input[name=password]').val(); // parola scrisa de mine
		$pass_db = $(':hidden[name=pass]').val();     // parola din baza de date
		 confirm($pass_db);

    $name = $(':input[name=name]').val();
    $email = $(':input[name=email]').val();
    $address = $(':input[name=address]').val();
    confirm($name);
    confirm($email);
    confirm($address);


     /*if($('.error_email').is(":hidden") ) {
     alert("ajax save");
     $.ajax({
					type: "POST",
					url: "/sport_bet/user/personalProfile/"+$name+"/"+$email+"/"+$address+"/",
				//	data: {id_user:,pass:$acc_pass},
			   	success: function(data) {
						confirm("data="+data);
					},
					error: function() { alert("error"); }
				});
		}*/


	
		if($acc_pass != $pass_db && $acc_pass.length>0) {
			$('.error_pass').show();
		}
		else $('.error_pass').hide();

		if($acc_pass.length==0 && $data.length>0 && $(".confpass").length>0 ) {
			$('.error_pass').show(); 
		}

		if($data != $(".confpass").val() && $data.length>0 && $(".confpass").length>0) {
			// $('.error').hide();
			$('.confpass').next().show();
			confirm("diff");
		}
		else {
			$('.confpass').next().hide();
		
			if($acc_pass == $pass_db){
				confirm("ajax");
				//event.preventDefault();
				$('.confpass').next().hide();
				$('.error_pass').hide();
	      $id = $(':hidden[name=id_user]').val();
	      alert($id);
				$.ajax({
					type: "GET",
					url: "/sport_bet/user/setPassword/"+$id +"/"+$data,
				//	data: {id_user:,pass:$acc_pass},
			   	success: function(data) {
						confirm("data="+data);
					},
					error: function() { alert("error"); }
				});
			}//end if
		}
	//	event.preventDefault();
	}); //end click
});


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
		</span><input class="confpass" />
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

