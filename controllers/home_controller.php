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
		
		global $errors;
		$_SESSION['error'] = NULL;
		//$error = $errors[$_SESSION['error']];
		$error = NULL;

		$p = '/^[\w-]+(\.[\w-]+)*@[a-z0-9-]+'.'(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i';

		if ($_SESSION['error'] == NULL && ((empty($_POST['useremail'])) || (empty($_POST['password'])))) {
			// $_SESSION['error'] = '1';
			$_SESSION['error'] = 'Please fill the boxes.';
			//print_r($_SESSION['error']); die;
			header('Location: /sport_bet/home/');
			return;
		}
		elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'login' && !empty($_POST['useremail']) && !empty($_POST['password'])) {

			include_once 'models/user_model.php';
			$user_model = new UserModel;

			if (((preg_match($p, $_POST['useremail'])) ? TRUE : FALSE) == FALSE) {
				// $_SESSION['error'] = '2';
				$_SESSION['error'] = 'Login failed! Invalid email.';
				//print_r($_SESSION['error']); die;
				header('Location: /sport_bet/home/');
				return;
			}
			elseif ($_SESSION['error'] == NULL) {
				$user = $user_model->loginUser($_POST);
			}
		}
		else {
			$_SESSION['error'] = '4';
			//print_r($_SESSION['error']); die;
			header('Location: /sport_bet/home/');
			return;
		}
	}


	public function logout() {
		unset($_SESSION);
		session_destroy();
		header('Location: /sport_bet/home/');
	}
}
?>