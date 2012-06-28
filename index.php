<?php

session_start();
global $errors;

$errors = array(
  1 => '<p class = "error">Please fill the boxes.</p>',
  2 => '<p class = "error">Login failed! Invalid email.</p>',
  3 => '<p class = "error">Login failed! Incorect email or password.</p>',
  4 => '<p class = "error">Login failed! Unknown cause.</p>',
  5 => '<p class = "error">New passwords are not equal!</p>',
  6 => '<p class = "error">An error ocurred while saving the data!</p>',
  );

// Split request
$controller = isset($_GET['page']) ? $_GET['page'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$params = isset($_GET['params']) ? explode('/', $_GET['params']) : array();

include 'inc/configuration.inc.php';
//die(BASE_PATH. " & ". BASE_URL);
// Instantiate controller
include 'controllers/' . $controller . '_controller.php';
$controller_object = new $controller;

// Run controller action
$controller_object->$action($params);


?>