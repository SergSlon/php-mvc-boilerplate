<?php

	/**
	 * Model
	 * Interface to retrieve data
	 *
	 * @author	Aiden Tailor <aidentailor@gmail.com>
	 * @copyright 2011 Aiden Tailor
	 */

	class ApplicationModel extends Model
	{
		/**
		 * Hold database connection
		 *
		 * @var Database Hold database instance
		 */
		private $db;


		/* ------------------------------------------------------------------------ CONSTRUCTOR */
		/**
		 * Connect to database
		 */
		public function __construct()
		{
			// Uncomment to use config file database connection
			#$this->db = new Database();
		}


		/* ------------------------------------------------------------------------ BASIC STUFF */
		/**
		 * Return last insert id
		 *
		 * @return int
		 */
		public function getInsertId()
		{
			return $this->db->insert_id();
		}

		/* ------------------------------------------------------------------------ NAVIGATION */
		/**
		 * Get Modules
		 *
		 * @return
		 */
		public function getNavigationItems()
		{
			return $GLOBALS['CONFIG']['modules'];
		}
	}
