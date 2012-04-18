<?php

	/**
	 * Application Bootstrap File
	 *
	 * @author	Aiden Tailor <aidentailor@gmail.com>
	 * @copyright 2011 Aiden Tailor
	 */

	// Getting config and functions like __autoload
	require_once 'config/config.php';
	require_once 'functions.php';

	// Instatiate MVC System components and run main application controller
	$model      = new ApplicationModel();
	$view       = new View();
	$controller = new ApplicationController($model, $view, $_REQUEST);

	// Start Application
	echo $controller->run();

?>