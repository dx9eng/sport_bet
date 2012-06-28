<?php

class match {

	public $db;

	public function __construct() {
		$this->db = new PDO(DB_INFO, DB_USER, DB_PASS);
	}

	public function getAllMatches() {

		// Load all matches
		$sql = "SELECT team1, team2, score_team1, score_team2, match_day, result FROM matches WHERE (score_team1 is not NULL) AND (score_team2 is not NULL) ORDER BY time DESC";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array('match'));

		$e = NULL;

		while ($row = $stmt->fetch()) {
			$e[] = $row;
		}

		return $e;
	}

	public function getUnfinished() {

		// Load all matches
		$sql = "SELECT id_match, team1, team2, match_day, score_team1, score_team2 FROM matches WHERE (score_team1 is NULL) AND (score_team2 is NULL) ORDER BY time ASC";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array('last'));

		$e = NULL;

		while ($row = $stmt->fetch()) {
			$e[] = $row;
		}
		// print_r($row); die;
		return $e;
	}

	public function saveMatch($p) {

		$team1 = htmlentities(strip_tags($p['team1']),ENT_QUOTES);
		$team2 = htmlentities(strip_tags($p['team2']),ENT_QUOTES);
		$match_day = htmlentities(strip_tags($p['match_day']),ENT_QUOTES);

		$sql = "INSERT INTO matches (team1, team2, match_day) VALUES (?, ?, ?)";
		if ($stmt = $this->db->prepare($sql)) {
			$stmt->execute(array($team1, $team2, $match_day));
			$stmt->closeCursor();
			return;
		}
		else {
			$_SESSION['error'] = 'No data inserted';
			return;
		}
	}

public function editMatchResults($score_team1, $score_team2, $result) {
		$sql = "UPDATE matches SET score_team1=?, score_team2=?, result=? WHERE id_match=?;";
		if ($stmt = $this->db->prepare($sql)) {
			$stmt->execute(array($score_team1, $score_team2, $result, $id_match));
			$stmt->closeCursor();
			return;
		}
		else {
			$_SESSION['error'] = 'No data inserted';
			return;
		}
	}

}

?>