<?php

class UserModel {

	public $db;

	public function __construct() {
		$this->db = new PDO(DB_INFO, DB_USER, DB_PASS);
	}

	public function login() {
		$sql = "SELECT COUNT(*) AS num_users FROM admin WHERE username=? AND password=SHA1(?)";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array($_POST['username'], $_POST['password']));
		$response = $stmt->fetch();
		if ($response['num_users'] > 0) {
			$_SESSION['loggedin'] = 1;
		}
		else {
			$_SESSION['loggedin'] = NULL;
		}
		header('Location: /sport_bet/admin/');
		exit;
	}

}

?>