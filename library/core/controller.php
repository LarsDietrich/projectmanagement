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
	    protected $template;
	 	
		
		/**
		 * Class constructor
		 *
		 * @access  public
		 * @return  null
		 */
	    function __construct($controller, $model, $action) {
	    	
			var_dump($controller, $model, $action);

	        $this->controller = $controller;
	        $this->action = $action;
	        $this->model = $model;
	 
	        $this->$model = new $model;
	        $this->template = new Template($controller,$action);
	 
	    }
		
	 	/**
		 * Method set
		 * Passes variables to the template view
		 *
		 * @access  public
		 * @param   string value name
		 * @param	string value
		 * @return  null
		 */
	    function set($name,$value) {
	        $this->template->set($name,$value);
	    }
	 	
		/**
		 * Class destructor
		 *
		 * @access  public
		 * @return  null
		 */
	    function __destruct() {
	        $this->template->render();
	    }
	}
