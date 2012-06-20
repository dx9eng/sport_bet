<?php

class admin {

	public function index($params) {

		// Instantiate match model
		include_once 'models/match_model.php'; 
		$match_model = new match;
		
		// Retrieve list of entries
		$matches = $match_model->getAllMatches();
		
		// Include view
		include 'views/admin_login_view.php';
	}

	public function addMatch($params) {

		// Instantiate match model
		include_once 'models/match_model.php';
		$match_model = new match;

	}

}

?>