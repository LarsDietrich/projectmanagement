<?php

    /**
     * Authenticate class
     * 
     * Base authentication class
     *
     * @category   Library
     * @package    Authenticate Package
     * @author     Adam Boerema <adamboerema@gmail.com>
     * @version    0.1
     */

     
     class Authenticate extends Sql{
         private $salt = null;
         
         /**
         * Class constructor
         *
         * @access  public
         * @return  null
         */
        function __construct() {
            $this->connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        }
        
         
         
         
     }



