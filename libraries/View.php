<?php
	/**
	 * View
	 *
	 * @author	Aiden Tailor <aidentailor@gmail.com>
	 * @copyright 2011 Aiden Tailor
	 */
	class View extends System
	{
		/**
		 * @var String Name of the template file
		 */
		private $template;

		/**
		 * @var array Template data
		 */
		private $data;

		public function __construct()
		{
			$this->data = array();
		}

		/**
		 * @param $strKey
		 * @param $dynValue
		 */
		public function __set($strKey, $dynValue)
		{
			$this->data[$strKey] = $dynValue;
		}

		/**
		 * @param $strKey
		 * @return null
		 */
		public function __get($strKey)
		{
			if (array_key_exists($strKey, $this->data))
			{
				return $this->data[$strKey];
			}
			else
			{
				return null;
			}
		}

		/**
		 * @param $strTemplate
		 */
		public function setTemplate($strTemplate)
		{
			$this->template = $strTemplate;
		}

		/**
		 * @return string
		 */
		public function parse()
		{
			$arrModulesFolders = scan('modules/');

			foreach ($arrModulesFolders as $strFolder)
			{
				if (substr($strFolder, 0, 1) == '.')
				{
					continue;
				}

				$file = 'modules/' . $strFolder . '/templates/' . $this->template . '.php';

				if (file_exists($file))
				{
					// init output buffer
					ob_start();

					// put template into output buffer
					include $file;

					// get contents
					$output = ob_get_contents();

					// clode and clean buffer
					ob_end_clean();

					return $output;
				}
			}

		}

	} // end of class