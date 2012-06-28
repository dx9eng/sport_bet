<?php

class user {

	public function index($params) {

		// Instantiate match model
		include_once 'models/match_model.php'; 
		$match_model = new match;
		
		// Retrieve list of entries
		$matches = $match_model->getAllMatches();
		
		// Include view
    if (isset($_SESSION['user'])) {
      include 'views/index_login_view.php';
    }
    elseif (isset($_SESSION['admin'])) {
      header('Location: /sport_bet/admin/');
    }
    else {
      header('Location: /sport_bet/home/');
    }
	}

   public function makeBet($p) {
    //print_r($p);die;
    include_once 'models/bet_model.php';
    $bet_model = new bet;
    $matches = $bet_model->makeBet($p);
    include_once 'views/make_bet_view.php';
   }

   public function comparePasswords($p) {
      //print_r(SHA1($p[1]));die;
      if($p[0]==SHA1($p[1])) echo "true";
      else echo "false";
  }

  public function compareNewPasswords($p) {
      //print_r(SHA1($p[1]));die;
      if($p[0]==$p[1]) echo "true";
      else echo "false";
  }

   public function betHistory() {
   	
   }

   public function takeAvailableBets($p=NULL) {
    include_once 'models/bet_model.php';
		$bet_model = new bet;
    if(!empty($p)) {
      $_SESSION['error']='Time has expired!';
    }
		$matches = $bet_model->takeAvailableBets();
    $bets = $bet_model->getUserBets();
		include_once 'views/make_bet_view.php';
   }

    public function personalProfile($p) {
    	
    	// print_r($p);die;
      include_once 'models/user_model.php';
		  $user_model = new UserModel;

    	if($_SERVER['REQUEST_METHOD'] == 'POST') {
          // print_r($_POST);die;
           $user_model->updateData($_POST);

           $user_data = $user_model->getUserData();
           include_once 'views/personal_page_view.php';
		}
		 elseif($_SERVER['REQUEST_METHOD']=='POST' && $_POST['submit']=='Cancel') {
         header('Location: /sport_bet/user/personalProfile/');
         exit;
        }
     else {
    	
		  $user_data = $user_model->getUserData();
      //print_r($user_data);die;
		  include_once 'views/personal_page_view.php';
	   }
    }
 
   public function mailExists($email) {
   	include_once 'models/user_model.php';
    $user_model = new UserModel;
     //die($email);
    if($user_model->mailExists($email) == true){
        echo "true";
        //die("true");
      }
    else {  
      echo "false";
     }
   }
 
  public function setPassword($p){
     include_once 'models/user_model.php';
     $user_model = new UserModel;
     //print_r($p);die();
     $user_model->setPassword($p[0],$p[1]);
  }
  
}

?>