<?php
	
	/**
	 * Router class
	 * 
	 * Router class is used to create pathing and parameters
	 * based on url structure
	 *
	 * @category   Library
	 * @package    Router Package
	 * @author     Adam Boerema <adamboerema@gmail.com>
	 * @version    0.1
	 */
	
	class Router{
		
		 //Url to be broken to segments
		public $url = null;
		
		
		/**
		 * Class constructor method sets base url
		 *
		 * @access  public
		 * @param   array/string
		 * @return  null
		 */
		public function __construct($url){
			$this->url = $url;
		}
		
		/**
		 * PHP auto function to load necessary files
		 *
		 * @access  public
		 * @param   string
		 * @return  null
		 * 
		 * @TODO ADD CONFIG CHECKS FOR DIRECTORY PATHS
		 * @TODO ADD ERROR LOG AND REDIRECT
		 * 
		 */
		public function autoload($className) {
			//Lowercase the class name
			$className = strtolower($className);
			
			//Framework Core Files
 		    if (file_exists(ROOT."/library/core/{$className}.php")) {
		        require_once(ROOT."/library/core/{$className}.php");
		    } 
		    //Controllers
		    if (file_exists(ROOT."/application/controllers/{$className}.php")) {
		        require_once(ROOT."/application/controllers/{$className}.php");
		    } 
		    //Models
		    else if (file_exists(ROOT."/application/models/{$className}.php")) {
		        require_once(ROOT."/application/models/{$className}.php");
		    } 
		    //Class not found. Error report
		    else {
		    	//echo "{$className} not found!";
		        /* Error Generation Code Here */
		    }
		}
		
		/**
		 * @access  public
		 * @param 	$uri = Contains the ending uri of the url
		 * @return 	array
		 * 
		 * Parses out the uri and stores routing for later use
		 * 
		 * @TODO ADD ERROR ROUTING FOR FAILED ROUTING ACTION
		 * 
		 */
		public function parseURI($uri){
			$uri = parse_url($uri);
			$pieces = explode('/', strstr($uri['path'], '/'));
			
			//first piece always empty from first slash
			array_shift($pieces);
			
			$routing = array(
				'controller' => $pieces[0],
				'action' => $pieces[1],
				'value' => $pieces[2]
			);
			
			return $routing;
		}
		
		/**
		 * @access public
		 * @return segment array
		 * Begin the url structure splitting
		 * 
		 */
		 public function route(){
		 	$route = $this->parseURI($this->url);
		 	
		 	$controller = $route['controller'];
			$action = $route['action'];
			$value = $route['value'];
			
			//Default index if no action or controller is set
			($controller)? $controller : $controller = 'Index';
			($action)? $action : $action = 'index';
			
			//Format the controller name to fit naming convention
			$controllerName = $controller;
		    $controller = ucwords($controller);
		    $model = rtrim($controller, 's');
		    $controller .= 'Controller';
			
			//Create call to the base controller
		    $dispatch = new $controller($controllerName, $model, $action);
			
			//Attempt to call the class/action
			if (method_exists($controller, $action)) {
		        call_user_func_array(array($dispatch,$action), array($value));
		    } else {
		        /* Error Generation Code Here */
		    }
		 }
	}


	/**
	 * INIT ROUTER
	 *
	 */
	$segment = new Router($_SERVER['REQUEST_URI']);
	spl_autoload_register(array($segment, 'autoload'));
	$url = $segment->route();