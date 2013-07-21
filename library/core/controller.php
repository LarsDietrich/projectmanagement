<?php

	/**
	 * Controller class
	 * 
	 * Base controller class
	 *
	 * @category   Library
	 * @package    Controller Package
	 * @author     Adam Boerema <adamboerema@gmail.com>
	 * @version    0.1
	 */

	class Controller {
	     
	    protected $controller;
		protected $model;
	    protected $action;
	    protected $view;
	 	
		
		/**
		 * Class constructor
		 *
		 * @access  public
		 * @return  null
		 */
	    public function __construct($controller, $model, $action) {
	        $this->controller = $controller;
	        $this->action = $action;
	        $this->model = $model;
	        $this->$model = new $model;
	        $this->view = new View($controller,$action);
	    }

		/**
		 * Class destructor
		 *
		 * @access  public
		 * @return  null
		 */
	    public function __destruct() {
	        $this->view->render();
	    }
	}
