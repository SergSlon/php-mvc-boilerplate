<?php

	class ExampleModule extends Module
	{
		protected $model;
		protected $view;
		protected $request;

		public function __construct($model, $request)
		{
			$this->model   = $model;
			$this->view    = new View();
			$this->request = $request;
		}

		public function run()
		{
			// Switch module action
			$action = (isset($this->request['action'])) ? $this->request['action'] : 'standard-action';

			switch ($action)
			{
				case 'standard-action':
					$this->view->setTemplate('tpl-example');
					break;

				default:
					return '<p class="error">404 - Requested Action <b>' . $action . '</b> could not be found</p>';
					break;
			}

			// Return complete hypertext
			return $this->view->parse();
		}
	}
