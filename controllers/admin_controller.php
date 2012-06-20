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

		// Instantiate match model
		include_once 'models/match_model.php';
		$match_model = new match;

	}

}
