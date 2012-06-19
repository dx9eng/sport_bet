<?php

class user {

	public function index($params) {

		// Instantiate the admin
		include_once 'models/user_model.php';
		$user_model = new UserModel;

		// Retrieve login
		

		// Include view
		include 'views/user_login_view.php';
	}

	public function login() {
	  if ($_SERVER['REQUEST_METHOD'] == 'POST'
			&& $_POST['action'] == 'login'
			&& !empty($_POST['usermail'])
			&& !empty($_POST['password'])) {
				
			$user = $user_model->login();
		}	
	   else {
	   	
	   }	
	}
}

?>