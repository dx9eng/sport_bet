<?php


class UserModel {

	public $db;

	public function __construct() {
		$this->db = new PDO(DB_INFO, DB_USER, DB_PASS);
	}

	public function getUserData() {
		$sql = "SELECT id_user,name,address,password FROM user WHERE email=?";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array($_SESSION['user']));
		$response = $stmt->fetch();
		return $response;
		
	}


	public function updateData($p) {
		if($p['email'] != $_SESSION['user']) {
			$_SESSION['user'] = $p['email'];
		}
	  $sql = "UPDATE user
              SET name=?,address=?,email=?
              WHERE id_user=?";
      	$stmt = $this->db->prepare($sql);
		$stmt->execute(array($p['name'],$p['address'],$p['email'],$p['id_user']));
		$response = $stmt->fetch();  

	}

	public function loginUser($_POSTs) {

		global $errors;

		$sql = "SELECT account_type,COUNT(*) AS num_users FROM user WHERE email=? AND password=?";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array($_POSTs['useremail'], $_POSTs['password']));
		$response = $stmt->fetch();
		if ($response['num_users'] > 0 && $response['account_type']==0) {
			$_SESSION['admin'] = $_POSTs['useremail'];
			header('Location: /sport_bet/admin/');
		  exit;
		}
		elseif ($response['num_users'] > 0 && $response['account_type']==1){
			$_SESSION['user'] = $_POSTs['useremail'];
			$_SESSION['password'] = $_POSTs['password'];
			//die($_SESSION['user']);
			header('Location: /sport_bet/user/');
		  exit;
		}
		else {
			// die($_SESSION);
			// $_SESSION['error'] = '3';
			$_SESSION['error'] = 'Login failed! Incorect email or password.';
		  echo "<p>Please try again!</p>";
		  header('Location: /sport_bet/home/');
		  exit;	
		}
		
	}

}

?>