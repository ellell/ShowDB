<?php
class Registration_handler extends CI_Model{
	public function do_registration($user){
		$this->load->model('user_dal');	
		// Get salt and hash password
		$salt = $this->generate_salt();
		$hash_password = $this->hash_password($salt, $user->get_password());
		// Check if username avaliable
		if($this->user_dal->username_exists($user) == FALSE){
			// Check if email is avaliable
			if($this->user_dal->email_exists($user) == FALSE){
				// Return true if registration was successfull
				if($this->user_dal->add_user($user->get_first_name(), $user->get_last_name(), $user->get_email(), $user->get_username(), $hash_password) == TRUE){
					return TRUE;
				}
				else {
					// If registration failed, log error and add feedback message and return false
					logger::log_error('An unexpected error occurred when trying to save user to db.');
					feedback::add_feedback(feedback::UNEXP_ERROR);
					return FALSE;
				}
			}
			else{
				// If email is not avaliable, add feedback message and return false
				feedback::add_feedback(feedback::EMAIL_EXISTS);
				return FALSE;
			}
		}
		else {
			// If username is not avaliable, add feedback message and return false
			feedback::add_feedback(feedback::USERNAME_EXISTS);
			return FALSE;
		}
	}
	public function delete_user($username){
		$this->load->model('user_dal');
		if($this->user_dal->delete_user($username)){
			// If deleting succeded return true
			return TRUE;
		}
		else {
			// If deleting failed, log error, add feedbackmessage and return false.
			logger::log_error('An unexpected error occurred when trying to delete user from db.');
			feedback::add_feedback(feedback::UNEXP_ERROR);
			return FALSE;
		}
	}
	public function generate_salt(){
		// Generate 40 char long salt
		$salt = hash('sha1', uniqid(mt_rand(), true));
		return $salt;
	}
	public function hash_password($salt, $password){
		// Hash password and return salt and password together
		$hash = $salt . $password;
		$hash = hash('sha1', $hash);
		return $salt . $hash;
	}
}
/* End of file registration_handler.php */
/* Location: ./application/models/registration_handler.php */