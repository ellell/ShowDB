<?php

class Login extends MY_Controller{
	private $isLoggedIn;
    function __construct(){
    	parent::__construct();
    }
    function index(){
    	if($this->is_logged_in() == FALSE){
    		// If user is nog logged in, show login form
    		$this->load->view('forms/login');
    	}
    	else{
    		// If user is logged in, show logout form
    		$this->load->view('forms/logout');
    	}
    	$this->load->view('includes/footer');
    }
    function login_validation(){
		$this->load->library('form_validation');
		// Run login validation rules
    	if($this->form_validation->run('login') == FALSE){
			// If input is not valid reload to display errormessages
			$this->index();
		}
		else{
			// If input is valid, do login
    		$this->load->model('login_handler');
			$username = $this->input->post(USERNAME);
			$password = $this->input->post(PASSWORD);
			$rememberMe = $this->input->post(REMEMBER_ME);
    		$login = $this->login_handler->do_login($username, $password);
    		if($login){
    			// If user checked 'remember me'-checkbox - set cookie
    			if($rememberMe == REMEMBER_ME){
    				// Set cookie
    				$this->set_login_cookie($username, $password);
    			}
       			//If login is valid -  go to firstpage   
    			redirect('/');
    		}
    		else{
    			// If login did not succeed - reload to display errormessages
    			$this->index();
    		}
		}	
    }
    function logout(){
    	// Logout, unset cookie and reload
    	$this->load->model('login_handler');
 		$login = $this->login_handler->do_logout();
 		$this->unset_login_cookie();
 		redirect('/');
    }
    function set_login_cookie($username, $password){
		$this->load->helper('cookie');
		$user_cookie = array(
			 'name'   => USERNAME,
             'value'  => $username,
             'expire' => time()+86500
		);
		$pass_cookie = array(
		     'name'   => IS_LOGGED_IN,
             'value'  => TRUE,
             'expire' => time()+86500
        );
        set_cookie($user_cookie);
        set_cookie($pass_cookie);
    }
    function unset_login_cookie(){
    	$this->load->helper('cookie');
    	delete_cookie(USERNAME);
    	delete_cookie(IS_LOGGED_IN);
    }
}
/* End of file login.php */
/* Location: ./application/controllers/login.php */