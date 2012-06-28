<?php

class bet {

	public $db,$id;

	public function __construct() {
		$this->db = new PDO(DB_INFO, DB_USER, DB_PASS);
		
	}


    // all the matches that the user can bet on
    public function takeAvailableBets() {
    include_once 'models/user_model.php';
		$user_model = new UserModel;
    $idd = $user_model->getId();

		$sql = "SELECT * from matches WHERE id_match not in 
						(select id_match from bet where bet.id_user='$idd')
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
		//print_r($p);die;
		include_once 'models/user_model.php';
		$user_model = new UserModel;
    $idd = $user_model->getId();
		$sql = "INSERT INTO bet (id_user,id_match,bet_option) VALUES (?, ?, ?)";
		if($stmt = $this->db->prepare($sql)) {
			$stmt->execute(array($idd, $p[0], $p[1]));
			$stmt->closeCursor();
			header('Location: /sport_bet/user/takeAvailableBets');
		//	$this->getUserBets();
 		}
 		else {
       print_r("error");
 		}
 	}
   /*
   gets the matches that the user bet
   from bet these are the ones that don't have  bet option
   */
	public function getUserBets(){
	    include_once 'models/user_model.php';
			$user_model = new UserModel;
    	$idd = $user_model->getId();

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

  public function getUserTopBets() {
  	$ids = $this->getUsersIds();
  	foreach($ids as $idd) {
  		$arr = $this->getSuccessBet($idd['id_user']);
      $succes= array();
      if(!empty($arr)) {
			  	foreach($arr as $succ) {
			  		//var_dump($succ['success']);
			  		$succ = intval($succ['success']);
			  		//var_dump(intval($succ));
			  		array_push($succes, $succ);
			  	}
				
		  	$all[array_sum($succes)] = $idd['name'];
				}  	
	  }
  
  	$result = krsort($all);
  	//var_dump($all);
  	return $all;
  }

  private function getUsersIds() {
    $sql = "SELECT id_user,`name` from user where account_type=1";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		$rsp = $stmt->fetchAll();
		//print_r($rsp);die;
		return $rsp;
  }

  private function getSuccessBet($idd) {
  	$sql = "SELECT bet.success from bet where id_user= '$idd' ";
		$stmt = $this->db->prepare($sql);
		//$stmt->bindParam(':idd',$idd, PDO::PARAM_INT);
		$stmt->execute();
		$rsp = $stmt->fetchAll();
		//print_r($rsp);die;
		return $rsp;
  }

}

?>