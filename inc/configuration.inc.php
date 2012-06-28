<?php
define('DB_INFO', 'mysql:host=localhost; dbname=sportbet');
define('DB_USER', 'root');
define('DB_PASS', '');


//define('BASE_PATH',realpath('.'). DIRECTORY_SEPARATOR);
//define('BASE_URL', dirname($_SERVER["SCRIPT_NAME"]). "/");

$errors = array(
  1 => '<p class = "error">Please fill the boxes.</p>',
  2 => '<p class = "error">Login failed! Invalid email.</p>',
  3 => '<p class = "error">Login failed! Incorect email or password.</p>',
  4 => '<p class = "error">Login failed! Unknown cause.</p>',
  5 => '<p class = "error">New passwords are not equal!</p>',
  6 => '<p class = "error">An error ocurred while saving the data!</p>',
  );


?>