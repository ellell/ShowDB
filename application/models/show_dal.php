<?php
class Show_dal extends CI_Model{
	/*
	** Responsible for all database queries concerning Shows (including persons, cast and crew)
	*/
	private $show_table_name = "shows";
	private $person_table_name = "persons";
	private $cast_table_name = "cast";
	private $crew_table_name = "crew";
	public function add_show($show){
		$sql = "INSERT INTO $this->show_table_name (name, startyear, endyear, description) VALUES(?, ?, ?, ?)";
		$query = $this->db->query($sql, array($show->get_name(), $show->get_start_year(), $show->get_end_year(), $show->get_description()));
		return $query;
	}
	public function update_show($show){
		$sql = "UPDATE $this->show_table_name SET name=?, startyear=?, endyear=?, description=? WHERE id = ?";
		$query = $this->db->query($sql, array($show->get_name(), $show->get_start_year(), $show->get_end_year(), $show->get_description(), $show->get_ID()));
		return $query;
	}
	public function delete_show($show){
		$sql = "DELETE FROM $this->show_table_name WHERE name = ?";
		$query = $this->db->query($sql, array($show->get_name()));
		return $query;
	}	
	public function show_exists($show){
		// Returns true if show exists
		$name = $show->get_name();
		$sql = "SELECT * FROM $this->show_table_name WHERE name = ?";
		$query = $this->db->query($sql, array($show->get_name()));
		if($query->num_rows == 1){
			return TRUE;
		}
		else return FALSE;
	}
	public function get_show_by_ID($id){
		// Returns show if it exists
		$sql = "SELECT * FROM $this->show_table_name WHERE id = ?";
		$query = $this->db->query($sql, array($id));
		if ($query->num_rows() > 0){
 		  $row = $query->row(); 
 		  $params = array(
 		  	ID => $row->id,
 		  	NAME => $row->name,
 		  	START_YEAR => $row->startYear,
 		  	END_YEAR => $row->endYear,
 		  	DESCRIPTION => $row->description
 		  );
 		  $show = new Show($params);
 		  return $show;
		}
	}
	public function get_showID($name){
		// Return showID
		$sql = "SELECT * FROM $this->show_table_name WHERE name = ?";
		$query = $this->db->query($sql, array($name));
		if ($query->num_rows() > 0){
 		  $row = $query->row(); 
 		  $showID = $row->id;
 		  return $showID;
		}
	}
	public function get_all_shows(){
		// Get all shows from database
		$sql = "SELECT * FROM $this->show_table_name ORDER BY name";
		$query = $this->db->query($sql);
		$shows = array();
		// Foreach resultrow create new showobject and save to shows array
		foreach ($query->result_array() as $row)
		{
			$params = array(
				ID => $row['id'],
				NAME => $row['name'],
				START_YEAR => $row['startYear'],
				END_YEAR => $row['endYear'],
				DESCRIPTION => $row['description']
			);
			$show = new Show($params);
			$shows[] = $show;
		}
		return $shows;
	}
	public function get_five_shows(){
		// Get five random shows from database
		$sql = "SELECT * FROM $this->show_table_name ORDER BY rand() limit 5";
		$query = $this->db->query($sql);
		$shows = array();
		// Foreach resultrow create new showobject and save to shows array
		foreach ($query->result_array() as $row)
		{
			$params = array(
				ID => $row['id'],
				NAME => $row['name'],
				START_YEAR => $row['startYear'],
				END_YEAR => $row['endYear'],
				DESCRIPTION => $row['description']
			);
			$show = new Show($params);
			$shows[] = $show;
		}
		return $shows;
	}
	public function add_person($person){
		$firstname = $person->get_first_name();
		$lastname = $person->get_last_name();
		$description = $person->get_description();		
		$sql = "INSERT INTO $this->person_table_name(firstname, lastname, description) VALUES(?, ?, ?)";
		$query = $this->db->query($sql, array($firstname, $lastname, $description));
		return $query;
	}
	public function update_person($person){	
		$sql = "UPDATE $this->person_table_name SET firstname=?, lastname=?, description=? WHERE id=?";
		$query = $this->db->query($sql, array($person->get_first_name(), $person->get_last_name(), $person->get_description(), $person->get_ID()));
		return $query;
	}
	public function delete_person($person){
		$firstname = $person->get_first_name();
		$lastname = $person->get_last_name();
		$sql = "DELETE FROM $this->person_table_name WHERE (firstname = ? AND lastname = ?)";
		$query = $this->db->query($sql, array($firstname, $lastname));
		return $query;

	}	
	public function person_exists($person){
		// Returns true if person exists
		$firstname = $person->get_first_name();
		$lastname = $person->get_last_name();
		$sql = "SELECT * FROM $this->person_table_name WHERE (firstname = ? AND lastname = ?)";
		$query = $this->db->query($sql, array($firstname, $lastname));
		if($query->num_rows == 1){
			return TRUE;
		}
		else return FALSE;
	}
	public function get_person_by_ID($id){
		// Returns person if it exists
		$sql = "SELECT * FROM $this->person_table_name WHERE id = ?";
		$query = $this->db->query($sql, array($id));
		if ($query->num_rows() > 0){
 		  $row = $query->row(); 
 		  $params = array(
 		  	ID => $row->id,
 		  	FIRSTNAME => $row->firstname,
 		  	LASTNAME => $row->lastname,
 		  	DESCRIPTION => $row->description
 		  );
 		  $person = new Person($params);
 		  return $person;
		}
	}
	public function get_personID($firstname, $lastname){
		// Return personID
		$sql = "SELECT * FROM $this->person_table_name WHERE firstname = ? AND lastname = ?";
		$query = $this->db->query($sql, array($firstname, $lastname));
		if ($query->num_rows() > 0){
 		  $row = $query->row(); 
 		  $showID = $row->id;
 		  return $showID;
		}
	}
	public function get_all_persons(){
		// Get all persons from database
		$sql = "SELECT * FROM $this->person_table_name ORDER BY lastname";
		$query = $this->db->query($sql);
		$persons = array();
		// Foreach resultrow create new person object and save to persons array
		foreach ($query->result_array() as $row){
			$params = array(
				ID => $row['id'],
				FIRSTNAME => $row['firstname'],
				LASTNAME => $row['lastname'],
				DESCRIPTION => $row['description']
			);			
			$person = new Person($params);
			$persons[] = $person;
		}
		return $persons;
	}
	public function get_five_persons(){
		// Get five random persons from database
		$sql = "SELECT * FROM $this->person_table_name ORDER BY rand() limit 5";
		$query = $this->db->query($sql);
		$persons = array();
		// Foreach resultrow create new person object and save to persons array
		foreach ($query->result_array() as $row){
			$params = array(
				ID => $row['id'],
				FIRSTNAME => $row['firstname'],
				LASTNAME => $row['lastname'],
				DESCRIPTION => $row['description']
			);			
			$person = new Person($params);
			$persons[] = $person;
		}
		return $persons;
	}
	public function add_cast_member($cast_member){		
		$sql = "INSERT INTO $this->cast_table_name VALUES(NULL, ?, ?, ?, ?)";
		$query = $this->db->query($sql, array($cast_member->get_personID(), $cast_member->get_showID(), $cast_member->get_character_name(), $cast_member->get_importance()));
		return $query;
	}
	public function update_cast_member($cast_member){	
		$sql = "UPDATE $this->cast_table_name SET personID=?, characterName=?, importance=? WHERE id=?";
		$query = $this->db->query($sql, array($cast_member->get_personID(), $cast_member->get_character_name(), $cast_member->get_importance(), $cast_member->get_ID()));
		return $query;
	}
	public function delete_cast_member($cast_member){
		$personID = $cast_member->get_PERSONID();
		$showID = $cast_member->get_SHOWID();
		$character_name = $cast_member->get_character_name();
		$sql = "DELETE FROM $this->cast_table_name WHERE personID=? AND showID=? AND characterName=?";
		$query = $this->db->query($sql, array($personID, $showID, $character_name));
		return $query;

	}
	public function get_crew_by_showID($showID){
		// Returns all crew members for this show
		$sql = "SELECT * FROM crew WHERE showID = ?";
		$query = $this->db->query($sql, array($showID));
		$crew = array();
		foreach ($query->result_array() as $row){
			$params = array(
				ID => $row['id'],
				PERSONID => $row['personID'],
				SHOWID => $row['showID'],
				TYPE => $row['type']
			);		
			$crew_member = new Crew_member($params);
			$crew[] = $crew_member;
		}
		return $crew;
	}
	public function get_cast_by_showID($showID){
		// Returns all cast members for this show
		$sql = "SELECT * FROM cast WHERE showID = ? ORDER BY importance";
		$query = $this->db->query($sql, array($showID));
		$cast = array();
		foreach ($query->result_array() as $row){
			$params = array(
				ID => $row['id'],
				PERSONID => $row['personID'],
				SHOWID => $row['showID'],
				CHARACTER_NAME => $row['characterName'],
				IMPORTANCE => $row['importance']
			);	
			$cast_member = new Cast_member($params);
			$cast[] = $cast_member;
		}
		return $cast;
	}
	public function get_acting_jobs($personID){
		// Get shows that this person has acted in
		$sql = "SELECT * FROM cast WHERE personID = ?";
		$query = $this->db->query($sql, array($personID));
		$cast = array();
		foreach ($query->result_array() as $row){
			$params = array(
				ID => $row['id'],
				PERSONID => $row['personID'],
				SHOWID => $row['showID'],
				CHARACTER_NAME => $row['characterName'],
				IMPORTANCE => $row['importance'] 
			);
			$cast_member = new Cast_member($params);
			$cast[] = $cast_member;
		}
		return $cast;
	}
	public function get_crew_jobs($personID){
		// Get shows this person has worked on
		$sql = "SELECT * FROM crew WHERE personID = ?";
		$query = $this->db->query($sql, array($personID));
		$crew = array();
		foreach ($query->result_array() as $row)
		{
			$params = array(
				ID => $row['id'],
				PERSONID => $row['personID'],
				SHOWID => $row['showID'],
				TYPE => $row['type']
			);
			$crew_member = new Crew_member($params);
			$crew[] = $crew_member;
		}
		return $crew;
	}
	public function character_exists($cast_member){
		// Returns true if character exists
		$showID = $cast_member->get_showID();
		$character_name = $cast_member->get_character_name();
		$sql = "SELECT * FROM $this->cast_table_name WHERE (showID = ? AND characterName = ?)";
		$query = $this->db->query($sql, array($showID, $character_name));
		if($query->num_rows == 1){
			return TRUE;
		}
		else return FALSE;
	}
	public function get_cast_member_by_ID($id){
		// Returns cast member if it exists
		$sql = "SELECT * FROM $this->cast_table_name WHERE id = ?";
		$query = $this->db->query($sql, array($id));
		if ($query->num_rows() > 0){
 		  $row = $query->row(); 
 		  $params = array(
 		  	ID => $row->id,
 		  	PERSONID => $row->personID,
 		  	SHOWID => $row->showID,
 		  	CHARACTER_NAME => $row->characterName,
 		  	IMPORTANCE => $row->importance
 		  );
 		  $cast_member = new Cast_member($params);
 		  return $cast_member;
		}
	}
}
/* End of file show_dal.php */
/* Location: ./application/models/show_dal.php */