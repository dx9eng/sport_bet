<?php

class bet {

	public $db,$id;

	public function __construct() {
		$this->db = new PDO(DB_INFO, DB_USER, DB_PASS);
		include_once 'models/user_model.php';
		$user_model = new UserModel;
    $this->id = $user_model->getId();
	}

    public function takeAvailableBets() {
    
		$sql = "SELECT * from bet,matches 
						where bet.id_match != matches.id_match";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		$response = $stmt->fetchAll();
		//print_r($response);
       // die();
		return $response;
	}
 
    public function getAllBets() {

    }

	public function addBet() {

	}

	public function makeBet($p) {
		//print_r($_SESSION['user']);die;
		
    //print_r($response);die;

    $sql = "INSERT INTO bet (id_user,id_match,bet_option) VALUES (?, ?, ?)";
		if ($stmt = $this->db->prepare($sql)) {
			$stmt->execute(array($id, $p[0], $p[1]));
			$stmt->closeCursor();
			$this->getUserBets();
 		}
 		else {
       
 		}
 	}

	public function getUserBets(){
	    $idd = $this->id;
      $sql = "SELECT matches.id_match,matches.team1,matches.team2,matches.match_day,bet.bet_option
						 from bet, matches	where bet.id_match=matches.id_match and bet.id_user=2 and bet.bet_option 
						 is not null";
		  $stmt = $this->db->prepare($sql);
			$stmt->execute();
			$rsp = $stmt->fetchAll();
			//print_r($rsp);die;
			return $rsp;
	}

	public function setBetResult() {
		
	}

}

?>