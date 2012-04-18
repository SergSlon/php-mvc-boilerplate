<?php

	/**
	 * Application Config File
	 *
	 * @author	Aiden Tailor <aidentailor@gmail.com>
	 * @copyright 2011 Aiden Tailor
	 */

	/**
	 * Start Session
	 */
	session_start();


	/**
	 * Increase PHP execution time to 5 minutes
	 * Value in seconds
	 */
	//ini_set('max_execution_time', 300);


	/**
	 * Handle debug mode
	 * Sets values for error_reporting and display_errors in function.php
	 */
	$GLOBALS['CONFIG']['display_errors'] = true;


	/**
	 * Database credentials
	 * driver: mysqli
	 */
	$GLOBALS['CONFIG']['db_host'] = 'localhost';
	$GLOBALS['CONFIG']['db_user'] = 'root';
	$GLOBALS['CONFIG']['db_pass'] = 'root';
	$GLOBALS['CONFIG']['db_name'] = 'db-name';


	/**
	 * Navigation dataset
	 */
	$GLOBALS['CONFIG']['modules'] = array
	(
		array
		(
			'title' => 'Example',
			'alias' => 'example-module'
		),
		array
		(
			'title' => 'Module Title',
			'alias' => 'module-alias'
		)
	);


	/**
	 * Startup Module
	 * Defaults to the first module in the config array $GLOBALS['CONFIG']['modules']
	 */
	$GLOBALS['CONFIG']['startup_module'] = $GLOBALS['CONFIG']['modules'][0]['alias'];

?>