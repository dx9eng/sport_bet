<?php

class admin {

	public function index($params) {

		// Instantiate match model
		include_once 'models/match_model.php'; 
		$match_model = new match;
		
		// Retrieve list of entries
		$matches = $match_model->getAllMatches();
		
		// Include view
		if (isset($_SESSION['admin'])) {
			include 'views/admin_login_view.php';
		}
		elseif (isset($_SESSION['user'])) {
			header('Location: /sport_bet/user/');
		}
		else {
			header('Location: /sport_bet/home/');
		}
	}

	public function addMatch($params) {
		global $errors;
		$_SESSION['error'] = NULL;
		$error = NULL;
		
		// Instantiate model
		include_once 'models/match_model.php';
		$match_model = new match;
		// print_r($params); die;
		// Retrieve
		$last = $match_model->getUnfinished();
		//print_r($match_model->getUnfinished()); die;
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'Add Match') {
					if ($_SESSION['error'] == NULL) {
						print_r($match_model); die;
						$matches = $match_model->saveMatch($_POST);
					}
				}

		if (isset($_SESSION['admin'])) {
			include 'views/admin_add_match.php';
		}
		elseif (isset($_SESSION['user'])) {
			header('Location: /sport_bet/user/');
		}
		else {
			header('Location: /sport_bet/home/');
		}

	}

	public function editResult() {

		// Instantiate match model
		// Retrieve the match
		if (isset($_SESSION['admin'])) {
			include 'views/admin_edit_result.php';
		}
		elseif (isset($_SESSION['user'])) {
			header('Location: /sport_bet/user/');
		}
		else {
			header('Location: /sport_bet/home/');
		}
	}

	public function addUser($params) {
		
		global $errors;
		$_SESSION['error'] = NULL;

		// Instantiate user model
		include_once 'models/user_model.php';
		$user_model = new UserModel;

		if (isset($_SESSION['admin'])) {
			// check all fields have been posted
			if (!isset($_POST['name'], $_POST['email'], $_POST['password'])) {
				$_SESSION['error'] = 'All fields must be completed';
			}
			// check the length of the user name
			elseif (strlen($_POST['name']) < 3 || strlen($_POST['name']) > 45) {
				$_SESSION['error'] = 'Invalid Name';
			}
			// check the length of the password
			elseif (strlen($_POST['password']) < 4 || strlen($_POST['password']) > 45) {
				$_SESSION['error'] = 'Invalid Password';
			}
			// check the length of the users email
			elseif (strlen($_POST['email']) < 6) {
				$_SESSION['error'] = 'Too short email';
			}
			elseif (strlen($_POST['email']) > 45) {
				$_SESSION['error'] = 'Too long email';
			}
			// check for email valid email address
			elseif (!preg_match("/^\S+@[\w\d.-]{2,}\.[\w]{2,6}$/iU", $_POST['email'])) {
				$_SESSION['error'] = 'Invalid Email';
			}
			else {
				// escape all
				$name = mysql_real_escape_string($_POST['name']);
				// encrypt the password
				$password = sha1($_POST['password']);
				$password = mysql_real_escape_string($password);
				// strip injection chars from email
				$email = preg_replace( '((?:\n|\r|\t|%0A|%0D|%08|%09)+)i' , '', $_POST['email'] );
				$email = mysql_real_escape_string($email);

				$user_email = $user_model->checkforemail($email);
				if ($user_email[0] == $email) {
					$_SESSION['error'] = 'Email is already in use';
				}
				elseif ($user_email[0] != $email) {
				 $user = $user_model->insertUser($_POST);
				 $_SESSION['error'] = NULL;
				 $_POST['name'] = $_POST['password'] = $_POST['email'] = NULL;
				 // session_destroy();
				}
			}
			include 'views/admin_add_user.php';
		}

		elseif (isset($_SESSION['user'])) {
			header('Location: /sport_bet/user/');
		}
		else {
			header('Location: /sport_bet/home/');
		}
	}
}
