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
		    $user = array(
                'first_name'        => $_POST['first_name'],
                'last_name'         => $_POST['last_name'],
                'email'             => $_POST['email'],
                'password'          => $_POST['password'],
                'password_confirm'  => $_POST['password_confirm']
            );
            //If passwords match
			if($_POST['password'] == $_POST['password_confirm']){
			    if($this->userModel->register($user)){
			         echo 'woooot';   
			    } else {
			        echo 'no :(';
			    }
			}
		 }
		 
		 
	 }