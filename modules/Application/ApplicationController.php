<?php

	/**
	 * AppController
	 * Main App Controller handling main navigation
	 * module selection and index view generation
	 *
	 * @author	Aiden Tailor <aidentailor@gmail.com>
	 * @copyright 2011 Aiden Tailor
	 */

	class ApplicationController extends Controller
	{
		protected $model;
		protected $view;
		protected $request;

		/**
		 * @param $model
		 * @param $view
		 * @param $request
		 */
		public function __construct($model, $view, $request)
		{
			$this->model   = $model;
			$this->view    = $view;
			$this->request = $request;
		}

		/**
		 * @return mixed
		 */
		public function run()
		{
			// Set index template to main View
			$this->view->setTemplate('tpl-index');

			// Content (Module Switch) and startup module
			$module = (isset($this->request['module'])) ? $this->request['module'] : $GLOBALS['CONFIG']['startup_module'];

			switch ($module)
			{
				case 'example-module':
					$module                     = new ExampleModule($this->model, $this->request);
					$this->view->module_content = $module->run();
					break;

				default:
					$this->view->module_content = '<p class="error">404 - Requested Module <b>' . $module . '</b> could not be found</p>';
					break;
			}

			// Create Navigation
			$navigation             = new ModuleMainNavigation($this->model, $module);
			$this->view->navigation = $navigation->run();

			// Return complete hypertext
			return $this->view->parse();
		}
	}
