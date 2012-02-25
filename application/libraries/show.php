<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Show{
	
	private $id;
	private $name;
	private $start_year;
	private $end_year;
	private $description;
	
	public function Show($params){
		$this->id = $params[ID];
		$this->name = $params[NAME];
		$this->start_year = $params[START_YEAR];
		$this->end_year = $params[END_YEAR];
		$this->description = $params[DESCRIPTION];
	}
	
	public function get_ID(){
		return $this->id;
	}
	public function get_name(){
		return $this->name;
	}
	public function get_start_year(){
		return $this->start_year;
	}
	public function get_end_year(){
		return $this->end_year;
	}
	public function get_description(){
		return $this->description;
	}
}
/* End of file show.php */
/* Location: ./application/libraries/show.php */