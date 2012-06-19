<?php

class user {

	public function index($params) {

		

		include 'views/user_login_view.php';
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
         header('Location: /mvc/admin/');
         exit;
        }
        else {
    	
		  $user_data = $user_model->getUserData();
		  include_once 'views/personal_page_view.php';
	  }
    }

}

?>