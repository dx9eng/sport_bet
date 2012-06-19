<?php

class home {

	public function index($params) {

		// Instantiate the admin
	
		// Include view
		include 'views/index_login_view.php';
	}

	public function login() {
		include_once 'models/user_model.php';
		$user_model = new UserModel;
	  if ($_SERVER['REQUEST_METHOD'] == 'POST'
			&& $_POST['action'] == 'login'
			&& !empty($_POST['usermail'])
			&& !empty($_POST['password'])) {
				
			$user = $user_model->login();
		}	
	   else {
	   	  include_once 'views/index_login_view.php';
	   }	
	}


}

?>