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
	    	//Call init function
	    	$this->init();
			
	        $this->controller = $controller;
	        $this->action = $action;
	        $this->model = $model;
	        $this->$model = new $model;
	        $this->view = new View($controller,$action);
	    }
		
		
		/**
		 * Constructor Init function
		 * Called after constructor and before any other function is set
		 *
		 * @access  public
		 * @return  constructor class
		 */
		 public function init(){
			return $this;
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
