<?php

class bet {

	public $db;

	public function __construct() {
		$this->db = new PDO(DB_INFO, DB_USER, DB_PASS);
	}

    public function takeAvailableBets() {
		$sql = "SELECT id_match,team1,team2,match_day FROM matches WHERE result is NULL";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		$response = $stmt->fetch();
		return $response;
	}
 
    public function getAllBets() {

    }

	public function addBet() {

	}

	public function makeBet() {

	}

	public function getUserBets(){

	}

	public function setBetResult() {
		
	}

}

?>