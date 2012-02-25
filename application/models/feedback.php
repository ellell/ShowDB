<?php
abstract class Feedback {
	/*
	**	To add feedback messages (in the form of constants) to an array
	*/
	const UNEXP_ERROR = "An unexpected error occurred.";
	const EMAIL_EXISTS = "That emailadress is already associated with a registered account.";
	const USERNAME_EXISTS = "Username is not avaliable.";
	const WRONG_LOGIN = "Username and/or password is not correct.";
	const SHOW_EXISTS = "A show with that name already exists in the database.";
	const PERSON_EXISTS = "A person with that name already exists in the database.";
	const CHARACTER_EXISTS = "There's already a character with that name connected to this show.";

	public static $feedback_array = array();
	static function add_feedback($msg) {
		Feedback::$feedback_array[] = $msg;
	}

	static function clear_feedback() {
		$feedback_array = null;
	}
}
/* End of file feedback.php */
/* Location: ./application/models/feedback.php */