<?php

	/**
	 * SQL class
	 * 
	 * Abstract sql used for connecting to database
	 * using PDO wrapper
	 *
	 * @category   Library
	 * @package    SQL Package
	 * @author     Adam Boerema <adamboerema@gmail.com>
	 * @version    0.1
	 */

	 
	 abstract class Sql{
	 	
		//database connection
		protected $db = null;
		
		//Error reporting
		protected $errors = array();
		
		/**
		 * Connect to PDO
		 *
		 * @access  public
		 * @param   $host = string host address
		 * @param   $user = string database username
		 * @param   $pass = string database password
		 * @param   $db = string database name
		 * @return  null
		 * 
		 */
		public function connect($host, $user, $pass, $db){
			try{
				$this->db = new PDO("mysql:host=$host;dbname=$db;",$user,$pass);
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
			}
			catch (PDOException $e) {
				$this->db = null;
				$this->errors[] = $e->getMessage();
			}
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

		
	 }