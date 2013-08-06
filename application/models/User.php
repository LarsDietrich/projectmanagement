<?php

	/**
	 * User Model
	 *
	 * @category   Library
	 * @package    Index Package
	 * @author     Adam Boerema <adamboerema@gmail.com>
	 * @version    0.1
	 */

	 class User extends Model {
		
		/**
		 * Register Method
		 * Get the post variables and register the user
		 *
		 * @access  public
		 * @param 	array register values
		 * @return  boolean success
		 */
		 public function register($user){
		    //If not a duplicate email register the user
		    if(!$this->duplicateEmail($user['email'])){
		        $q = $this->db->prepare("INSERT INTO {$this->table} (first_name, last_name, email, password) 
                                                     VALUES(:first_name, :last_name, :email, :password)");
                $q->bindParam(':first_name', $user['first_name']);
                $q->bindParam(':last_name', $user['last_name']);
                $q->bindParam(':email', $user['email']);
                $q->bindParam(':password', $user['password']);
                $q->execute();
                
                return true;
		    } else {
		        $this->errors[] = 'This email is already in use';
                return false;
		    }
		 }
         
         /**
         * Duplicate Email check
         * Check database to make sure the email is unique
         *
         * @access  protected
         * @param   string email
         * @return  boolean success
         */
         protected function duplicateEmail($email){
             $q = $this->db->prepare("SELECT * FROM {$this->table} WHERE email = :email");
             $q->bindParam(':email', $email);
             $q->execute();
             
             $count = $q->rowCount();
             
             if($count > 0){
                 return true;
             } else {
                 return false;
             }
             
         }
		
	 }