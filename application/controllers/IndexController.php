<?php	
	/**
	 * Index Class
	 *
	 * @category   Library
	 * @package    Index Package
	 * @author     Adam Boerema <adamboerema@gmail.com>
	 * @version    0.1
	 */

	 class IndexController extends Controller {

		public function index(){
	 		$user = new User();
			$this->view->test = 'Im putting this here as a test';

		}		
	 }