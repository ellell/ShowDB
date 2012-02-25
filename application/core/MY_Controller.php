<?php
include_once('application/models/logger.php');
include_once('application/models/feedback.php');
include_once('application/libraries/user.php');
include_once('application/libraries/show.php');
include_once('application/libraries/person.php');
include_once('application/libraries/cast_member.php');
class MY_Controller extends CI_Controller {
	function __construct(){
    	parent::__construct();
    	// Set title, get loginstatus, and load header
    	$data['title'] = "Show DB";
    	$data['is_logged_in'] = $this->is_logged_in();
    	$this->load->view('includes/header', $data);  
    }
    function is_logged_in(){
    	$this->load->helper('cookie');
    	// Check session variabel and cookies - return true if loginstatus is set to true in either of them
    	if($this->session->userdata(IS_LOGGED_IN) == TRUE || get_cookie(IS_LOGGED_IN) == TRUE){
    		return TRUE;
    	}
    	else{
    		return FALSE;
    	}
    }
}