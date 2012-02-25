<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Person{
	
	private $id;
	private $first_name;
	private $last_name;
	private $description;
		
	public function Person($params){
		$this->id = $params[ID];
		$this->first_name = $params[FIRSTNAME];
		$this->last_name = $params[LASTNAME];
		$this->description = $params[DESCRIPTION];
	}
	
	public function get_ID(){
		return $this->id;
	}
	public function get_first_name(){
		return $this->first_name;
	}
	public function get_last_name(){
		return $this->last_name;
	}
	public function get_description(){
		return $this->description;
	}
}
/* End of file person.php */
/* Location: ./application/libraries/person.php */