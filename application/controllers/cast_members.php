<?php
class Cast_members extends MY_Controller{
	function add($showID){
		if($this->is_logged_in() == TRUE){
			// If user is logged in, get showID from uri and load add cast member form
			if($showID == NULL){
				$showID = $this->uri->segment(3);
			}
			$this->load->model('display_handler');
			$data['show'] = $this->display_handler->get_show_by_ID($showID);
    		$this->load->view('forms/add_cast_member', $data);
    	}
    	else{
    		// If user is not logged in, show no access page
    		$this->load->view('general/no_access');
    	}
    	$this->load->view('includes/footer');
	}
	function edit(){
    	if($this->is_logged_in() == TRUE){
    		// If user is logged in, get cast memberID from URI or POST and load edit form.
    		$cast_memberID = $this->uri->segment(3);
    		if($cast_memberID == NULL){
    			$cast_memberID = $this->input->POST(ID);
    		}
    		$this->load->model('display_handler');
    		$data['cast_member'] = $this->display_handler->get_cast_member_by_ID($cast_memberID);
			$this->load->view('forms/edit_cast_member', $data);
   	    }
   	    else{
    		// If user is not logged in, show no access page
    		$this->load->view('general/no_access');
    	}
    	$this->load->view('includes/footer');
    }
    function confirm_delete(){
    	if($this->is_logged_in() == TRUE){
    		// If user is logged in, get cast member object and load delete form with object as parameteter.
    		$cast_memberID = $this->uri->segment(3);
    		$this->load->model('display_handler');
    		$data['cast_member'] = $this->display_handler->get_cast_member_by_ID($cast_memberID);
   	   		$this->load->view('forms/delete', $data);
   	    }
   	    else{
    		// If user is not logged in, show no access page
    		$this->load->view('general/no_access');
    	}
    	$this->load->view('includes/footer');
    }
	function save(){
		$this->load->library('form_validation');
		// Run cast member validation rules
		if($this->form_validation->run('cast_member') == FALSE){
			// If input is not valid, reload to display errormessages
			$this->cast_member($this->input->POST(SHOWID));
		}
		else{
			// If input is valid, create cast member object and try to save to database
			$this->load->model('show_handler');
			$params = array(
				ID => NULL,
				PERSONID => $this->input->POST(PERSONID),
				SHOWID => $this->input->POST(SHOWID),
				CHARACTER_NAME => $this->input->POST(CHARACTER_NAME),
				IMPORTANCE => $this->input->POST(IMPORTANCE)
			);
			$cast_member = new Cast_member($params);
			if($query = $this->show_handler->add_cast_member($cast_member)){
				// If saving is a success redirect to success-page and add successmessages
				$data['success_action'] = 'Cast member was successfully added.';
				$data['success_redirect_link'] = "shows/show/" . $this->input->POST(SHOWID);
				$data['success_redirect_text'] = 'Go to show.';
				$this->load->view('general/success', $data);
				$this->load->view('includes/footer');
			}
			else{
				// If saving was not a success, reload to display errormessages
				$this->add($this->input->POST(SHOWID));
			}
		}
	}
	function update(){
		$this->load->library('form_validation');
		if($this->form_validation->run('cast_member') == FALSE){
			// If input is not valid, reload to display errormessages
			$this->cast_member($this->input->POST(SHOWID));
		}
		else{
			// If input is valid, create cast member object and try to save to database
			$this->load->model('show_handler');
			$params = array(
				ID => $this->input->POST(ID),
				PERSONID => $this->input->POST(PERSONID),
				SHOWID => NULL,
				CHARACTER_NAME => $this->input->POST(CHARACTER_NAME),
				IMPORTANCE => $this->input->POST(IMPORTANCE)
			);
			$cast_member = new Cast_member($params);
			if($query = $this->show_handler->update_cast_member($cast_member)){
				// If saving is a success redirect to success-page and add successmessages
				$data['success_action'] = 'Cast member was successfully updated.';
				$data['success_redirect_link'] = "shows/show/" . $this->input->POST(SHOWID);
				$data['success_redirect_text'] = 'Go to show.';
				$this->load->view('general/success', $data);
				$this->load->view('includes/footer');
			}
			else{
				// If saving was not a success, reload showform
				$this->edit();
			}
		}
	}
	function delete(){
    	// Get cast member object and delete it
    	$cast_memberID = $this->input->POST(ID);
    	$this->load->model('display_handler');
    	$cast_member = $this->display_handler->get_cast_member_by_ID($cast_memberID);
    	$showID = $cast_member->get_showID();
    	$this->load->model('show_handler');
    	if($this->show_handler->delete_cast_member($cast_member)){
    	    // If deleting was successful, redirect to successpage 
    		$data['success_action'] = $cast_member->get_character_name() . ' was successfully deleted.';
			$data['success_redirect_link'] = "shows/show/$showID";
			$data['success_redirect_text'] = 'Go back to show.';
			$this->load->view('general/success', $data);
			$this->load->view('includes/footer');
    	}
    }
}

/* End of file cast_member.php */
/* Location: ./application/controllers/cast_members.php */