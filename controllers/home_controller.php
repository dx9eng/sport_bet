<?php

class home {

	public function index($params) {

		// Instantiate the admin
		include_once 'models/home_model.php';
		$home_model = new HomeModel;

		// Retrieve login
		if ($_SERVER['REQUEST_METHOD'] == 'POST'
			&& $_POST['action'] == 'login'
			&& !empty($_POST['usermail'])
			&& !empty($_POST['password'])) {
			$home = $home_model->login();
		}

		// Include view
		include 'views/index_login_view.php';
	}
}

?>