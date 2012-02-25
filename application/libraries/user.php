<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User{
	
	private $id;
	private $username;
	private $first_name;
	private $last_name;
	private $password;
	private $email;
	
	public function User($params){
		$this->id = $params[ID];
		$this->username = $params[USERNAME];
		$this->first_name = $params[FIRSTNAME];
		$this->last_name = $params[LASTNAME];
		$this->password = $params[PASSWORD];
		$this->email = $params[EMAIL];
	}
	
	public function get_ID(){
		return $this->id;
	}
	public function get_username(){
		return $this->username;
	}
	public function get_first_name(){
		return $this->first_name;
	}
	public function get_last_name(){
		return $this->last_name;
	}
	public function get_password(){
		return $this->password;
	}
	public function get_email(){
		return $this->email;
	}
}
/* End of file user.php */
/* Location: ./application/libraries/user.php */