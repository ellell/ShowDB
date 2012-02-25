<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cast_member{
	private $id;
	private $personID;
	private $showID;
	private $character_name;
	private $importance;
		
	public function Cast_member($params){
		$this->id = $params[ID];
		$this->personID = $params[PERSONID];
		$this->showID = $params[SHOWID];
		$this->character_name = $params[CHARACTER_NAME];
		$this->importance = $params[IMPORTANCE];
	}
	
	public function get_ID(){
		return $this->id;
	}
	public function get_personID(){
		return $this->personID;
	}
	public function get_showID(){
		return $this->showID;
	}
	public function get_character_name(){
		return $this->character_name;
	}
	public function get_importance(){
		return $this->importance;
	}
}
/* End of file cast_member.php */
/* Location: ./application/libraries/cast_member.php */