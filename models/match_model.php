<?php

class match {

	public $db;

	public function __construct() {
		$this->db = new PDO(DB_INFO, DB_USER, DB_PASS);
	}

	public function getAllMatches() {

		// Load all matches
		$sql = "SELECT team1, team2, score_team1, score_team2, match_day, result FROM matches ORDER BY match_day DESC";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array('blog'));

		$e = NULL;

		while ($row = $stmt->fetch()) {
			$e[] = $row;
		}

		return $e;
	}

	public function saveMatch() {

		//
		$sql = "INSERT INTO matches (team1, team2, match_day) VALUES (?, ?, ?, ?)";
		if ($stmt = $this->db->prepare($sql)) {
			$stmt->execute($array());
		}
	}

	public function editMatchResult() {
		
	}

}

?>