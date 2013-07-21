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
		
 		/**
		 * Class constructor
		 *
		 * @access  public
		 * @return  null
		 */
	    function __construct() {
	 
	        $this->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	        $this->model = get_class($this);
	        $this->table = strtolower($this->model)."s";
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