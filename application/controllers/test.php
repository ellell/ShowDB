<?php
class Test extends MY_Controller{
	/*
	**	This is for testing purposes only!
	*/
    function __construct(){
    	parent::__construct();
    }
    function index(){
		$test = $this->test_login();
		$test .= $this->test_registration();
		$test .= $this->test_show_handling();
    	$data['main_content'] = 'empty';
    	$data['empty_header'] = 'test result';
    	$data['empty_content'] = $test;
    	$this->load->view('general/empty', $data);
    	$this->load->view('display/test_errors');
    	$this->load->view('includes/footer');
    }
    function test_login(){
    	// 1st test - do logout
    	$this->load->model('login_handler');
    	$this->login_handler->do_logout();
    	if($this->is_logged_in() == TRUE){
    		return "1st logintest failed";
    	}
    	// 2nd test - fail to login
    	$this->login_handler->do_login('wrongname', 'wrongpass');
    	if($this->is_logged_in() == TRUE){
    		return "2nd logintest failed";
    	}
    	// 3d test - successful login
    	if($this->login_handler->do_login('testuser', 'testpass') == FALSE){
    		return "3d logintest failed";
    	}
    	// 4th test - user should be logged in
    	if($this->is_logged_in() == FALSE){
    		return "4th logintest failed";
    	}
    	// 5th test - log out
    	$this->login_handler->do_logout();
    	if($this->is_logged_in() == TRUE){
    		return "5th logintest failed";
    	}
    	return "<p>logintest successful!</p>";
    }
    function test_registration(){ 
    	$this->load->model('registration_handler');	
    	$params = array(
			'id' => NULL, 
			'username' => 'julle87',
			'firstname' => 'julia',
			'lastname' => 'svensson',
			'password' => 'losen',
			'email' => 'juliasv@email.se'
		);
    	$user = new User($params);
    	// 1st test - successful registration
	  	if($this->registration_handler->do_registration($user) == FALSE){
	  		return "1st registrationtest failed";
	  	}
	  	// 2nd test - user should exist
    	if($this->user_dal->username_exists($user) == FALSE){
    		return "2nd registrationtest failed";
    	}
    	// 3d test - try register with already existing username
    	if($this->registration_handler->do_registration($user) == TRUE){
	  		return "Third registrationtest failed";
	    }
	    // 4th test - deleting user
	    if($this->registration_handler->delete_user($user->get_username()) == FALSE){
	  		return "4th registrationtest failed";
	  	}
	  	// 5th test -  user should be deleted
	  	if($this->user_dal->username_exists($user)){
	  		return "5th registrationtest failed";
	  	}
	  	return "<p>registrationtest successful!</p>";
    }
    function test_show_handling(){
    	$this->load->model('show_handler');
    	$this->load->model('show_dal');
    	$params = array(
    		ID => NULL,
    		NAME => 'testshow',
    		START_YEAR => '2009',
    		END_YEAR => '2011',
    		DESCRIPTION => 'en bra show'
    	);
		$show = new Show($params);
    	// 1st test - add show
    	if($this->show_handler->add_show($show) == FALSE){
    		return "1st showhandlingtest failed";
    	}
    	// 2nd test - show should exist
    	if($this->show_dal->show_exists($show) == FALSE){
    		return "2nd showhandlingtest failed";
    	}
       	// 3d test - delete show
    	if($this->show_handler->delete_show($show) == FALSE){
    		return "3d showhandlingtest failed";
    	} 	
    	// 4th test - show should be deleted
    	if($this->show_dal->show_exists($show) == TRUE){
    		return "4th showhandlingtest failed";
    	}
    	$params = array(
    		ID => NULL,
    		FIRSTNAME => 'anna',
    		LASTNAME => 'persson',
    		DESCRIPTION => 'en bra person'
    	);
    	$person = new Person($params);
    	// 5th test, add person
    	if($this->show_handler->add_person($person) == FALSE){
    		return "5th showhandlingtest failed";
    	}
		// 6th test, check if person exists
		if($this->show_dal->person_exists($person) == FALSE){
			return "6th showhandlingtest failed";
		}
		// 7th test, delete show
		if($this->show_handler->delete_person($person) == FALSE){
    		return "7th showhandlingtest failed";
    	}
    	// 8th test, check if show is deleted
    	if($this->show_dal->person_exists($person) == TRUE){
    		return "8th showhandlingtest failed";
    	}
    	$params = array(
    		ID => NULL,
    		PERSONID => '1',
    		SHOWID => '1',
    		CHARACTER_NAME => "karaktärensnamn",
    		IMPORTANCE => '1'
    	);
		$cast_member = new Cast_member($params);
		// 9th test - add cast member
		if($this->show_handler->add_cast_member($cast_member) == FALSE){
			return "9th showhandlingtest failed";
		}
		// 10th test - check if cast member exists
		if($this->show_dal->character_exists($cast_member) == FALSE){
    		return "10th showhandlingtest failed";
    	}
    	// 11th test - delete cast member
    	if($this->show_handler->delete_cast_member($cast_member) == FALSE){
    		return "11th showhandlingtest failed";
    	}
//    	// 12th test, check if cast member is deleted
    	if($this->show_dal->character_exists($cast_member) == TRUE){
    		return "12th showhandlingtest failed";
    	}
    	return "<p>showhandlingtest successful!</p>";
    }
}
/* End of file test.php */
/* Location: ./application/controllers/test.php */