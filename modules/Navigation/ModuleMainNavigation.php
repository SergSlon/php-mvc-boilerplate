<?php

	/**
	 * Application Navigation
	 * Generate Main Applications Navigational Menu
	 *
	 * @author	Aiden Tailor <aidentailor@gmail.com>
	 * @copyright 2011 Aiden Tailor
	 */

	class ModuleMainNavigation extends Module
	{
		protected $model;
		protected $active_module;

		/**
		 * @param $model
		 * @param $active_module
		 */
		public function __construct($model, $active_module)
		{
			$this->model         = $model;
			$this->active_module = $active_module;
		}

		/**
		 * @return string
		 */
		public function run()
		{
			$view = new View();
			$view->setTemplate('tpl-navigation');
			$view->active_module = $this->active_module;
			$view->items         = $this->model->getNavigationItems();

			return $view->parse();
		}
	}