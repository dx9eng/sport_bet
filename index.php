<?php

session_start();

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