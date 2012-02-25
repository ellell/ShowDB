<?php
class Registration extends MY_Controller{
    function __construct(){
    	parent::__construct();
    }
    function index(){
    	// If user is not logged in, show registration form, else redirect to first page
   		if($this->is_logged_in() != TRUE){
    		$this->load->view('forms/registration');
    		$this->load->view('includes/footer');
    	}
    	else{
    		redirect('/');
    	}
    }
	function register_validation(){
		$this->load->library('form_validation');
		// Run registration validation rules
		if($this->form_validation->run('registration') == FALSE){
			// If input is not valid, reload registration page to display errormessages
			$this->index();
		}
		else{
			// If input is valid, create userobject and try to register
			$params = array(
				'id' => NULL, 
				'username' => $this->input->post(USERNAME),
				'firstname' => $this->input->post(FIRSTNAME),
				'lastname' => $this->input->post(LASTNAME),
				'password' => $this->input->post(PASSWORD),
				'email' => $this->input->post(EMAIL)
				);
			$user = new User($params);
			$this->load->model('registration_handler');
			if($query = $this->registration_handler->do_registration($user)){
				// If registration is a success redirect to success-page 
				$data['success_action'] = 'Your account is now registered.';
				$data['success_redirect_link'] = '/login';
				$data['success_redirect_text'] = 'Click here to log in.';
				$this->load->view('general/success', $data);
				$this->load->view('includes/footer');
				
			}
			else{
				// If registration was not a success, reload page to display errormessages
				$this->index();
			}
		}
	}
}
/* End of file registration.php */
/* Location: ./application/controllers/registration.php */