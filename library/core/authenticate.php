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
         public function __construct() {
            $this->connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
         }
        
        
         /**
         * Login Method
         *
         * @param   string $username
         * @param   string $password
         * @access  public
         * @return  boolean
         */
         public function login($email, $password) {
            if ($q = $this->db->prepare("SELECT * FROM members WHERE email = :email LIMIT 1")) { 
              $q->bind_param(':email', $email);
              $q->execute(); 
              $results = $q->fetchAll(PDO::FETCH_OBJ);
              $password = $this->createHash($results->password, $results->$hash);
         
              if($q->num_rows == 1) {
                 if($this->bruteForce($results->email) == true) { 
                    return false;
                 } else {
                     if($results->password == $password) {
                        //password successful write create session
                        return true;    
                     } else {
                         //Failed login attempt
                        $this->loginAttempt($results->email);
                        return false;
                     }
                 }
              } else {
                 // No user exists. 
                 return false;
              }
            }
         } 

        /**
        * Hash Method
         *
         * @param   string $password
         * @param   string $hash
         * @access  public
         * @return  salted hash
         */
          private function createHash($password, $hash){
             $password = hash('sha512', $password.$salt);
             return $password;
          }
          
        /**
         * Brute Force Check Method
         *
         * @param   string $user
         * @access  public
         * @return  password
         */
          private function bruteForce($user){
             // Get timestamp of current time
              $now = time();
               // All login attempts are counted from the past 2 hours. 
              $validAttempts = $now - (2 * 60 * 60); 
             
              if ($q = $mysqli->prepare("SELECT time FROM login_attempts WHERE id = :user AND time > '$validAttempts'")) { 
                 $q->bind_param(':user', $user); 
                  // Execute the prepared query.
                 $q->execute();
                  // If there has been more than 5 failed logins
                 if($q->num_rows > 5) {
                    return true;
                 } else {
                    return false;
                 }
              }
          }
          
          
        /**
         * Login Attempt Method
         *
         * @param   string $user
         * @access  public
         * @return  void
         */
          private function loginAttempt($user){
             $now = time();
             $this->db->query("INSERT INTO login_attempts (user_id, time) VALUES ('$user_id', '$now')");
          }
          

         
    }



