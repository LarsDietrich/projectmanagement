<?php

	/**
	 * Controller class
	 * 
	 * Base controller class
	 *
	 * @category   Library
	 * @package    Controller Package
	 * @author     Adam Boerema <adamboerema@gmail.com>
	 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
	 * @version    0.1
	 */
	 
	 
	class Controller {
	     
	    protected $controller;
		protected $model;
	    protected $action;
	    protected $template;
	 
	    function __construct($controller, $model, $action) {
	         
	        $this->controller = $controller;
	        $this->action = $action;
	        $this->model = $model;
	 
	        $this->$model = new $model;
	        $this->template = new Template($controller,$action);
	 
	    }
	 
	    function set($name,$value) {
	        $this->template->set($name,$value);
	    }
	 
	    function __destruct() {
	        $this->template->render();
	    }
	         
	}