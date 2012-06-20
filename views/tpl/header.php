<?php

if (isset($_SESSION['user']) || isset($_SESSION['admin'])) {
	include_once 'views/tpl/logout_view.php';
}
else {
	include_once 'views/tpl/login_view.php';
	//echo $error;
}

?>
