<?php

class bet {

	public $db,$id;

	public function __construct() {
		$this->db = new PDO(DB_INFO, DB_USER, DB_PASS);
		include_once 'models/user_model.php';
		$user_model = new UserModel;
    $this->id = $user_model->getId();
	}


    // all the matches that the user can bet on
    public function takeAvailableBets() {
    $idd = $this->id;
		$sql = "SELECT * from matches WHERE not exists 
						(select * from bet where bet.id_user='$idd' and matches.id_match=bet.id_match)
						and matches.match_day > NOW()
						ORDER BY matches.match_day desc";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		$response = $stmt->fetchAll();
	//	print_r($response);die();
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
			$stmt->execute(array($this->id, $p[0], $p[1]));
			$stmt->closeCursor();
			header('Location: /sport_bet/user/takeAvailableBets');
		//	$this->getUserBets();
 		}
 		else {
       
 		}
 	}
   /*
   gets the matches that the user bet
   from bet these are the ones that don't have  bet option
   */
	public function getUserBets(){
	    $idd = $this->id;
      $sql = "SELECT matches.id_match,matches.team1,matches.team2,matches.match_day,bet.bet_option
						 from bet, matches	where bet.id_match=matches.id_match and bet.id_user='$idd' 
						 Order by matches.match_day desc limit 10";
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