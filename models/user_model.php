<?php


class UserModel {

	public $db;

	public function __construct() {
		$this->db = new PDO(DB_INFO, DB_USER, DB_PASS);
	}

	public function loginUser($_POST) {

		
        
		$sql = "SELECT account_type,COUNT(*) AS num_users FROM user WHERE email=? AND password=?";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array($_POST['useremail'], $_POST['password']));
		$response = $stmt->fetch();
		if ($response['num_users'] > 0 && $response['account_type']==0) {
			$_SESSION['admin'] = $_POST['useremail'];
			header('Location: /sport_bet/admin/');
		   exit;
		}
		else if($response['num_users'] > 0 && $response['account_type']==1){
			$_SESSION['user'] = $_POST['useremail'];
			//die($_SESSION['user']);
			header('Location: /sport_bet/user/');
		   exit;
		}
		else {
			//die($_SESSION);
		  echo "<p>Please try again!</p>";
		  header('Location: /sport_bet/home/');
		  exit;	
		}
		
	}

}

?>