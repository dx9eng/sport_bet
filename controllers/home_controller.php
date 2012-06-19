<?php

class home {

	public function index($params) {

		// Instantiate the admin
		include_once 'models/home_model.php';
		$home_model = new HomeModel;

		// Retrieve login
		
		

		// Include view
		include 'views/user_login_view.php';
	}

	public function login() {
		include_once 'models/home_model.php';
		$home_model = new HomeModel;
	  if ($_SERVER['REQUEST_METHOD'] == 'POST'
			&& $_POST['action'] == 'login'
			&& !empty($_POST['usermail'])
			&& !empty($_POST['password'])) {
				
			$home = $home_model->login();
		}	
	   else {
	   	  include_once 'views/index_login_view.php';
	   }	
	}

	
}

?>