<?php


class UserModel {

	public $db;

	public function __construct() {
		$this->db = new PDO(DB_INFO, DB_USER, DB_PASS);
	}

	public function loginUser($_POSTs) {

		
        
		$sql = "SELECT account_type,COUNT(*) AS num_users FROM user WHERE email=? AND password=?";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array($_POSTs['useremail'], $_POSTs['password']));
		$response = $stmt->fetch();
		if ($response['num_users'] > 0 && $response['account_type']==0) {
			$_SESSION['admin'] = $_POSTs['useremail'];
			header('Location: /sport_bet/admin/');
		   exit;
		}
		else if($response['num_users'] > 0 && $response['account_type']==1){
			$_SESSION['user'] = $_POSTs['useremail'];
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