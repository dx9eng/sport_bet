<?php

class home {

	public function index($params) {

		// Instantiate the admin
	
		// Include view
		include 'views/index_login_view.php';
	}

	public function login() {
		
	  if ($_SERVER['REQUEST_METHOD'] == 'POST'
			&& $_POST['action'] == 'login'
			&& !empty($_POST['useremail'])
			&& !empty($_POST['password'])) {
			
            //die($_SESSION);
            include_once 'models/user_model.php';
		    $user_model = new UserModel;
			$user = $user_model->loginUser($_POST);
		}	
	   else {
	   	  include_once 'views/index_login_view.php';
	   }	
	}

	public function logout() {
       unset($_SESSION);
       session_destroy();
       header('Location: /sport_bet/home/');
	}


}

?>