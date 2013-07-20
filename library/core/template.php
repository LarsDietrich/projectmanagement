<?php
	/**
	 * Template class
	 * 
	 * Class used for loading views
	 *
	 * @category   Library
	 * @package    Template Package
	 * @author     Adam Boerema <adamboerema@gmail.com>
	 * @version    0.1
	 */

	 class Template {
     
	    protected $variables = array();
	    protected $controller;
	    protected $action;
	     
		/**
		 * Class constructor
		 *
		 * @access  public
		 * @return  null
		 */
	    function __construct($controller,$action) {
	        $this->controller = $controller;
	        $this->action = $action;
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
	        $this->variables[$name] = $value;
	    }
	 
	    /**
		 * Method render
		 * Routes the view with the needed template files
		 *
		 * @access  public
		 * @return  null
		 */
	    function render() {
	        extract($this->variables);
	         	
				//Include header file
	            if (file_exists(ROOT."/application/views/{$this->controller}/header.php")) {
	                include (ROOT."/application/views/{$this->controller}/header.php");
	            } else {
	                include (ROOT."/application/views/header.php");
	            }
	 			
				//Include content view
	        	include (ROOT."/application/views/{$this->controller}/{$this->action}.php");
				       
	            //Include footer 
	            if (file_exists(ROOT."/application/views/{$this->controller}/footer.php")) {
	                include (ROOT."/application/views/{$this->controller}/footer.php");
	            } else {
	                include (ROOT."/application/views/footer.php");
	            }
	    }
	 
	}
	 	