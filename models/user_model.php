<?php

class UserModel {

	public $db;

	public function __construct() {
		$this->db = new PDO(DB_INFO, DB_USER, DB_PASS);
	}

	public function login() {
		$sql = "SELECT account_type,COUNT(*) AS num_users FROM user WHERE email=? AND password=?";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array($_POST['usermail'], $_POST['password']));
		$response = $stmt->fetch();
		if ($response['num_users'] > 0 && $response['account_type']==0) {
			$_SESSION['admin'] = $_POST['usermail'];
			header('Location: /sport_bet/admin/');
		   exit;
		}
		else {
			$_SESSION['user'] = $_POST['usermail'];
			header('Location: /sport_bet/user/');
		   exit;
		}
		
	}

}

?>