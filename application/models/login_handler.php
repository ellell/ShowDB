<?php
class Login_handler extends CI_Model{
	function do_login($username, $password){
		$this->load->model('user_dal');
		$login = $this->valid_login($username, $password);
		// If login is valid, set session data
		if($login){
			$data = array(
    			USERNAME=>$username,
    			IS_LOGGED_IN=>TRUE	
    			);
    		$this->session->set_userdata($data);
    	}
    	else{
    		// If login did not succeed, set feedback message
    		feedback::add_feedback(feedback::WRONG_LOGIN);
    	}
		return $login;
	}
	function do_logout(){
		// Unset session variable
		$data = array(
    			USERNAME=>'',
    			IS_LOGGED_IN=>''
    		);
    	$this->session->unset_userdata($data);
	}
    function valid_login($username, $input_password){
    	$this->load->model('user_dal');
    	// Get password
    	$password_from_db = $this->user_dal->get_password($username);
    	// Substring salt
    	$salt = substr($password_from_db, 0, 40);
    	// Hash input password
    	$iph = $salt . $input_password;
		$iph = hash('sha1', $iph);
		$iph = $salt . $iph;
		if($iph == $password_from_db){
			return TRUE;
		}	 
		else {
			return FALSE;
		}	 
    }		 
}
/* End of file login_handler.php */
/* Location: ./application/models/login_handler.php */