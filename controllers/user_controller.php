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

   public function makeBet() {

   }

   public function betHistory() {
   	
   }

   public function takeAvailableBets() {
        include_once 'models/bet_model.php';
		$bet_model = new bet;
		$matches = $bet_model->takeAvailableBets();
		include_once 'views/make_bet_view.php';
   }

    public function personalProfile() {
    	
    	
      include_once 'models/user_model.php';
		  $user_model = new UserModel;

    	if($_SERVER['REQUEST_METHOD'] == 'POST') {
         
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
 
  public function setPassword($id_user,$pass){
     include_once 'models/user_model.php';
     $user_model = new UserModel;
     $user_model->setPassword($id_user,$pass);
  }
  
}

?>