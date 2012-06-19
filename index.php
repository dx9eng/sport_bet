<?php

// Split request
$controller = isset($_GET['page']) ? $_GET['page'] : 'user';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$params = isset($_GET['params']) ? explode('/', $_GET['params']) : array();

// Config
include 'inc/db.inc.php';

// Instantiate controller
include 'controllers/' . $controller . '_controller.php';
$controller_object = new $controller;

// Run controller action
$controller_object->$action($params);


?>