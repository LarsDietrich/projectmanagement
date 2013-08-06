<?php

	/**
	 * Model class
	 * 
	 * Base model class
	 *
	 * @category   Library
	 * @package    Model Package
	 * @author     Adam Boerema <adamboerema@gmail.com>
	 * @version    0.1
	 */

	 
	 class Model extends Sql{
	 		
	 	protected $model;
		protected $table;
		      
        //Error reporting
        protected $errors = array();
        
 		/**
		 * Class constructor
		 *
		 * @access  public
		 * @return  null
		 */
	    function __construct() {
	 
	        $this->connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	        $this->model = get_class($this);
	        $this->table = strtolower($this->model)."s";
	    }
        
        /**
         * Get errors
         *
         * @access  public
         * @return  string errors
         * 
         */
        public function errors(){
            foreach($this->errors as $error){
                echo $error;            
            }
        }

		/**
		 * Class destructor
		 *
		 * @access  public
		 * @param   array/string
		 * @return  null
		 */
	    function __destruct() {
	    }

	 }	