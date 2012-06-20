<?php

class home {

	public function index($params) {

		// Instantiate match model
		include_once 'models/match_model.php'; 
		$match_model = new match;
		
		// Retrieve list of entries
		$matches = $match_model->getAllMatches();
		
		// Include view
		if (isset($_SESSION['admin'])) {
			header('Location: /sport_bet/admin/');
		}
		elseif (isset($_SESSION['user'])) {
			header('Location: /sport_bet/user/');
		}
		else {
			include 'views/index_login_view.php';
		}
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
			header('Location: /sport_bet/index_login_view');
		 }	
	}

	public function logout() {
			 unset($_SESSION);
			 session_destroy();
			 header('Location: /sport_bet/home/');
	}


}

?>