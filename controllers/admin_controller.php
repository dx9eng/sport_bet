<?php

class admin {

	public function index($params) {

		// Instantiate match model
		include_once 'models/match_model.php'; 
		$match_model = new match;
		
		// Retrieve list of matches
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

		// Instantiate match model
		include_once 'models/match_model.php';
		$match_model = new match;

		if (isset($_SESSION['admin'])) {
			if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['Submit'] == 'Add Match') {
			// escape all
			$team1 = mysql_real_escape_string($_POST['team1']);
			$team2 = mysql_real_escape_string($_POST['team2']);
			$match = mysql_real_escape_string($_POST['match_day']);
			//print_r($_POST['team1']); print_r($_POST['team2']); print_r($match); die;
			$matches = $match_model->saveMatch($_POST);
		}
			$last = $match_model->getUnfinished();
			include 'views/admin_add_match.php';
		}

		elseif (isset($_SESSION['user'])) {
			header('Location: /sport_bet/user/');
		}
		else {
			header('Location: /sport_bet/home/');
		}
	}

	public function editResult($params) {
		
    global $errors;
		$_SESSION['error'] = NULL;
    $result = NULL;

		// Instantiate match model
		include_once 'models/match_model.php'; 
    $match_model = new match;

    if (isset($_SESSION['admin'])) {
      if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['SubmitResults'] == 'Save Results') {
        $ress = $_POST['ress'];
        for ($i = 0; $i < $ress; $i++) {
          $id_match = mysql_real_escape_string($_POST['match_id_' . $i]);
          $score_team1 = mysql_real_escape_string($_POST['score_team1_' . $i]);
          $score_team2 = mysql_real_escape_string($_POST['score_team2_' . $i]);
          if (isset($score_team1) && isset($score_team2)) {
            if (is_numeric($score_team1) && is_numeric($score_team2)) {
              if ($score_team1  == $score_team2) {
                $result = 'x';
              }
              elseif ($score_team1  > $score_team2) {
                $result = '1';
              }
              elseif ($score_team1  < $score_team2) {
                $result = '2';
              }
              $matches = $match_model->editMatchResults($score_team1, $score_team2, $result, $id_match);
              header('Location: /sport_bet/admin/editResult/');
            }
            elseif (!is_numeric($score_team1) || !is_numeric($score_team2)) {
              header('Location: /sport_bet/admin/editResult/');
              $_SESSION['error'] = 'Invalid score.';
            }
          }
        }
      }
      else {
        $matches = $match_model->getUnfinished();
        $ress = count((array)$matches);
        include 'views/admin_edit_result.php';
      }
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
			// check if all fields have been posted
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
			// check for valid email address
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
					$user = $user_model->insertUser($name, $email, $password);
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

  public function delUser($params) {

    // Instantiate user
    include_once 'models/user_model.php';
    $user_model = new UserModel;

    if (isset($_SESSION['admin'])) {
      if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['Submit'] == 'Delete User') {
        
      }
      $users_list = $user_model->getAllUsers();



      include 'views/admin_del_user.php';
    }
    elseif (isset($_SESSION['user'])) {
      header('Location: /sport_bet/user/');
    }
    else {
      header('Location: /sport_bet/home/');
    }

  }
}
