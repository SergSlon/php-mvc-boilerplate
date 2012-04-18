<?php

	/**
	 * Application Functions File
	 * Set standard things like error reporting by configuration (config/config.php) file
	 * Magic autoload function
	 *
	 * @author	Aiden Tailor <aidentailor@gmail.com>
	 * @copyright 2011 Aiden Tailor
	 */

	// Error Reporting
	if ($GLOBALS['CONFIG']['display_errors'])
	{
		ini_set('display_errors', 1);
		ini_set('error_reporting', E_ALL | E_STRICT);
	}
	else
	{
		ini_set('display_errors', 0);
		ini_set('error_reporting', 0);
	}


	/**
	 * PHP magic autoload function
	 *
	 * @param $strClass
	 * @return null
	 */
	function __autoload($strClass)
	{
		// Library
		$library = 'libraries/' . $strClass . '.php';
		if (file_exists($library))
		{
			include $library;
			return;
		}

		// Module
		foreach (scan('modules/') as $strFolder)
		{
			if (substr($strFolder, 0, 1) == '.')
			{
				continue;
			}

			if (file_exists('modules/' . $strFolder . '/' . $strClass . '.php'))
			{
				include_once('modules/' . $strFolder . '/' . $strClass . '.php');
				return;
			}
		}
	}

	/**
	 * Quickly dump something in between HTML <pre> Tags
	 *
	 * @param $var what to dump
	 */
	function dump($var)
	{
		echo '<pre>';
		var_dump($var);
		echo '</pre>';
	}

	/**
	 * Scan a directory and return its files and folders as array
	 *
	 * @param string
	 * @return array
	 */
	function scan($strFolder)
	{
		global $arrScanCache;

		// Add trailing slash
		if (substr($strFolder, -1, 1) != '/')
		{
			$strFolder .= '/';
		}

		// Load from cache
		if (isset($arrScanCache[$strFolder]))
		{
			return $arrScanCache[$strFolder];
		}

		$arrReturn = array();

		// Scan directory
		foreach (scandir($strFolder) as $strFile)
		{
			if ($strFile == '.' || $strFile == '..')
			{
				continue;
			}

			$arrReturn[] = $strFile;
		}

		$arrScanCache[$strFolder] = $arrReturn;

		return $arrReturn;
	}
