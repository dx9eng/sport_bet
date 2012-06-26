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

    public function personalProfile() {
    	
    	  include_once 'models/user_model.php';
		  $user_model = new UserModel;

    	if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'Save') {
           $_SESSION['s_name'] = $_POST['name'];
       
           $_SESSION['s_address'] = $_POST['address'];
         
           $user_model->updateData($_POST);

           $user_data = $user_model->getUserData();
           include_once 'views/personal_page_view.php';
		}
		 elseif($_SERVER['REQUEST_METHOD']=='POST' && $_POST['submit']=='Cancel') {
         header('Location: /sport_bet/user/');
         exit;
        }
        else {
    	
		  $user_data = $user_model->getUserData();
		  include_once 'views/personal_page_view.php';
	  }
    }

}

?>