<?php

	/**
	 * Database Class
	 * Handle any database action (mysqli)
	 *
	 * @author	Aiden Tailor <aidentailor@gmail.com>
	 * @copyright 2011 Aiden Tailor
	 */

	class Database extends System
	{
		private $database;

		public function __construct()
		{
			$this->connect();
		}

		/**
		 * Connect to the Database
		 */
		public function connect()
		{
			$this->database = new mysqli(
				$GLOBALS['CONFIG']['db_host'],
				$GLOBALS['CONFIG']['db_user'],
				$GLOBALS['CONFIG']['db_pass'],
				$GLOBALS['CONFIG']['db_name']
			);
		}

		/**
		 * Use real escape string to escape an given array of elements and return it escaped
		 * To use with any assoc array
		 *
		 * @param $arrData
		 * @return array
		 */
		public function escape($arrData)
		{
			$output = array();

			foreach ($arrData as $key => $value)
			{
				$output[$key] = trim($this->database->real_escape_string($value));
			}

			return $output;
		}

		/**
		 * Method will query an SQL string and return the
		 * retrieved data as associate array
		 *
		 * @param $strSQL
		 * @return array
		 */
		public function selectArrayData($strSQL)
		{
			$result = $this->database->query($strSQL);
			$output = array();

			while ($row = $result->fetch_assoc())
			{
				array_push($output, $row);
			}

			return $output;
		}

		/**
		 * Return insert_id
		 *
		 * @return int
		 */
		public function insert_id()
		{
			return $this->database->insert_id;
		}

		/**
		 * Magic function to call any methods on the mysqli object
		 *
		 * @param $strName
		 * @param $arrArguments
		 * @return String
		 */
		public function __call($strName, $arrArguments)
		{
			return $this->database->$strName(implode(',', $arrArguments));
		}

	}