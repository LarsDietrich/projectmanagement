<?php
	/**
	 * CORE BOOTSTRAP LOAD
	 * 
	 */
	session_start();
	require_once(ROOT.'/config/config.php');
	require_once(ROOT.'/library/core/router.php');

	
	/**
	 * 
	 * LIBRARY BOOTSTRAP LOAD
	 * 
	 * Include all additional libraries
	 * @TODO create loader class 3rd party libraries
	 * 
	 */