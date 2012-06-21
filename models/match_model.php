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

		$t1 = isset($_SESSION['t1']) ? $_SESSION['t1'] : NULL;
		$t2 = isset($_SESSION['t2']) ? $_SESSION['t2'] : NULL;
		$d = isset($_SESSION['d']) ? $_SESSION['d'] : NULL;

		// Save the match information in a session
		$_SESSION['c_team1'] = htmlentities($p['team1'], ENT_QUOTES);
		$_SESSION['c_team2'] = htmlentities($p['team2'], ENT_QUOTES);
		$_SESSION['c_match_day'] = htmlentities($p['match_day'], ENT_QUOTES);

		// Sanitize the data and store in variables
		$team1 = htmlentities(strip_tags($p['team1']),ENT_QUOTES);
		$team2 = htmlentities(strip_tags($p['team2']),ENT_QUOTES);
		$match_day = htmlentities(strip_tags($p['match_day']),ENT_QUOTES);



		$sql = "INSERT INTO matches (team1, team2, match_day) VALUES (?, ?, ?, ?)";
		if ($stmt = $this->db->prepare($sql)) {
			$stmt->execute(array($team1, $team2, $match_day));
			$stmt->closeCursor();

			// Destroy the information to empty the form
			unset($_SESSION['c_team1'], $_SESSION['c_team2'], $_SESSION['c_match_day'], $_SESSION['error']);
			return;
		}
		else {
			// If something went wrong, return false
			$_SESSION['error'] = "Match not saved";
			return;
		}
	}

	public function editMatchResult() {
		
	}

}

?>