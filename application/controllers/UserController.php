<?php	
	/**
	 * User Class
	 *
	 * @category   Library
	 * @package    Index Package
	 * @author     Adam Boerema <adamboerema@gmail.com>
	 * @version    0.1
	 */

	 class UserController extends Controller {
			
		protected $userModel = null;
		
		/**
		 * Constructor Init function
		 *
		 * @access  public
		 * @return  boolean success
		 */
		 public function init(){
			$this->userModel = new User();
		 }
		
		
		/**
		 * Register Controller
		 * Get the post variables and register the user
		 *
		 * @access  public
		 * @return  boolean success
		 */
		 public function register(){
			var_dump($_POST);
			
		 }
		 
		 
	 }