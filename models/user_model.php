<?php


class UserModel {

	public $db;

	public function __construct() {
		$this->db = new PDO(DB_INFO, DB_USER, DB_PASS);
	}
  
  public function getId() {
  	$sql1 = "select id_user from user where email=?";
    $stmt = $this->db->prepare($sql1);
		$stmt->execute(array($_SESSION['user']));
		$response =	$stmt->fetch();
		return $response['id_user'];
  }

	public function getUserData() {
		$sql = "SELECT id_user,name,address,email,password FROM user WHERE email=?";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array($_SESSION['user']));
		$response = $stmt->fetch();
    return $response;
		
	}
	

    public function mailExists($m) {
    	//$m1=$this->sanitizeData($m);
    	//$m1 = array_map('htmlentities',$m);  
			//print_r(htmlentities());
    	//die(print_r($m[0])."    ");
			$sql = "SELECT COUNT(*) AS num_user FROM user WHERE email='$m[0]'";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$response = $stmt->fetch();
      //die($response['num_user']);
			if($response['num_user']>0) return true;
			else  return false;	
	} 

	function sanitizeData($data) {
   // If $data is not an array, run strip_tags()
   if(!is_array($data)) {
			// Remove all tags except <a> tags
  		return strip_tags($data, "<a>");
	}
	// If $data is an array, process each element
  else {
		// Call sanitizeData recursively for each array element
  	return array_map('sanitizeData', $data);
	}
}


  
	public function updateData($p) {
		//print_r($p);die;
		if($p['new_email'] != $_SESSION['user']) {
			$_SESSION['user'] = $p['new_email'];
		}
		if(!empty($p['new_password']) && !empty($p['confpass']) && !empty($p['password'])) {
				if( $p['new_password'] != $p['confpass']) {
					//print_r($p);die;
					 $_SESSION['error'] = 5;
					 //return;
				}
		elseif(!empty($p['new_password']) && !empty($p['confpass']) && empty($p['password'])) {
        $_SESSION['error'] = 7;
		}		
		else {
					unset($_SESSION['error']);
					$this->setPassword($p['id_user'],$p['new_password']);
				}
	  }
	  if (!preg_match("/^\S+@[\w\d.-]{2,}\.[\w]{2,6}$/iU", $p['new_email'])) {
				$_SESSION['error'] = 2;
				return;
			}
	
	  $sql = "UPDATE user
            SET name=?,address=?,email=?
            WHERE id_user=?";
    if($stmt = $this->db->prepare($sql)) {
			$stmt->execute(array($p['name'],$p['address'],$p['new_email'],$p['id_user']));
			$response = $stmt->fetch();  
		}
		else {
       $_SESSION['error'] = 6;
			 return;
		}

	}

    public function setPassword($id_user,$pass) {
      $sql = "UPDATE user
        SET   password=?
        WHERE id_user=?";
      $stmt = $this->db->prepare($sql);
      $stmt->execute(array(sha1($pass),$id_user));
      $response = $stmt->fetch();  
    }

	public function loginUser($_POSTs) {
   
		global $errors;

   	$sql = "SELECT account_type,COUNT(*) AS num_users FROM user WHERE email=? AND password=SHA1(?)";
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
			header('Location: /sport_bet/user/');
		  exit;
		}
		else {
			$_SESSION['error'] = 'Login failed! Incorect email or password.';
		  echo "<p>Please try again!</p>";
		  header('Location: /sport_bet/home/');
		  exit;	
		}
	}

	public function checkforemail($email) {
		$sql = "SELECT email FROM user WHERE email = '$email'";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array($email));
		$response = $stmt->fetch();
		return $response;
	}

	public function getAllMatches() {
		// Load all matches
		$sql = "SELECT team1, team2, score_team1, score_team2, match_day, result FROM matches WHERE (score_team1 is not NULL) AND (score_team2 is not NULL) ORDER BY match_day DESC";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array('match'));

		$e = NULL;

		while ($row = $stmt->fetch()) {
			$e[] = $row;
		}

		return $e;
	}

	public function insertUser($name, $email, $password) {

		$sql = "INSERT INTO user (name, email, password, account_type) VALUES (?, ?, ?, 1)";
		if ($stmt = $this->db->prepare($sql)) {
			$stmt->execute(array($name, $email, $password));
			$stmt->closeCursor();
			return;
		}
		else {
			$_SESSION['error'] = 'No data inserted';
			return;
		}
	}

  public function getAllUsers() {
    // Load all matches
    $sql = "SELECT * FROM users";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(array('users'));

    $e = NULL;

    while ($row = $stmt->fetch()) {
      $e[] = $row;
    }

    return $e;
  }

  public function deleteUser() {
    $sql = "DELETE FROM user WHERE email = ?";
    if ($stmt = $this->db->prepare($sql)) {
      $stmt->execute(array($email));
      $delete = $stmt->fetch();
      return $delete;
    }
  }
}

?>