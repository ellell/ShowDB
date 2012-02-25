<?php
class Show_handler extends CI_Model{
	public function add_show($show){
		$this->load->model('show_dal');	
		// Check if show exists
		if($this->show_dal->show_exists($show) == FALSE){
			// Return true if show was added successfully
			if($this->show_dal->add_show($show) == TRUE){
				return TRUE;
			}
			else {
				// Log unexpected db-error and add feedback 
				logger::log_error('An unexpected error occurred when trying to save show to database.');
				feedback::add_feedback(feedback::UNEXP_ERROR);
				return FALSE;
			}
		}
		// Add errormessage and return false
		else {
			feedback::add_feedback(feedback::SHOW_EXISTS);
			return FALSE;
		}
	}
	public function update_show($show){
		$this->load->model('show_dal');	
		// Return true if show was updated successfully
		if($this->show_dal->update_show($show) == TRUE){
			return TRUE;
		}
		else {
			// Log unexpected db-error and add feedback
			logger::log_error('An unexpected error occurred when trying to update show in db.');
			feedback::add_feedback(feedback::UNEXP_ERROR);
			return FALSE;
		}
	}
	public function delete_show($name){
		$this->load->model('show_dal');
		if($this->show_dal->delete_show($name)){
			return TRUE;
		}
		else {
			// Log unexpected db-error and add feedback
			logger::log_error('An unexpected error occurred when trying to delete show from db.');
			feedback::add_feedback(feedback::UNEXP_ERROR);
			return FALSE;
		}
	}
	public function add_person($person){
		$this->load->model('show_dal');	
		// Check if person exists
		if($this->show_dal->person_exists($person) == FALSE){
			// Return true if person was added successfully
			if($this->show_dal->add_person($person) == TRUE){
				return TRUE;
			}
			else {
				// Log unexpected db-error and add feedback
				logger::log_error('An unexpected error occurred when trying to save person to db.');
				feedback::add_feedback(feedback::UNEXP_ERROR);
				return FALSE;
			}
		}
		// Add errormessage and return false
		else {
			feedback::add_feedback(feedback::PERSON_EXISTS);
			return FALSE;
		}
	}
	public function delete_person($person){
		$this->load->model('show_dal');
		if($this->show_dal->delete_person($person)){
			return TRUE;
		}
		else {
			// Log unexpected db-error and add feedback
			logger::log_error('An unexpected error occurred when trying to delete person from db.');
			feedback::add_feedback(feedback::UNEXP_ERROR);
			return FALSE;
		}
	}
	public function update_person($person){
		$this->load->model('show_dal');	
		// Return true if person was updated successfully
		if($this->show_dal->update_person($person) == TRUE){
			return TRUE;
		}
		else {
			// Log unexpected db-error and add feedback
			logger::log_error('An unexpected error occurred when trying to update person in db.');
			feedback::add_feedback(feedback::UNEXP_ERROR);
			return FALSE;
		}
	}
	public function add_cast_member($cast_member){
		$this->load->model('show_dal');	
		// Check if character exists
		if($this->show_dal->character_exists($cast_member) == FALSE){
			if($this->show_dal->add_cast_member($cast_member) == TRUE){
				return TRUE;
			}
			else {
				// Log unexpected db-error and add feedback
				logger::log_error('An unexpected error occurred when trying to save castmember to db.');
				feedback::add_feedback(feedback::UNEXP_ERROR);
				return FALSE;
			}
		}
		// Add errormessage and return false
		else {
			feedback::add_feedback(feedback::CHARACTER_EXISTS);
			return FALSE;
		}
	}
	public function update_cast_member($cast_member){
		$this->load->model('show_dal');	
		// Return true if person was updated successfully
		if($this->show_dal->update_cast_member($cast_member) == TRUE){
			return TRUE;
		}
		else {
			// Log unexpected db-error and add feedback
			logger::log_error('An unexpected error occurred when trying to update cast member in db.');
			feedback::add_feedback(feedback::UNEXP_ERROR);
			return FALSE;
		}
	}
	public function delete_cast_member($cast_member){
		$this->load->model('show_dal');
		if($this->show_dal->delete_cast_member($cast_member)){
			return TRUE;
		}
		else {
			// Log unexpected db-error and add feedback
			logger::log_error('An unexpected error occurred when trying to delete cast member from db.');
			feedback::add_feedback(feedback::UNEXP_ERROR);
			return FALSE;
		}
	}
}
/* End of file show_handler.php */
/* Location: ./application/models/show_handler.php */