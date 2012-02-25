<?php
class User_dal extends CI_Model{
	/*
	** Responsible for all database queries concerning Users
	*/
	private $user_table_name = "users";
	function username_exists($user){
		// Returns true if username exists in database
		$username = $user->get_username();
		$sql = "SELECT * FROM $this->user_table_name WHERE USERNAME = ?";
		$query = $this->db->query($sql, array($username));
		if($query->num_rows == 1){
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	function email_exists($user){
		// Returns true if email exists in database
		$email = $user->get_email();
		$sql = "SELECT * FROM $this->user_table_name WHERE EMAIL = ?";
		$query = $this->db->query($sql, array($email));
		if($query->num_rows == 1){
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	function add_user($first_name, $last_name, $email, $username, $password){
		$sql = "INSERT INTO $this->user_table_name (firstname, lastname, email, username, password) VALUES(?, ?, ?, ?, ?)";
		$query = $this->db->query($sql, array($first_name, $last_name, $email, $username, $password));
		return $query;
	}
	public function delete_user($username) {
		$sql = "DELETE FROM $this->user_table_name WHERE Username = ?";
		$query = $this->db->query($sql, array($username));
		return $query;
	}
	public function valid_login($username, $password){
		// Returns true if login input is valid
		$sql = "SELECT * FROM $this->user_table_name WHERE (username = ? AND password = ?)";
		$query = $this->db->query($sql, array($username, $password));
		if($query->num_rows == 1){
			return TRUE;
		}
		else {
		return FALSE;
		}
	}
	public function get_password($username){
		// Returns password corresponding to input username
		$sql = "SELECT password FROM $this->user_table_name WHERE USERNAME = ?";
		$query = $this->db->query($sql, array($username));
		if ($query->num_rows() > 0){
 		  $row = $query->row(); 
 		  return $row->password;
		}
	}
}
/* End of file user_dal.php */
/* Location: ./application/models/user_dal.php */