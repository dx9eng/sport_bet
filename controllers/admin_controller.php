<?php

class admin {

	public function index($params) {

		// Instantiate the admin
		include_once 'models/admin_model.php';
		$admin_model = new AdminModel;

		// Retrieve login
		if ($_SERVER['REQUEST_METHOD'] == 'POST'
			&& $_POST['action'] == 'login'
			&& !empty($_POST['usermail'])
			&& !empty($_POST['password'])) {
			$admin = $admin_model->login();
		}

		// Include view
		include 'views/admin_login_view.php';
	}
}

?>