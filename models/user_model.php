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

	public function checkforemail($p) {
		$email = htmlentities(strip_tags($p['email']),ENT_QUOTES);
		
		$sql = "SELECT email FROM user WHERE email = '$email'";
		$result = mysql_query($sql);
		$row = mysql_fetch_row($result);
	}

	public function insertUser($p) {

		$name = htmlentities(strip_tags($p['name']),ENT_QUOTES);
		$email = htmlentities(strip_tags($p['email']),ENT_QUOTES);
		$password = htmlentities(strip_tags($p['password']),ENT_QUOTES);
		
		$sql = "INSERT INTO user (name, email, password, account_type) VALUES (?, ?, ?, 1)";
		if($stmt = $this->db->prepare($sql)) {
			$stmt->execute(array($name, $email, $password));
			//print_r($stmt); die;
			$stmt->closeCursor();

			unset($_SESSION['c_name'], $_SESSION['c_email'], $_SESSION['c_password'], $_SESSION['error']);
			return;
		}
		else {
			$_SESSION['error'] = 'No data inserted';
			return;
		}
	}
}

?>