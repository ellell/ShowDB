<?php
class Persons extends MY_Controller{
	function show(){
		// If ID is set, show single person
		if(($this->uri->segment(3))){
			// If user is logged in, add admin panel
    		$data['edit_type'] = $this->uri->segment(1);
    		$data['editID'] = $this->uri->segment(3);
    		$this->load->view('general/admin_panel', $data);
			// Get personID from URI
	   	    $personID = $this->uri->segment(3);
	    	$this->load->model('display_handler');
	    	// Get person and shows from database 
	    	$data['person'] = $this->display_handler->get_person_by_ID($personID);
	   		$data['cast'] = $this->display_handler->get_acting_jobs($personID);
	   		// Load view with data as parameter
	   		$this->load->view('display/single_person', $data);
		}
		// Else show all persons
		else{
			// Get all persons and load array of person-objects into view
	    	$this->load->model('display_handler');
	    	$persons = $this->display_handler->get_all_persons();
	    	$data['persons'] = $persons;
			$this->load->view('display/persons', $data);
		}
		$this->load->view('includes/footer');
    }
	function add(){
    	if($this->is_logged_in() == TRUE){
    		// If user is logged in, show add person form
    		$this->load->view('forms/add_person');
    	}
    	else{
    		// If user is not logged in, show no access page
    		$this->load->view('general/no_access');
    	}
    	$this->load->view('includes/footer');
	}
	function confirm_delete(){
    	if($this->is_logged_in() == TRUE){
    		// If user is logged in, get person object and load delete form with object as parameteter
    		$personID = $this->uri->segment(3);
    		$this->load->model('display_handler');
    		$data['person'] = $this->display_handler->get_person_by_ID($personID);
   	   		$this->load->view('forms/delete', $data);
   	    }
   	    else{
    		// If user is not logged in, show no access page
    		$this->load->view('general/no_access');
    	}
    	$this->load->view('includes/footer');
    }
    function edit(){
    	if($this->is_logged_in() == TRUE){
    		// If user is logged in, get personID from URI or POST and load edit form.
    		$personID = $this->uri->segment(3);
    		if($personID == NULL){
    			$personID = $this->input->POST(ID);
    		}
    		$this->load->model('display_handler');
    		$data['person'] = $this->display_handler->get_person_by_ID($personID);
   	   		$this->load->view('forms/edit_person', $data);
   	    }
   	    else{
    		// If user is not logged in, show no access page
    		$this->load->view('general/no_access');
    	}
    	$this->load->view('includes/footer');
    }
	function save(){
		$this->load->library('form_validation');
		// Run person validation rules
		if($this->form_validation->run('person') == FALSE){
			// If input is not valid, reload to display errormessages
			$this->add();
		}
		else{
			// If input is valid, create person object and try to save it to database
			$this->load->model('show_handler');
			$params = array(
				ID => NULL,
				FIRSTNAME => $this->input->POST(FIRSTNAME),
				LASTNAME => $this->input->POST(LASTNAME),
				DESCRIPTION => $this->input->POST(DESCRIPTION)
			);
			$person = new Person($params);
			if($query = $this->show_handler->add_person($person)){
				// If saving is a success redirect to success-page and add successmessages
				$this->load->model('show_dal');
				$personID = $this->show_dal->get_personID($person->get_first_name(), $person->get_last_name());
				$data['success_action'] = $person->get_first_name() . ' ' . $person->get_last_name() . ' was successfully added to database.';
				$data['success_redirect_link'] = "persons/show/$personID";
				$data['success_redirect_text'] = 'Go to person.';
				$this->load->view('general/success', $data);
				$this->load->view('includes/footer');
			}
			else{
				// If saving was not a success, reload to display errormessages
				$this->add();
			}
		}
	}
	function update(){
    	$this->load->library('form_validation');
		// Run person validation form
		if($this->form_validation->run('person') == FALSE){
			// If input is not valid, reload to display errormessages
			$this->person();
		}
		else{
			// If input is valid, create person object and try to save to database
			$this->load->model('show_handler');
			$params = array(
				ID => $this->input->POST(ID),
				FIRSTNAME => $this->input->POST(FIRSTNAME),
				LASTNAME => $this->input->POST(LASTNAME),
				DESCRIPTION => $this->input->POST(DESCRIPTION)
			);
			$person = new Person($params);
			if($query = $this->show_handler->update_person($person)){
				// If saving is a success redirect to success-page and add successmessages
				$this->load->model('show_dal');
				$personID = $this->show_dal->get_personID($person->get_first_name(), $person->get_last_name());
				$data['success_action'] = $person->get_first_name() . ' ' . $person->get_last_name() . ' was successfully updated.';
				$data['success_redirect_link'] = "/persons/show/$personID";
				$data['success_redirect_text'] = 'Go to person.';
				$this->load->view('general/success', $data);
				$this->load->view('includes/footer');
			}
			else{
				// If saving was not a success, reload to display errormessages
				$this->edit();
			}
		}
    }
    function delete(){
    	// Get person object and delete it
		$personID = $this->input->POST(ID);
    	$this->load->model('display_handler');
    	$person = $this->display_handler->get_person_by_ID($personID);
    	$this->load->model('show_handler');
    	if($this->show_handler->delete_person($person)){
    		// If deleting was successful, redirect to successpage 
    		$data['success_action'] = $person->get_first_name() . ' ' . $person->get_last_name() . ' was successfully deleted.';
			$data['success_redirect_link'] = "/";
			$data['success_redirect_text'] = 'Go to first page.';
			$this->load->view('general/success', $data);
			$this->load->view('includes/footer');
    	}
    	else{
    		// If deleting was not successful, reload
    		$this->person();
    	}
    }
}

/* End of file person.php */
/* Location: ./application/controllers/person.php */