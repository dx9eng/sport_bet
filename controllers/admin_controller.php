<?php

class admin {

	public function index($params) {

		// Instantiate match model
		include_once 'models/match_model.php'; 
		$match_model = new match;
		
		// Retrieve list of entries
		$matches = $match_model->getAllMatches();
		
		// Include view
		if (isset($_SESSION['admin'])) {
			include 'views/admin_login_view.php';
		}
		elseif (isset($_SESSION['user'])) {
			header('Location: /sport_bet/user/');
		}
		else {
			header('Location: /sport_bet/home/');
		}
	}

	public function addMatch($params) {
		global $errors;
		$_SESSION['error'] = NULL;
		// Instantiate model
		include_once 'models/match_model.php';
		// print_r($params); die;
		// Retrieve
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'Add Match') {
					
					$match_model = new match;
					if ($_SESSION['error'] == NULL) {
						print_r($match_model); die;
						$matches = $match_model->saveMatch($_POST);
					}
				}

		// header('Location: /sport_bet/admin/add_match.php');
		include 'views/admin_add_match.php';

	}

	public function editResult() {

		// Instantiate match model
		// Retrieve the match
		include 'views/admin_edit_match.php';
	}

	public function addUser() {
		
		// Instantiate user model
		// Retrieve the user
		include 'views/admin_add_user.php';
	}

}
